@extends('admin.layouts.app')

@section('body')
    <!-- Content Body Start -->
    <div class="content-body">
        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>Form <span>/ Layout</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row">
            <!--Form With Advance Form Elements Start-->
            <div class="col-lg-12 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">Form</h4>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mbn-20">

                                <div class="col-12 mb-20">
                                    <label for="formLayoutUsername4">Username</label>
                                    <input type="text" id="formLayoutUsername4" class="form-control"
                                        placeholder="Username">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="formLayoutEmail4">Email Address</label>
                                    <input type="email" id="formLayoutEmail4" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="formLayoutPassword4">Password</label>
                                    <input type="password" id="formLayoutPassword4" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="formLayoutAddress3">Address</label>
                                    <input type="text" id="formLayoutAddress3" class="form-control"
                                        placeholder="Address">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="formLayoutAddress4">Address 2</label>
                                    <input type="text" id="formLayoutAddress4" class="form-control"
                                        placeholder="Address 2">
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="row mbn-20">
                                        <div class="col-lg-4 mb-20">
                                            <label for="formLayoutCity2">City</label>
                                            <input type="text" id="formLayoutCity2" class="form-control"
                                                placeholder="City">
                                        </div>
                                        <div class="col-lg-4 mb-20">
                                            <label for="formLayoutState2">State</label>
                                            <select id="formLayoutState2" class="form-control select2">
                                                <option>Select State</option>
                                                <option>State One</option>
                                                <option>State Two</option>
                                                <option>State Three</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 mb-20">
                                            <label for="formLayoutZip2">Zip</label>
                                            <input type="text" id="formLayoutZip2" class="form-control"
                                                placeholder="Zip">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-20">
                                    <label for="formLayoutMessage2">Message</label>
                                    <textarea id="formLayoutMessage2" class="form-control"
                                        placeholder="Message"></textarea>
                                </div>

                                <div class="col-12 mb-20">
                                    <label for="formLayoutFile2">Upload a File</label>
                                    <input type="file" id="formLayoutFile2" class="dropify">
                                </div>

                                {{-- <div class="col-12 mb-20">
                                    <div class="adomx-checkbox-radio-group inline">
                                        <label class="adomx-radio"><input name="advanceRadio" type="radio"><i
                                                class="icon"></i>Option One</label>
                                        <label class="adomx-radio"><input name="advanceRadio" type="radio"><i
                                                class="icon"></i>Option Two</label>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-12 mb-20"><label class="adomx-checkbox"><input type="checkbox"><i
                                            class="icon"></i>Remember me</label></div> --}}

                                <div class="col-12 mb-20">
                                    <input type="submit" value="submit" class="button button-primary">
                                    <input type="submit" value="cancle" class="button button-danger">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Form With Advance Form Elements End-->

        </div>

    @endsection
