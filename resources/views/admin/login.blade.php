<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('layout.adminLayouts.admin_header')
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click"
      data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 text-center">
                                <img src="{{asset('/org/app-assets')}}/images/portrait/small/avatar-s-1.png" alt="unlock-user"
                                     class="rounded-circle img-fluid center-block">
                                <h5 class="card-title mt-1">Welcome Back!</h5>
                            </div>
                            <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
                                <span>Please login</span>
                            </p>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{route('admin.login')}}"  method="post">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control round" name="email" placeholder="Enter your account"
                                                   >
                                            <div class="form-control-position">
                                                <i class="la la-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control round" name="password" placeholder="Enter Password"
                                                   >
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-12 float-sm-left text-center text-sm-right">

                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                    class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('layout.adminLayouts.admin_footer')
@include('layout.message')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('/org/app-assets')}}/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('/org/app-assets')}}/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
