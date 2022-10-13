<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
        <!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('backend/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('backend/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <link href="{{asset('backend/assets/css/rh-custom.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
                @include('backend.layouts.template-parts.sidebar')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				    <!--begin::Header-->
                    @include('backend.layouts.template-parts.header')
					<!--end::Header-->
					<!--begin::Content-->
                    @yield('main-content')
					<!--end::Content-->
					<!--begin::Footer-->
                    @include('backend.layouts.template-parts.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
        <!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('backend/assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/apps/user-management/users/list/add.js')}}"></script>

        <!--begin::Customer List Sytle -->
        <script src="{{asset('backend/assets/js/custom/apps/customers/list/export.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/apps/customers/list/list.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/apps/customers/add.js')}}"></script>
        <!--end::Customer List Sytle -->
        <!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('backend/assets/js/custom/widgets.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/modals/create-app.js')}}"></script>
		<script src="{{asset('backend/assets/js/custom/modals/upgrade-plan.js')}}"></script>
		<!--end::Page Custom Javascript-->
        <!--begin::My Custom Javascript(used by this page)-->
        <script src="{{asset('backend/assets/js/custom/rh-custom/rh-modals.js')}}"></script>
        <script src="{{asset('backend/assets/js/custom/rh-custom/main.js')}}"></script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
