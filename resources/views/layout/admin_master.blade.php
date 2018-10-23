<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('layout.adminLayouts.admin_header')
@stack('css')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

@include('layout.adminLayouts.admin_topMenu')
@include('layout.adminLayouts.admin_sideMenu')

<div class="app-content content">
    <div class="content-wrapper" style="padding-top: 10px; !important;">
        <div class="content-wrapper-before"></div>
        @yield('content')
        {{--<div class="content-body">--}}
            {{--<div class="row">--}}

            {{--</div>--}}
            {{--<div class="row">--}}

            {{--</div>--}}
            {{--<div class="row match-height">--}}

            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('layout.adminLayouts.admin_footer')
@include('layout.massage')
@stack('js')
</body>
</html>
