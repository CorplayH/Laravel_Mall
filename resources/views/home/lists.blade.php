@extends('homelayout.master')
@push('css')
    <style>
        .mywishlist i {
            color: #f44336;
        }
    </style>
@endpush

@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>{{$category['cname']}}</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>{{$category['cname']}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            <!-- Products-->
            <div class="col-lg-9 order-lg-2">
                <!-- Products Grid-->
                <div class="row" style="margin-top: 30px; ">
                    @foreach($data['goods'] as $goods)
                        <div class="col-md-4 col-sm-6">
                            <div class="product-card mb-30">
                                @if($goods['is_recommend'])
                                    <div class="product-badge bg-danger">Recommend!</div>
                                @endif
                                <a class="product-thumb" href="/product/{{$goods['id']}}"><img src="{{$goods['images'][0]}}" alt="Product"></a>

                                <div class="product-card-body">
                                    <div class="product-category"><span class="text-muted">{{$goods->thirdName->cname}}</span></div>
                                    <h3 class="product-title"><a href="/product/{{$goods['id']}}">{{$goods['gname']}}</a></h3>
                                    <div class="product-category"><a href="#">from</a></div>
                                    <h4 class="product-price">
                                        ${{$goods['price']}}
                                    </h4>
                                </div>

                                <div class="product-button-group">
                                    <a class="product-button @if($goods->hasWish($goods)) mywishlist @endif" href="javascript:;"
                                       onclick="makeWish(this,{{$goods['id']}})">

                                        <i class="icon-heart"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <a class="product-button" href="javascript:;">
                                        <i class="icon-shopping-cart"></i>
                                        <span>To Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                <nav class="pagination">
                    <div class="column">
                        <ul class="pages">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">12</a></li>
                        </ul>
                    </div>
                    <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i
                                class="icon-chevron-right"></i></a></div>

                </nav>
            </div>
            <!-- Sidebar          -->
            <div class="col-lg-3 order-lg-1">
                <!-- Widget Categories-->
                <section class="widget widget-categories">
                    <h3 class="widget-title">All Categorise</h3>

                    @foreach($categoriesHome as $one)
                        <ul>
                            <li class="has-children expanded {{$category['cname'] == $one['cname'] ? 'active' : ''}}"><a
                                    href="#">{{$one['cname']}}</a>
                                @foreach($one['_data'] as $second)
                                    <ul>
                                        <li class="{{$category['cname'] == $second['cname'] ? 'active' : ''}}"><a
                                                href="/lists/{{$second['id']}}">{{$second['cname']}}</a>
                                            @foreach($second['_data'] as $third)
                                                <ul>
                                                    <li class="{{$category['cname'] == $third['cname'] ? 'active' : ''}}"><a
                                                            href="/lists/{{$third['id']}}">{{$third['cname']}}</a></li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        </ul>
                    @endforeach
                </section>
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
                    switch (res.code) {
                        case 0:
                            $(obj).removeClass('mywishlist');
                            toastr.warning("Removed from your wishlist", "Removed !", {"showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000});
                            break;
                        case 1:
                            $(obj).addClass('mywishlist');
                            toastr.success("Saved to your wish list", "Great !", {"showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000});
                            break;
                    }
                }
            })
        }
    </script>
@endpush
