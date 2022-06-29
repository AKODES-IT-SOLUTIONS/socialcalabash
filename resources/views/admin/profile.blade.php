@extends('admin.layouts.app')

@section('body')
<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Author Profile</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-50">

        <!--Author Top Start-->
        <div class="col-12 mb-50">
            <div class="author-top">
                <div class="inner">
                    <div class="author-profile">
                        <div class="image">
                            <img src="assets/images/avatar/profile.jpg" class="d-none" alt="">
                            <h2>MH</h2>
                            <a href="#" class="edit"><i class="zmdi zmdi-cloud-upload"></i>Change Image</a>
                        </div>
                        <div class="info">
                            <h5>{{ Auth::guard('admin')->user()->name }}</h5>
                            <span>{{ Auth::guard('admin')->user()->email }}</span>
                            <a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Author Top End-->
    </div>

</div><!-- Content Body End -->
@endsection
