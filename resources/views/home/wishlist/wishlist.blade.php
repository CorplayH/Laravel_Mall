@extends('homelayout.master')

@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            @include('homelayout.userinfomenu')

            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <!-- Wishlist Table-->
                <div class="table-responsive wishlist-table mb-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-success">My wishes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wishes as $wish)
                            <tr>
                                <td>
                                    <div class="product-item">
                                        <a class="product-thumb" href="{{route('product',$wish->goods->id)}}">
                                            <img src="{{$wish->goods->images[0]}}" alt="Product">
                                        </a>
                                        <div class="product-info">
                                            <h4 class="product-title">
                                                <a href="{{route('product',$wish->goods->id)}}">{{$wish->goods->gname}}</a>
                                            </h4>
                                            <div class="text-sm">From:
                                                <div class="d-inline text-success">${{$wish->goods->price}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title=""
                                                           data-original-title="Remove item"><i class="icon-x"
                                                                                                onclick="makeWish(this,{{$wish->goods->id}})"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <hr class="mb-4">
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function makeWish(obj, goods) {
            $.ajax({
                type: 'get',
                url: '/user/makeWish/' + goods,
                success: function (res) {
                    if (res.code == 0) {
                        $(obj).parents('tr').remove();
                        toastr.warning("Removed from your wishlist", "Removed !", {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                    }
                    if (res.code == 1) {
                        $(obj).addClass('mywishlist');
                        toastr.success("Saved to your wish list", "Great !", {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                    }
                }
            })
        }
    </script>
@endpush
