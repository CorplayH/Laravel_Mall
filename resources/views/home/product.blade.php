@extends('homelayout.master')

@section('content')


    <form class="modal fade" method="post" id="leaveReview" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Leave a Review</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Submit Review</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Page Content-->
    <div class="container padding-bottom-3x mt-5">
        <div class="row">
            <!-- Poduct Gallery-->
            <div class="col-md-6">
                <div class="product-gallery">
                    @if($goods['is_recommend'])
                        <span class="product-badge bg-danger">Recommend</span>
                    @endif
                    <div class="product-carousel owl-carousel gallery-wrapper">
                        @foreach($goods['images'] as $k=>$image)
                            <div class="gallery-item" data-hash="id{{$k}}">
                                <a href="{!! $image !!}" data-size="1000x667">
                                    <img src="{{$image}}" alt="Product">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <ul class="product-thumbnails">
                        @foreach($goods['images'] as $k => $image)
                            <li class="{{$k ==0? 'active' : ''}} "><a href="#id{{$k}}"><img src="{{$image}}" alt="Product"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Product Info-->
            <div class="col-md-6">
                <div class="padding-top-2x mt-2 hidden-md-up"></div>

                <h2 class="mb-3">{{$goods['gname']}}</h2>
                <span class="h3 d-block goodsPrice">${{$goods['price']+$product['addPrice']}}</span>
                @foreach($goodsAttrs as $attr)
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="size">Choose {{$attr['aname']}}</label>
                                <select class="form-control attrSelect">
                                    @foreach($attr['son'] as $son)
                                        <option
                                            {{ in_array($son['id'], $product['attrs'])? 'selected':''}} value="{{$son['id']}}">{{$son['aname']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row align-items-end pb-4">
                    <div class="col-sm-4">
                        <div class="form-group mb-0">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" class="form-control" type="number" min="1" value="1" max="{{$product['stock']}}"
                                   name="quantity"
                                   onblur="checkNum(this)">

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4 hidden-sm-up"></div>
                        {{--加入购物车--}}
                        <a id="addBtn" href="javascript:;" onclick="addToCart()"
                           {{$product['stock'] == 0? 'disabled': '' }} class="btn btn-primary btn-block m-0"> {{$product['stock'] == 0? 'Out of stock': 'Add to cart' }}
                        </a>

                    </div>
                </div>
                <div class="pt-1 mb-4 text-medium" id="stock">Stock:&nbsp;{{$product['stock']}}</div>
                <hr class="mb-2">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="mt-2 mb-2">
                        <button class="btn btn-outline-secondary btn-sm btn-wishlist"><i class="icon-heart"></i>&nbsp;To Wishlist</button>
                    </div>


                    <div class="mt-2 mb-2"><span class="text-muted">Share:&nbsp;&nbsp;</span>
                        <div class="d-inline-block"><a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip"
                                                       data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a
                                class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top"
                                title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-rounded sb-instagram"
                                                                                      href="#" data-toggle="tooltip" data-placement="top"
                                                                                      title="Instagram"><i
                                    class="socicon-instagram"></i></a><a class="social-button shape-rounded sb-google-plus" href="#"
                                                                         data-toggle="tooltip" data-placement="top" title="Google +"><i
                                    class="socicon-googleplus"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details-->
    <div class="bg-secondary padding-top-3x padding-bottom-2x mb-3" id="details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h4">Details</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <h3 class="h4">Features</h3>
                    <ul class="list-icon mb-4">
                        <li><i class="icon-check text-success"></i>Capture 4K30 Video and 12MP Photos</li>
                        <li><i class="icon-check text-success"></i>Game-Style Controller with Touchscreen</li>
                        <li><i class="icon-check text-success"></i>View Live Camera Feed</li>
                        <li><i class="icon-check text-success"></i>Full Control of HERO6 Black</li>
                        <li><i class="icon-check text-success"></i>Use App for Dedicated Camera Operation</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="h4">Specifications</h3>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Weight:</strong> 35.5oz (1006g)</li>
                        <li><strong>Maximum Speed:</strong> 35 mph (15 m/s)</li>
                        <li><strong>Maximum Distance:</strong> Up to 9,840ft (3,000m)</li>
                        <li><strong>Operating Frequency:</strong> 2.4GHz</li>
                        <li><strong>Manufacturer:</strong> GoPro, USA</li>
                    </ul>
                    <h3 class="h4">Shipping Options:</h3>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Courier:</strong> 2 - 4 days, $22.50</li>
                        <li><strong>Local Shipping:</strong> up to one week, $10.00</li>
                        <li><strong>UPS Ground Shipping:</strong> 4 - 6 days, $18.00</li>
                        <li><strong>Unishop Global Export:</strong> 3 - 4 days, $25.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Reviews-->
    <div class="container padding-top-2x">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-default">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="d-inline align-baseline display-3 mr-1">4.2</div>
                            <div class="d-inline align-baseline text-sm text-warning mr-1">
                                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i
                                        class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <label class="text-medium text-sm">5 stars <span class='text-muted'>- 38</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%; height: 2px;" aria-valuenow="75"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">4 stars <span class='text-muted'>- 10</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%; height: 2px;" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">3 stars <span class='text-muted'>- 3</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 7%; height: 2px;" aria-valuenow="7"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">2 stars <span class='text-muted'>- 1</span></label>
                            <div class="progress margin-bottom-1x">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 3%; height: 2px;" aria-valuenow="3"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <label class="text-medium text-sm">1 star <span class='text-muted'>- 0</span></label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0; height: 2px;" aria-valuenow="0"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="pt-2"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">Leave
                                a Review</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="padding-bottom-1x">Latest Reviews</h3>
                <!-- Review-->
                <div class="comment">
                    <div class="comment-author-ava"><img src="img/reviews/02.jpg" alt="Comment author"></div>
                    <div class="comment-body">
                        <div class="comment-header d-flex flex-wrap justify-content-between">
                            <h4 class="comment-title">My husband love his new...</h4>
                            <div class="mb-2">
                                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i
                                        class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                        <div class="comment-footer"><span class="comment-meta">Maggie Scott</span></div>
                    </div>
                </div>
                <!-- Review-->
                <div class="comment">
                    <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Comment author"></div>
                    <div class="comment-body">
                        <div class="comment-header d-flex flex-wrap justify-content-between">
                            <h4 class="comment-title">Awesome quality for the price</h4>
                            <div class="mb-2">
                                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i
                                        class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
                                </div>
                            </div>
                        </div>
                        <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium...</p>
                        <div class="comment-footer"><span class="comment-meta">Jacob Hammond</span></div>
                    </div>
                </div>
                <!-- View All Button--><a class="btn btn-secondary btn-block" href="#">View All Reviews</a>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1">
        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
        <!-- Carousel-->
        <div class="owl-carousel"
             data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            <!-- Product-->
            <div class="product-card">
                <div class="product-badge bg-danger">Sale</div>
                <a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Smart home</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Echo Dot (2nd Generation)</a></h3>
                    <h4 class="product-price">
                        <del>$62.00</del>
                        $49.99
                    </h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/11.jpg"
                                                                                            alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Headphones</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Edifier W855BT Bluetooth</a></h3>
                    <h4 class="product-price">$99.75</h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i
                        class="icon-star filled"></i><i class="icon-star filled"></i>
                </div>
                <a class="product-thumb" href="shop-single.html"><img src="img/shop/products/06.jpg" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Video games</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Xbox One S White</a></h3>
                    <h4 class="product-price">$298.99</h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/07.jpg"
                                                                                            alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Smartphones</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Samsung Galaxy S9+</a></h3>
                    <h4 class="product-price">$839.99</h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card">
                <div class="product-badge bg-secondary border-default text-body">Out of stock</div>
                <a class="product-thumb" href="shop-single.html"><img src="img/shop/products/12.jpg" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Wearable electornics</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Apple Watch Series 3</a></h3>
                    <h4 class="product-price">$329.10</h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="shop-single.html"><i
                            class="icon-arrow-right"></i><span>Details</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i
                        class="icon-star filled"></i><i class="icon-star"></i>
                </div>
                <a class="product-thumb" href="shop-single.html"><img src="img/shop/products/10.jpg" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Printers &amp; Ink</a></div>
                    <h3 class="product-title"><a href="shop-single.html">HP LaserJet Pro Printer</a></h3>
                    <h4 class="product-price">$249.50</h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
            <!-- Product-->
            <div class="product-card">
                <div class="product-badge bg-danger">Sale</div>
                <a class="product-thumb" href="shop-single.html"><img src="img/shop/products/09.jpg" alt="Product"></a>
                <div class="product-card-body">
                    <div class="product-category"><a href="#">Action cameras</a></div>
                    <h3 class="product-title"><a href="shop-single.html">Samsung Gear 360 Camera</a></h3>
                    <h4 class="product-price">
                        <del>$74.00</del>
                        $68.00
                    </h4>
                </div>
                <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i
                            class="icon-heart"></i><span>Wishlist</span></a><a class="product-button" href="#" data-toast
                                                                               data-toast-type="success" data-toast-position="topRight"
                                                                               data-toast-icon="icon-check-circle"
                                                                               data-toast-title="Product"
                                                                               data-toast-message="successfuly added to cart!"><i
                            class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
        </div>
    </div>
    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var productId = {{$product['id']}};
        $('.attrSelect').change(function () {
            // 循环当前页面的所有select元素
            var attrs = [];
            $.each($('.attrSelect'), function (k, v) {
                // v就是每个属性选择select的元素对象,获取每个select元素对象的value值,拼接成一个数组
                attrs.push($(v).val());
            })
            // 发送异步请求,将获取到的属性组合数组和当前商品id传递到去后台,找对应的货品
            $.ajax({
                url: '/getProduct/' + attrs + '/{{$goods['id']}}',
                method: 'get',
                dataType: 'json',
                success: function (res) {
                    $('.goodsPrice').html('$' + res.price);
                    if (res.stock == 0 || !res || !res.stock) {
                        $('#addBtn').attr('disabled', 'disabled').html('Out of stock');
                        $('#stock').html('Stock: ' + 0);
                    } else {
                        console.log(res);
                        $('#addBtn').removeAttr('disabled').html('Add to cart');
                        $('#stock').html('Stock: ' + res.stock);
                        $('#quantity').attr('max', res.stock);
                        // 获取选择后的 货品 ID
                        productId = res.id
                    }
                }
            })
        });

        function checkNum(obj) {
            // 获取当前输入购买数量的值
            var num = Number($(obj).val());
            // 获取当前商品可以购买的最大数量
            var maxNum = Number($(obj).attr('max'));
            // 判断如果当前的超过了最大值,提示用户,不能购买这么多,然后将填写的值改成最大的
            if (num > maxNum) {
                $(obj).val(maxNum);
                return false;
            }
        }
        function addToCart() {
            var goods_id = {{$goods['id']}};
            var product_id = productId;
            var num = $('#quantity').val();
            location.href = '/cart/addToCart/' + goods_id + '/' + product_id + '/' + num;
        }
    </script>
@endpush
