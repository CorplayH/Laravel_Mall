@extends('homelayout.master')

@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="card" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="margin-bottom-1x text-center">Welcome Back!</h4>
                        <div class="form-group input-group">
                            <input class="form-control" type="email" id="reg-email" name="email" placeholder="Email" required><span
                                class="input-group-addon"><i
                                    class="icon-mail"></i></span>
                        </div>
                        <div class="form-group input-group">
                            <input class="form-control" type="password" id="reg-pass" name="password" placeholder="Password" required><span
                                class="input-group-addon"><i
                                    class="icon-lock"></i></span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-between ">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="remember_me">
                                <label class="custom-control-label" for="remember_me">Remember me</label>
                            </div>
                            <a class="navi-link" href="{{route('register')}}">No account yet? Register Now!</a>
                        </div>
                        <div class="text-sm-left">
                            <a class="navi-link" href="account-password-recovery.html">Forgot password?</a>
                        </div>

                        <div class="text-center text-sm-right">
                            <button class="btn btn-primary margin-bottom-none" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
