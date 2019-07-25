<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'clienex') }}</title>

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ URL::to('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/animation/css/animate.min.css') }}">
    <!-- notification css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/notification/css/notification.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <!-- modal-window-effects css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/modal-window-effects/css/md-modal.css') }}">
    <!-- select2 css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/select2/css/select2.min.css') }}">
    <!-- multi-select css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/multi-select/css/multi-select.css') }}">
    <!-- bootstrap-tagsinput-latest css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-tagsinput-latest/css/bootstrap-tagsinput.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/data-tables/css/datatables.min.css') }}">

    <!-- Bootstrap datetimepicker css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css') }}">

    <script>
        var page = {
            bootstrap: 4
        };

        function swap_bs() {
            page.bootstrap = 4;
        }
    </script>
    <style>
        .datepicker>.datepicker-days {
            display: block;
        }

        ol.linenums {
            margin: 2 2 2 -10px;
        }
    </style>

    <!-- bootstrap datetimepicker assets end -->
    <!-- ====================================== -->
    
    @section('header_css')
    @show
</head>

<body class="layout-1">
    <!-- [ Pre-loader ] start -->
   {{--  <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div> --}}
    <!-- [ Pre-loader ] End -->
    
    
    @include('inc.sidebar')
    @include('inc.navbar') 
    @section('modal')
    @show
    @yield('content')

    <!-- Required Js -->
    <script src="{{ URL::to('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script> 
    <script src="{{ URL::to('assets/js/pcoded.min.js') }}"></script>

    <!-- modal-window-effects Js -->
{{--     <script src="{{ URL::to('assets/plugins/modal-window-effects/js/classie.js') }}"></script>
<script src="{{ URL::to('assets/plugins/modal-window-effects/js/modalEffects.js') }}"></script> --}}

<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>

<!-- select2 Js -->
<script src="{{ URL::to('assets/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- multi-select Js -->
<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.quicksearch.js') }}"></script>
<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

<!-- form-select-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-select-custom.js') }}"></script>

<!-- bootstrap-tagsinput-latest Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="{{ URL::to('assets/plugins/bootstrap-tagsinput-latest/js/bootstrap-tagsinput.min.js') }}"></script>

<!-- bootstrap-maxlength Js -->
<script src="{{ URL::to('assets/plugins/bootstrap-maxlength/js/bootstrap-maxlength.min.js') }}"></script>

<!-- form-advance custom js -->
<script src="{{ URL::to('assets/js/pages/form-advance-custom.js') }}"></script>

<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>

<!-- sweet alert Js -->
<script src="{{ URL::to('assets/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
{{-- <script src="assets/js/pages/ac-alert.js"></script> --}}

<!-- datatable Js -->
<script src="{{ URL::to('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{ URL::to('assets/js/pages/tbl-datatable-custom.js') }}"></script>

<!-- modal-window-effects Js -->
<script src="{{ URL::to('assets/plugins/modal-window-effects/js/classie.js') }}"></script>
<script src="{{ URL::to('assets/plugins/modal-window-effects/js/modalEffects.js') }}"></script>

<!-- datepicker js -->
<script src="{{ URL::to('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::to('assets/js/pages/ac-datepicker.js') }}"></script>
 <script src="assets/js/pages/dashboard-custom.js"></script>
@section('footer_js')

@show
</body>
</html>
