@extends('homelayout.master')

@section('content')

    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            @include('homelayout.userinfomenu')
            <div class="col-lg-8">
                @if(count($addresses) >= 5 )
                    <div class="alert alert-success alert-dismissible fade show text-center mb-1">
                        <span class="alert-close" data-dismiss="alert"></span>
                        <i class="icon-check-circle"></i>&nbsp;&nbsp;
                        <span class="text-medium">Note:</span>You can save upto 5 shipping addresses
                    </div>
                @else
                    {{--模态框按钮--}}
                    <button class="btn btn-primary mb-2" type="button" data-toggle="modal" data-target="#modalLarge">Add address</button>
                @endif()

                <div class="accordion" id="accordion1" role="tablist">
                    {{--第一个--}}
                    @foreach($addresses as $address)
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h6>
                                    <a href="#collapse{{$address->id}}" data-toggle="collapse" class="collapsed"
                                       aria-expanded="true">{{$address->suburb}}&nbsp
                                        &nbsp {{$address->is_default? "- Default shipping address" : ""}}
                                    </a>
                                </h6>
                            </div>
                            <div class="collapse" id="collapse{{$address->id}}" data-parent="#accordion{{$address->id}}" role="tabpanel"
                                 style="">
                                <div class="card-body col-12">
                                    <form action="{{route('user.address.update',$address)}}" method="post" class="row">
                                        @csrf @method('PUT')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input class="form-control" name="fname" required type="text" id="fname"
                                                       value="{{$address->fname}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input class="form-control" name="lname" required type="text" id="lname"
                                                       value="{{$address->lname}}">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-company">Company</label>
                                                <input class="form-control" name="company" type="text" id="account-company"
                                                       value="{{$address->company}}">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="flat">Flat / Unit</label>
                                                <input class="form-control" name="flat" type="text" id="flat" value="{{$address->flat}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input class="form-control" name="address" required type="text" id="address"
                                                       value="{{$address->address}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="suburb">Suburb</label>
                                                <input class="form-control" name="suburb" required type="text" id="suburb"
                                                       value="{{$address->suburb}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input class="form-control" name="city" required type="text" id="city"
                                                       value="{{$address->city}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Contact</label>
                                                <input class="form-control" name="phone" required type="text" id="phone"
                                                       value="{{$address->phone}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zipcode">Zip Code</label>
                                                <input class="form-control" name="zipcode" required type="text" id="zipcode"
                                                       value="{{$address->zipcode}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account-country">Country</label>
                                                <select class="form-control" disabled name="country" id="account-country">
                                                    <option selected value="New Zealand">New Zealand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" name="is_default" value="1" type="checkbox"
                                                       id="ex-check-{{$address->id}}" {{$address->is_default == 1 ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ex-check-{{$address->id}}">Set as default</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-danger btn-sm" onclick="del(this)" type="button"
                                                        data-dismiss="modal">Delete
                                                </button>

                                                <button class="btn btn-primary margin-bottom-none" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="del" action="{{route('user.address.destroy',$address)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{--模态框--}}
        <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add a new address</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                    </div>

                    {{--模态框表格--}}
                    <div class="modal-body">
                        <div class="card-body col-12">


                            <form action="{{route('user.address.store')}}" method="post" class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input class="form-control" name="fname" required type="text" id="fname" value="{{old('fname')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input class="form-control" name="lname" required type="text" id="lname" value="{{old('lname')}}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-company">Company</label>
                                        <input class="form-control" name="company" type="text" id="account-company"
                                               value="{{old('company')}}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="flat">Flat / Unit</label>
                                        <input class="form-control" name="flat" type="text" id="flat" value="{{old('flat')}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control" name="address" required type="text" id="address"
                                               value="{{old('address')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="suburb">Suburb</label>
                                        <input class="form-control" name="suburb" required type="text" id="suburb"
                                               value="{{old('suburb')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input class="form-control" name="city" required type="text" id="city" value="{{old('city')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Contact</label>
                                        <input class="form-control" name="phone" required type="text" id="phone" value="{{old('phone')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zipcode">Zip Code</label>
                                        <input class="form-control" name="zipcode" required type="text" id="zipcode"
                                               value="{{old('zipcode')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-country">Country</label>
                                        <select class="form-control" disabled name="country" id="account-country">
                                            <option selected value="New Zealand">New Zealand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="is_default" value="1" type="checkbox" id="ex-check-0"
                                               checked="">
                                        <label class="custom-control-label" for="ex-check-0">Set as default</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary margin-bottom-none" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function del(obj) {
            swal({
                type: "error",
                title: "Are you sure?",
                text: "Once deleted, you will not get it back!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
                confirmButtonText: 'Yes go ahead！',
                // showConfirmButton: false,
            }).then(function (value) {
                if (value.value) {
                    $(obj).parents('form').siblings().submit();
                }
            });
        }


    </script>
@endpush
