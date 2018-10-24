@extends('homelayout.master')


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
                                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                                               data-toast-type="success"
                                                                                               data-toast-position="topRight"
                                                                                               data-toast-icon="icon-check-circle"
                                                                                               data-toast-title="Product"
                                                                                               data-toast-message="successfuly added to cart!"><i
                                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
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

                    @foreach($categories as $one)
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
                <!-- Widget Brand Filter-->
                <section class="widget">
                    <h3 class="widget-title">Filter by Brand</h3>
                    @foreach($data['attrs'] as $attr)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="apple{{$attr['id']}}">
                            <label class="custom-control-label" for="apple{{$attr['id']}}">{{$attr['aname']}}</label>
                        </div>
                    @endforeach
                </section>


                <!-- Widget Price Range-->
                <section class="widget widget-categories">
                    <h3 class="widget-title">Price Range</h3>
                    <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0"
                          data-max="1000" data-step="1">
                        <div class="ui-range-slider"></div>
                        <footer class="ui-range-slider-footer">
                            <div class="column">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                            </div>
                            <div class="column">
                                <div class="ui-range-values">
                                    <div class="ui-range-value-min">$<span></span>
                                        <input type="hidden">
                                    </div>&nbsp;-&nbsp;
                                    <div class="ui-range-value-max">$<span></span>
                                        <input type="hidden">
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>


                <!-- Widget Size Filter-->
                <section class="widget">
                    <h3 class="widget-title">Filter by Price</h3>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="low">
                        <label class="custom-control-label" for="low">$50 - $100L&nbsp;<span class="text-muted">(208)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="middle">
                        <label class="custom-control-label" for="middle">$100L - $500&nbsp;<span class="text-muted">(311)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="high">
                        <label class="custom-control-label" for="high">$500 - $1,000&nbsp;<span class="text-muted">(485)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="top">
                        <label class="custom-control-label" for="top">$1,000 - $5,000&nbsp;<span class="text-muted">(213)</span></label>
                    </div>
                </section>

                </aside>
            </div>
        </div>
    </div>

@endsection
