@extends('homelayout.master')

@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="padding-top-3x hidden-md-up"></div>
                <h3 class="margin-bottom-1x">No Account? Register</h3>
                <p>Registration takes less than a minute but gives you full control over your orders.</p>
                <form class="row" action="{{route('register')}}" method="post">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-fn">First Name</label>
                            <input class="form-control" type="text" name="fname" id="reg-fn" value="{{old ('fname')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-ln">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="{{old ('lname')}}" id="reg-ln">
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="reg-email">E-mail Address</label>
                            <input class="col-sm-12 form-control" type="email" value="{{old ('email')}}" name="email" id="reg-email">
                        </div>
                    </div>
                    <div class="col-sm-2 p-0">
                        <div class="form-group">
                            <label for="button">Verify code</label>
                            <button id="button" class="btn  btn-pill btn-success m-0 col-sm-10" onclick="send()" type="button">Send</button>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="code">Enter verify code</label>
                            <input class="form-control" type="text" name="code" id="code">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-pass">Password</label>
                            <input class="form-control" type="password" name="password" id="reg-pass">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="reg-pass-confirm">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation" id="reg-pass-confirm">
                        </div>
                    </div>
                    <div class="col-12 text-center text-sm-right">
                        <button class="btn btn-primary margin-bottom-none" type="submit">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function send() {
            $.ajax({
                type: "post",
                dataType: "json",
                data: {email: $('#reg-email').val()},
                url: "{{route('CodeSend')}}",
                success: function (res) {
                    if (res.code == 1) {
                        swal({
                            type: "success",
                            text: res.message,
                            timer: 3000,
                            // showConfirmButton: false,
                        })
                    }

                },
                error: function (res) {
                    // console.log(res)
                    if(res.status == 401)
                    swal({
                        type: "error",
                        text: res.responseJSON.message,
                        timer: 3000,
                    })
                },
            })
        }
    </script>
@endpush
