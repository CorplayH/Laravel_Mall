@extends('homelayout.master')

@section('content')

    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            @include('homelayout.userinfomenu')
            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <form class="row" action="{{route('user.updateProfile')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">First Name</label>
                            <input class="form-control" type="text" name="fname" id="account-fn" value="{{auth()->user()->fname}}"
                                   required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">Last Name</label>
                            <input class="form-control" type="text" name="lname" id="account-ln" value="{{auth()->user()->lname}}"
                                   required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">E-mail Address</label>
                            <input class="form-control" type="email" id="account-email" value="{{auth()->user()->email}}" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="account-phone" value="{{auth()->user()->phone? :''}}"
                                   required="">
                        </div>
                    </div>
                    <div class="col-12">

                        <div class="d-flex flex-wrap justify-content-end align-items-center">

                            <button class="btn btn-primary margin-right-none" type="submit">Update Profile
                            </button>
                        </div>
                        <hr class="mt-2 mb-3">

                    </div>
                </form>
                <form action="{{route('user.updatePassword')}}" method="post">
                    @csrf
                    <div class="accordion col-12 p-0" id="accordion1" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h6><a href="#collapseOne" data-toggle="collapse" class="collapsed">
                                        Change your password
                                    </a></h6>
                            </div>
                            <div class="collapse" id="collapseOne" data-parent="#accordion1" role="tabpanel">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="old-account-pass">Old Password</label>
                                                <input class="form-control" name="oldPassword" type="password" id="old-account-pass">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-pass">New Password</label>
                                                <input class="form-control" name="password" type="password" id="account-pass">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-confirm-pass">Confirm Password</label>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                       id="account-confirm-pass">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap justify-content-end align-items-center">
                                        <button class="btn btn-primary margin-right-none" type="submit">Update password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
