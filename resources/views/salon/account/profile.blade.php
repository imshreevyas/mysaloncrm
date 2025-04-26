@extends('salon.layout')

@section('content')

    <div class="page-content">
        <div class="container">
            <form id="register-form" action="{{ route('salon.submit_profile') }}" method="POST">
            @csrf
            @include('display_errors')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex card-title">
                                <h4>Basic Details</h4>
                            </div>
                            <div class="p-2 mt-2">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="auth-form-group-custom mb-4">
                                            <i class="mdi mdi-store auti-custom-input-icon"></i>
                                            <label for="useremail">Salon Type<span class="text-danger">*</span></label>
                                            <select name="salon_type" id="salon_type" class="form-control">
                                                <option value="">Select Type</option>
                                                <option value="">Unisex</option>
                                                <option value="">Male</option>
                                                <option value="">Female</option>
                                            </select>
                                        </div>
                                    </div>                                                
                                    
                                    <div class="col-md-4 col-xs-12">
                                        <div class="auth-form-group-custom mb-4">
                                            <i class="mdi mdi-account auti-custom-input-icon"></i>
                                            <label for="username">Total Staff<span class="text-danger">*</span></label>
                                            <input type="text" name="staff_count" class="form-control" id="staff_count" placeholder="Enter Staff Count">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="auth-form-group-custom mb-4">
                                            <i class="mdi mdi-watch auti-custom-input-icon"></i>
                                            <label for="username">Established Year<span class="text-danger">*</span></label>
                                            <input type="month" name="established_year" class="form-control" id="example-month-input" placeholder="Enter Established Year">
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12">
                                        <label for="username">Salon Logo<span class="text-danger">*</span></label>
                                        <div class="form-group mb-4">
                                            <input type="file" name="established_year" class="form-control" id="customFile" placeholder="Enter Established Year">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12">
                                        <div class="auth-form-group-custom mb-4 align-items-cenetr justify-content-center p-2 d-flex">
                                            <img id="preview" src="{{ asset('admin/assets/images/companies/img-1.png') }}" width="100px">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex card-title">
                                <h4>Contact Details</h4>
                            </div>
                            <div class="pt-2">
                                <div class="row" style="height:150px">
                                    <div class="auth-form-group-custom mb-4">
                                        <i class="mdi mdi-email auti-custom-input-icon"></i>
                                        <label for="username">Support/Business Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="owner_email" id="owner_email" placeholder="Enter Email">
                                    </div>
                                
                                    <div class="auth-form-group-custom mb-4">
                                        <i class="ri-phone-fill auti-custom-input-icon"></i>
                                        <label for="userpassword">Contact Number<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="contact_number" id="contact_number" placeholder="Enter password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@stop