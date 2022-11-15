@extends('backend.layouts.admin_main')
@section('main-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Property Directory</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
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
        <!--begin::Search vertical-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Aside-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5">
                <!--begin::Form-->
                <form action="#">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin:Search-->
                            <div class="position-relative">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="search" id="search" placeholder="Search" />
                            </div>
                            <!--end:Search-->
                            <!--begin::Border-->
                            <div class="separator separator-dashed my-8"></div>
                            <!--end::Border-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="fs-6 form-label fw-bolder text-dark mb-5">Categories</label>

                                @foreach($property_directory_cats as $cat)
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <input class="form-check-input category_checkbox" type="checkbox" id="{{$cat->id}}"/>
                                    <label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="kt_search_category_1">{{$cat->property_category_name}}</label>
                                    <span class="text-gray-400 fw-bolder">{{$cats_count}}</span>
                                </div>
                                <!--end::Checkbox-->
                               @endforeach
                            </div>
                            <!--end::Input group-->
                            <!--begin::Action-->
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="btn btn-active-light-primary btn-color-gray-400 me-3">Discard</a>
                                <a href="#" class="btn btn-primary">Search</a>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Aside-->
            <!--begin::Layout-->
            <div class="flex-lg-row-fluid">
                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack pb-7">
                    <!--begin::Title-->
                    <div class="d-flex flex-wrap align-items-center my-1">
                        <h3 class="fw-bolder me-5 my-1"><span class="total_count"></span>  Items Found
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                        <!--begin::Row-->
                        <div class="row g-6 g-xl-9" id="property_item">

                        </div>
                        <!--end::Row-->
                        <!--begin::Pagination-->
                         <div class="d-flex flex-stack flex-wrap pt-10">
                            <div class="fs-6 fw-bold text-gray-700">Showing <span id="count_from"></span> to <span id="count_to"></span> of <span class="counter"></span> entries</div>
                            <!--begin::Pages-->

                            <ul class="pagination">

                            </ul>
                            <!--end::Pages-->
                        </div>
                        <!--end::Pagination-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--begin::Search vertical-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
</div>
<script>



// start: get all friends
function allProperty(){

        $.ajax({
            url:"/get-property-all-ajax",
            type: "GET",
            dataType:'JSON',

            success:function(data){

                var baseurl = {!! json_encode(url('/')) !!}
                var image_placeholder = baseurl+'/upload/no_image.jpg';
                var html = '';



                $.each(data['property_all']['data'],function(key,v){

                    var pro_cat = '';

                    if(typeof v['property_category'] !=='undefined' && v['property_category'] !==null){
                        pro_cat = v['property_category']['property_category_name'];
                    }

                    html += '<div class="col-md-6 col-xl-6 col-xxl-6">';
                    html += '<div class="card">';
                    html += '<div class="card-body d-flex flex-center flex-column pt-12 p-9">';
                    html += '<div class="symbol symbol-65px symbol-circle mb-5">';
                    if(v.property_logo){
                    html += '<img src="'+baseurl+'/'+v.property_logo+'" alt="image" />';
                    }else{
                    html += '<img src="'+image_placeholder+'" alt="image" />';
                    }
                    html += '<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>';
                    html += '</div>';
                    html += '<a href="{{route('get.all.property.ajax')}}/'+v.id+'" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">'+v.property_name+'</a>';
                    if(pro_cat) {
                    html += '<div class="fw-bold text-gray-600 mb-6">'+pro_cat+'</div>';
                    } else {
                    html += '<div class="fw-bold text-gray-600 mb-6"></div>'};
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                });


                var total_count = data['property_all']['total'];


                $('#property_item').html(html);
                $('.total_count').html(total_count);

            } // success

        }); // ajax

}

allProperty();
// end: get all property


$(document).ready(function() {

    $(document).on('click', '.category_checkbox', function () {

        var rhrl = '';
        $('#property_item').html(rhrl);

        var ids = [];

        $('.category_checkbox').each(function () {if ($(this).is(":checked")) {ids.push($(this).attr('id'));}});


        $.ajax({
            url:"/get-property-directory/",
            type: "GET",
            data:{ids:ids},
            dataType:'JSON',

            success:function(data){

                var baseurl = {!! json_encode(url('/')) !!}
                var image_placeholder = baseurl+'/upload/no_image.jpg';

                var html = '';

                $.each(data,function(key,v){

                    html += '<div class="col-md-6 col-xl-6 col-xxl-6">';
                    html += '<div class="card">';
                    html += '<div class="card-body d-flex flex-center flex-column pt-12 p-9">';
                    html += '<div class="symbol symbol-65px symbol-circle mb-5">';
                    if(v.property_logo){
                    html += '<img src="'+baseurl+'/'+v.property_logo+'" alt="image" />';
                    }else{
                    html += '<img src="'+image_placeholder+'" alt="image" />';
                    }

                    html += '<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>';
                    html += '</div>';
                    html += '<a href="" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">'+v.property_name+'</a>';
                    html += '<div class="fw-bold text-gray-600 mb-6">'+v.property_category_name+'</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                });

                $('#property_item').html(html);


            }//success
        }); //ajax
    }); // onclick

}); // document ready


</script>
@endsection
