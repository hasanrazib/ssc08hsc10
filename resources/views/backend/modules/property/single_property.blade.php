@extends('backend.layouts.admin_main')
@section('main-content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Company Profile
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">#DHK-TAN-</small>
                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

        <div class="rh-card" style="background:url({{ (!empty($property->property_cover))? url($property->property_cover):url('upload/847x312_cover.png') }});background-repeat:no-repeat;background-size:cover;background-position:50% 50%">
            <div class="property-logo" style="background:url({{ (!empty($property->property_logo))? url($property->property_logo):url('upload/200x200_logo.png') }})">

            </div>

        </div>

        <!--begin::details View-->
        <div class="row">
            <div class="col-xl-5">
                <div class="card mb-5 mb-xl-4 bg-light-warning">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">

                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Property Overview</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Property Name:</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800">{{$property->property_name}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Category</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6 badge badge-light-success"> @if(isset($property->propertyCategory['property_category_name'])){{$property->propertyCategory['property_category_name']}}  @endif</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Contact Number
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bolder fs-6 text-gray-800 me-2">{{$property->property_mobile}}, {{$property->property_phone}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6">{{$property->property_email}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Website</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6">{{$property->property_website}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold text-gray-800 fs-6">{{$property->property_address}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card mb-5 mb-xl-4">
                     <!--begin::Card header-->
                     <div class="card-header cursor-pointer">

                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Description</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <div class="card-body">
                    {{$property->property_description}}
                    </div>
                </div>
            </div>
        </div>
        <!--end::details View-->
        <div class="map-area">
            <iframe src="{{$property->property_map}}" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!--begin::Social Icon-->
        <div class="card mb-4 bg-light text-center">
            <!--begin::Body-->
            <div class="card-body py-12">
                <!--begin::Icon-->
                <a href="{{$property->property_facebook_page}}" class="mx-4">
                    <img src="{{asset('backend/assets/media/svg/brand-logos/facebook-4.svg')}}" class="h-30px my-2" alt="" />
                </a>
                <!--end::Icon-->
                <!--begin::Icon-->
                <a href="{{$property->property_instagram_page}}" class="mx-4">
                    <img src="{{asset('backend/assets/media/svg/brand-logos/instagram-2-1.svg')}}" class="h-30px my-2" alt="" />
                </a>
                <!--end::Icon-->
                <!--begin::Icon-->
                <a href="{{$property->property_linkedin_page}}" class="mx-4">
                    <img src="{{asset('backend/assets/media/svg/brand-logos/github.svg')}}" class="h-30px my-2" alt="" />
                </a>
                <!--end::Icon-->
            </div>
            <!--end:: Social Icon -->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

</div>
@endsection
