@extends('backend.layouts.admin_main')
@section('main-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--start::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add User
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1"></small>
                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::wrapper-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{route('insert.user')}}" enctype="multipart/form-data">
            @csrf
        <!--begin::Basic Info -->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Basic Info</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url()"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                            <!--end::Label-->
                             <!--begin::Col-->
                             <div class="col-lg-8 fv-row">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="" />
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder=""/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Contact Phone</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Blood Group</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Input-->
                                <select name="blood_id" aria-label="Select a blood" data-control="select2" data-placeholder="Select a blood..." class="form-select form-select-solid form-select-lg">
                                    <option value="0">Select a Blood Group...</option>

                                    @foreach($bloods as $item)
                                    <option value="{{$item->id}}">{{$item->blood_group}}</option>
                                    @endforeach

                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Gender</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="gender_id" aria-label="Select a gender" data-control="select2" data-placeholder="Select a gender.." class="form-select form-select-solid form-select-lg">
                                    <option value="0">Select a Gender..</option>
                                    @foreach($genders as $item)
                                    <option value="{{$item->id}}">{{$item->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Marital Status</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Input-->
                                <select name="marital_id" aria-label="Select a marital status" data-control="select2" data-placeholder="Select a marital status..." class="form-select form-select-solid form-select-lg">
                                    <option value="0">Select your marital Status...</option>

                                    @foreach($maritals as $item)
                                    <option value="{{$item->id}}" >{{$item->marital_name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Religion</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="religion_id" aria-label="Select a religion" data-control="select2" data-placeholder="Select a religion.." class="form-select form-select-solid form-select-lg">
                                    <option value="0">Select a Religion..</option>

                                    @foreach($religions as $item)
                                    <option value="{{$item->id}}">{{$item->religion_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic Info-->
        <!--begin::Works and Education View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Work & Education</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--start::Row-->
            <div class="row">
                <div class="col-xl-6">
                <!--begin::Card body-->
                <div class="card-body p-9 card-dashed">
                <h3 class="card-title mb-7">Work History</h3>
                <!--begin::Input group-->
                <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">Job Title</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="job_title" class="form-control form-control-lg form-control-solid" placeholder=""/>
                </div>
                <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">Company Name</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="company_name" class="form-control form-control-lg form-control-solid" placeholder=""/>
                </div>
                <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Job Industry</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <!--begin::Input-->
                        <select name="job_industry_id" aria-label="Select a marital status" data-control="select2" data-placeholder="Select a job industry..." class="form-select form-select-solid form-select-lg">
                            <option value="0">Select your Job Industry ...</option>

                            @foreach($jobindustries as $item)
                            <option value="{{$item->id}}" >{{$item->jobindustry_name}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">Location</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <textarea name="company_location" class="form-control form-control-solid" rows="3" placeholder=""></textarea>
                </div>
                <!--end::Col-->
                </div>
                <!--end::Input group-->
                </div>
                    <!--end::Card body-->
                </div>
                <div class="col-xl-6">
                    <!--begin::Card body-->
                    <div class="card-body p-9 card-dashed">
                        <h3 class="card-title mb-7">Education History</h3>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">University Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="university_name" class="form-control form-control-lg form-control-solid" placeholder=""/>
                        </div>
                        <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">College Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="college_name" class="form-control form-control-lg form-control-solid" placeholder=""  />
                        </div>
                        <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">School Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="school_name" class="form-control form-control-lg form-control-solid" placeholder="" />
                        </div>
                        <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Works and Education -->
        <!--begin::Address Info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Address Information</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Form-->
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <h3 class="card-title mb-7">Present</h3>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Division</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="division_id" name="present_division_id" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Division..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a Division...</option>
                                    @foreach($divisions as $item)
                                    <option value="{{$item->id}}">{{$item->division_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::District Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">District</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="district_id" name="present_district_id" aria-label="Select a district" data-control="select2" data-placeholder="Select a District..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a District...</option>

                                </select>
                            </div>
                            <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::District Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Sub District</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="subdistrict_id" name="present_subdistrict_id" aria-label="Select a district" data-control="select2" data-placeholder="Select a District..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a SubDistrict...</option>

                                </select>
                            </div>
                            <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label fw-bold fs-6">
                                <span class="required">Present Address Line:</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <textarea name="present_address_line" class="form-control form-control-solid" rows="3" placeholder="Ex. Village/Street/Road..."></textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                </div>
                <div class="col-xl-6">
                    <!--begin::Form-->
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <h3 class="card-title mb-7">Permanent</h3>
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Division</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="permanent_division_id" name="permanent_division_id" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Division..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a Division...</option>
                                    @foreach($divisions as $item)
                                    <option value="{{$item->id}}">{{$item->division_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::District Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">District</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="permanent_district_id" name="permanent_district_id" aria-label="Select a district" data-control="select2" data-placeholder="Select a District..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a District...</option>

                                </select>
                            </div>
                            <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::District Input group-->
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Sub District</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select id="permanent_subdistrict_id" name="permanent_subdistrict_id" aria-label="Select a district" data-control="select2" data-placeholder="Select a District..." class="form-select form-select-solid form-select-lg fw-bold">
                                    <option value="0">Select a SubDistrict...</option>

                                </select>
                            </div>
                            <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label fw-bold fs-6">
                                <span class="required">Permanent Address Line:</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Select Distric Name"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <textarea name="permanent_address_line" class="form-control form-control-solid" rows="3" placeholder="Ex. Village/Street/Road..."></textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                </div>

            </div> <!-- end row -->
        </div>
        <!--end::Address Info -->
        <!--begin::Password -->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Password Section</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card-body border-top p-9">
                   <!--begin::Input group-->
                    <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Password</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder=""/>
                    </div>
                    <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
        <!--end::Password -->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
        </div>
        <!--end::Actions-->
    </form>
    </div>
    <!--end::Container-->
    </div>
    <!--end::wrapper-->
</div>

<script type="text/javascript">

    $(function(){
        $(document).on('change','#division_id',function(){

            var division_id = $(this).val();
            $.ajax({
                url:"{{ route('get-district-list') }}",
                type: "GET",
                data:{division_id:division_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value="'+v.id+'" > '+v.district_name+'</option>';

                    });
                    $('#district_id').html(html);
                }
            })
        });

    });

    $(function(){
        $(document).on('change','#district_id',function(){

            var district_id = $(this).val();
            $.ajax({
                url:"{{ route('get-sub-district-list') }}",
                type: "GET",
                data:{district_id:district_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.sub_district_name+'</option>';
                    });
                    $('#subdistrict_id').html(html);
                }
            })
        });
    });
// permanent
$(function(){
        $(document).on('change','#permanent_division_id',function(){

            var division_id = $(this).val();
            $.ajax({
                url:"{{ route('get-district-list') }}",
                type: "GET",
                data:{division_id:division_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value="'+v.id+'" > '+v.district_name+'</option>';

                    });
                    $('#permanent_district_id').html(html);
                }
            })
        });

    });

    $(function(){
        $(document).on('change','#permanent_district_id',function(){

            var district_id = $(this).val();
            $.ajax({
                url:"{{ route('get-sub-district-list') }}",
                type: "GET",
                data:{district_id:district_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.sub_district_name+'</option>';
                    });
                    $('#permanent_subdistrict_id').html(html);
                }
            })
        });
    });
</script>
@endsection

