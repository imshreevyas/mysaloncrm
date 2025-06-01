@extends('salon.layout')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-left">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('salon.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('salon.profile') }}">Profile</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ isset($salon_details->profile->salon_banner) ? asset($salon_details->profile->salon_banner) : asset('msg/default-profile-bg.png') }}"
                        class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit upload-cover-photo-btn">
                                <form id="upload-banner-form">
                                    @csrf
                                    <input id="profile-foreground-img-file-input" name="salon_banner" type="file"
                                        class="profile-foreground-img-file-input">
                                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                        <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                    </label>
                                </form>
                            </div>
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit update-cover-photo-btn d-none">
                                <button type="button" id="upload-banner"
                                    class="btn btn-success btn-icon waves-effect waves-light"><i
                                        class="ri-check-fill"></i></button>
                                <button type="button" id="cancel-banner-upload"
                                    data-default-banner="{{ asset('msg/default-profile-bg.png') }}"
                                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                                        class="ri-close-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto mb-0">
                                    <img src="{{ isset($salon_details->profile->salon_logo) ? asset($salon_details->profile->salon_logo) : asset('msg/default-logo.png') }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <form id="upload-logo-form">
                                            @csrf
                                            <input id="profile-img-file-input" type="file" name="salon_logo" class="profile-img-file-input">
                                            <label for="profile-img-file-input" class="profile-photo-edit upload-logo-photo-btn avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                            </label>
                                        </form>
                                    </div>
                                    
                                </div>
                                <div class="p-0 ms-auto rounded-circle profile-photo-edit update-logo-photo-btn mt-2 d-none">
                                    <button type="button" id="upload-logo"
                                        class="btn btn-success btn-icon waves-effect waves-light"><i
                                            class="ri-check-fill"></i></button>
                                    <button type="button" id="cancel-logo-upload"
                                        data-default-logo="{{ asset('msg/default-logo.png') }}"
                                        class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-close-fill"></i></button>
                                </div>
                                <h5 class="fs-16 mt-2 mb-1">{{ $salon_details['owner_name'] ?: '#Owner Name' }}</h5>
                                <p class="text-muted mb-0">Owner</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Social Media Links</h5>
                                </div>
                            </div>
                            @php 
                                $links_count = -1;
                            @endphp
                            @if (!empty($salon_details->profile->social_media_links))
                            @php
                                $all_links = json_decode($salon_details->profile->social_media_links, true);
                            @endphp
                                <div class="row" id="social-media-div">
                                    @foreach ($all_links as $index => $single_sc)
                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                <i class="ri-{{ $single_sc['type'] }}-fill"></i>
                                            </span>
                                        </div>
                                        <input type="text" disabled class="form-control" id="{{ $single_sc['type'] }}-link" placeholder="Your Link" value="{{ $single_sc['link'] }}">
                                    </div>
                                    @endforeach
                                </div>
                                <form class="form-group d-none" id="social_media_links_form">
                                    @csrf
                                    @foreach ($all_links as $index => $single_sc)
                                    @php 
                                        $links_count++;
                                    @endphp
                                        <div id="social-media-link-{{ $index }}" class="mb-3 d-flex">
                                            <div class="input-group">
                                                <select class="form-control" name="social_media_links[{{ $index }}][type]">
                                                    <option value="instagram" {{ $single_sc['type'] == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                                    <option value="facebook" {{ $single_sc['type'] == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                                    <option value="youtube" {{ $single_sc['type'] == 'youtube' ? 'selected' : '' }}>Youtube</option>
                                                    <option value="tiktok" {{ $single_sc['type'] == 'tiktok' ? 'selected' : '' }}>Tiktok</option>
                                                    <option value="global" {{ $single_sc['type'] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <input type="text" name="social_media_links[{{ $index }}][link]" class="form-control" id="{{ $single_sc['type'] }}-edit-link" placeholder="link"
                                                    value="{{ $single_sc['link'] }}">
                                                <button type="button" class="btn btn-danger" onclick="deleteLink({{ $index }})"><i class="ri-delete-bin-fill"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    {{-- Dynamic Add Form --}}
                                </form>
                            @else
                            <div class="row" id="social-media-div"></div>
                            <form class="form-group" id="social_media_links_form"></form>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="flex-shrink-0 d-none" id="social-media-action-btn-div">
                                <button type="button" id="add_new_social_media_link" value="{{ $links_count }}" class="badge border-0 bg-light text-primary fs-16"><i class="ri-add-fill align-bottom me-1"></i> Add</button>
                                <button type="button" id="save_social_media_links" class="badge bg-light text-success fs-16 border-0 {{ $links_count > 0 ? '' : 'd-none' }}"><i class="ri-check-fill align-bottom me-1"></i> Save</button>
                            </div>
                            <div class="flex-shrink-0" id="social-media-edit-btn-div">
                                <button type="button" id="social-media-edit-btn" value="{{ $links_count }}" class="badge border-0 bg-light text-primary fs-16"><i class="ri-pencil-fill align-bottom me-1"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                @php 
                $show_active_tab = isset($tab) && !empty($tab) ? $tab : 'basicDetails';
                @endphp
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'basicDetails' ? 'active' : '' }}" data-bs-toggle="tab" href="#basicDetails"
                                        role="tab">
                                        <i class="fas fa-home"></i>
                                        Basic Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'address' ? 'active' : '' }}" data-bs-toggle="tab" href="#address"
                                        role="tab">
                                        <i class="far fa-envelope"></i>
                                        Address Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'changePassword' ? 'active' : '' }}" data-bs-toggle="tab" href="#changePassword"
                                        role="tab">
                                        <i class="far fa-user"></i>
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane  {{ $show_active_tab == 'basicDetails' ? 'active' : '' }}" id="basicDetails" role="tabpanel">
                                    @include('salon.components.profile-basic-details-form')
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane  {{ $show_active_tab == 'address' ? 'active' : '' }}" id="address" role="tabpanel">
                                    @include('salon.components.profile-address-form')
                                </div>
                                
                                <!--end tab-pane-->
                                <div class="tab-pane  {{ $show_active_tab == 'changePassword' ? 'active' : '' }}" id="changePassword" role="tabpanel">
                                    @include('salon.components.profile-change-password-form')

                                    @include('salon.components.profile-login-history-list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

@stop
