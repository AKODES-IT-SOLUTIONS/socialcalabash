@extends('admin.layouts.app')

@section('body')
    <!-- Content Body Start -->
    <div class="content-body">
        <div class="row">
            <!--Export Data Table Start-->
            <div class="col-12 mb-30 ml-4">
                <div class="box">
                    <div class="box-head">
                        <h3 class="title">Export Data Table</h3>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered data-table data-table-export">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
            <!--Export Data Table End-->
        </div>
@endsection
