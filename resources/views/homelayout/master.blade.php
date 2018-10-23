<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Unishop | Universal E-Commerce Template
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords"
          content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    @stack('css')
    <link rel="icon" type="image/x-icon" href="/favio.ico">
    <link rel="icon" type="image/png" href="/favio.ico">
    <link rel="apple-touch-icon" href="/favio.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="/favio.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/favio.ico">
    <link rel="apple-touch-icon" sizes="167x167" href="/favio.ico">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{asset('org/unishop/css')}}/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('org/unishop/css')}}/styles.min.css">
    <!-- Modernizr-->
    <script src="{{asset('org/unishop/js')}}/modernizr.min.js"></script>
    {{--<link href="https://cdn.bootcss.com/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">--}}

</head>
<!-- Body-->
<body>
<!-- Header-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="site-header navbar-sticky">
    <!-- Topbar-->
    <div class="topbar d-flex justify-content-between">
        <!-- Logo-->
        <div class="site-branding d-flex"><a class="site-logo align-self-center" href="/"><img
                    src="/logo1.png" alt="Unishop"></a></div>
        <!-- Search / Categories-->
        <div class="search-box-wrap d-flex">
            <div class="search-box-inner align-self-center">
                <div class="search-box d-flex">
                    <div class="btn-group categories-btn">
                        <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="icon-menu text-lg"></i>&nbsp;Categories
                        </button>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="row">

                                @foreach($categories as $category)
                                    <div class="col-sm-3">
                                        <a class="d-block navi-link text-center mb-30" href="/lists/{{$category['id']}}">
                                            <img class="d-block" src="{{$category['images']}} " style="width: 137px; height: 137px">
                                            <span class="text-gray-dark">{{$category['cname']}}</span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                    <form class="input-group" method="get"><span class="input-group-btn">
                  <button type="submit"><i class="icon-search"></i></button></span>
                        <input class="form-control" type="search" placeholder="Search for anything">
                    </form>
                </div>
            </div>
        </div>
        <!-- Toolbar-->
        <div class="toolbar d-flex">
            <div class="toolbar-item visible-on-mobile mobile-menu-toggle"><a href="#">
                    <div><i class="icon-menu"></i><span class="text-label">Menu</span></div>
                </a></div>

            <div class="toolbar-item hidden-on-mobile"><a href="account-login.html">
                    <div><i class="icon-user"></i><span class="text-label">Sign In / Up</span></div>
                </a>
                <div class="toolbar-dropdown text-center px-3">
                    <p class="text-xs mb-3 pt-2">Sign in to your account or register new one to have full control over your orders, receive
                        bonuses and more.</p><a class="btn btn-primary btn-sm btn-block" href="account-login.html">Sign In</a>
                    <p class="text-xs text-muted mb-2">New customer?&nbsp;<a href="account-login.html">Register</a></p>
                </div>
            </div>
            <div class="toolbar-item"><a href="cart.html">
                    <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span class="count-label">3   </span></span><span
                            class="text-label">Cart</span></div>
                </a>
                <div class="toolbar-dropdown cart-dropdown widget-cart hidden-on-mobile">
                    <!-- Entry-->
                    <div class="entry">
                        <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/04.jpg"
                                                                                 alt="Product"></a></div>
                        <div class="entry-content">
                            <h4 class="entry-title"><a href="shop-single.html">Canon EOS M50 Mirrorless Camera</a></h4><span
                                class="entry-meta">1 x $910.00</span>
                        </div>
                        <div class="entry-delete"><i class="icon-x"></i></div>
                    </div>
                    <!-- Entry-->
                    <div class="entry">
                        <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/05.jpg"
                                                                                 alt="Product"></a></div>
                        <div class="entry-content">
                            <h4 class="entry-title"><a href="shop-single.html">Apple iPhone X 256 GB Space Gray</a></h4><span
                                class="entry-meta">1 x $1,450.00</span>
                        </div>
                        <div class="entry-delete"><i class="icon-x"></i></div>
                    </div>
                    <!-- Entry-->
                    <div class="entry">
                        <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/06.jpg"
                                                                                 alt="Product"></a></div>
                        <div class="entry-content">
                            <h4 class="entry-title"><a href="shop-single.html">HP LaserJet Pro Laser Printer</a></h4><span
                                class="entry-meta">1 x $188.50</span>
                        </div>
                        <div class="entry-delete"><i class="icon-x"></i></div>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;$2,548.50</p>
                    </div>
                    <div class="d-flex">
                        <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="cart.html">Expand Cart</a></div>
                        <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="checkout.html">Checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu-->
        <div class="mobile-menu">
            <!-- Search Box-->
            <div class="mobile-search">
                <form class="input-group" method="get"><span class="input-group-btn">
                <button type="submit"><i class="icon-search"></i></button></span>
                    <input class="form-control" type="search" placeholder="Search site">
                </form>
            </div>
            <!-- Toolbar-->
            <div class="toolbar">

                <div class="toolbar-item"><a href="account-login.html">
                        <div><i class="icon-user"></i><span class="text-label">Sign In / Up</span></div>
                    </a></div>
            </div>
            <!-- Slideable (Mobile) Menu-->
            <nav class="slideable-menu">
                <ul class="menu" data-initial-height="385">
                    <li class="active">
                        <span>
                            <a href="/">Home</a>
                            <span class="sub-menu"></span>
                        </span>
                    </li>
                    <li class="has-children"><span><a href="shop-grid-ls.html">Shop</a><span class="sub-menu"></span></span>
                        <ul class="slideable-submenu">
                            <li><a href="shop-categories.html">Shop Categories</a></li>
                            <li class="has-children"><span><a href="shop-grid-ls.html">Shop Grid</a><span
                                        class="sub-menu-toggle"></span></span>
                                <ul class="slideable-submenu">
                                    <li><a href="shop-grid-ls.html">Grid Left Sidebar</a></li>
                                    <li><a href="shop-grid-rs.html">Grid Right Sidebar</a></li>
                                    <li><a href="shop-grid-ns.html">Grid No Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><span><a href="shop-list-ls.html">Shop List</a><span
                                        class="sub-menu-toggle"></span></span>
                                <ul class="slideable-submenu">
                                    <li><a href="shop-list-ls.html">List Left Sidebar</a></li>
                                    <li><a href="shop-list-rs.html">List Right Sidebar</a></li>
                                    <li><a href="shop-list-ns.html">List No Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-single.html">Single Product</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li class="has-children"><span><a href="checkout-address.html">Checkout</a><span class="sub-menu-toggle"></span></span>
                                <ul class="slideable-submenu">
                                    <li><a href="checkout-address.html">Address</a></li>
                                    <li><a href="checkout-shipping.html">Shipping</a></li>
                                    <li><a href="checkout-payment.html">Payment</a></li>
                                    <li><a href="checkout-review.html">Review</a></li>
                                    <li><a href="checkout-complete.html">Complete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children"><span><a href="#">Categories</a><span class="sub-menu-toggle"></span></span>
                        <ul class="slideable-submenu">
                            <li><a href="#">Computers &amp; Accessories</a></li>
                            <li><a href="#">Smartphones &amp; Tablets</a></li>
                            <li><a href="#">TV, Video &amp; Audio</a></li>
                            <li><a href="#">Cameras, Photo &amp; Video</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Wearable Electronics</a></li>
                            <li><a href="#">Printers &amp; Ink</a></li>
                            <li><a href="#">Video Games</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><span><a href="account-orders.html">Account</a><span class="sub-menu-toggle"></span></span>
                        <ul class="slideable-submenu">
                            <li><a href="account-login.html">Login / Register</a></li>
                            <li><a href="account-password-recovery.html">Password Recovery</a></li>
                            <li><a href="account-orders.html">Orders List</a></li>
                            <li><a href="account-wishlist.html">Wishlist</a></li>
                            <li><a href="account-profile.html">Profile Page</a></li>
                            <li><a href="account-address.html">Contact / Shipping Address</a></li>
                            <li><a href="account-open-ticket.html">Open Ticket</a></li>
                            <li><a href="account-tickets.html">My Tickets</a></li>
                            <li><a href="account-single-ticket.html">Single Ticket</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><span><a href="blog-rs.html">Blog</a><span class="sub-menu-toggle"></span></span>
                        <ul class="slideable-submenu">
                            <li class="has-children"><span><a href="blog-rs.html">Blog Layout</a><span
                                        class="sub-menu-toggle"></span></span>
                                <ul class="slideable-submenu">
                                    <li><a href="blog-rs.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-ls.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-ns.html">Blog No Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><span><a href="blog-single-rs.html">Single Post Layout</a><span
                                        class="sub-menu-toggle"></span></span>
                                <ul class="slideable-submenu">
                                    <li><a href="blog-single-rs.html">Post Right Sidebar</a></li>
                                    <li><a href="blog-single-ls.html">Post Left Sidebar</a></li>
                                    <li><a href="blog-single-ns.html">Post No Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children"><span><a href="#">Pages</a><span class="sub-menu-toggle"></span></span>
                        <ul class="slideable-submenu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="faq.html">Help / FAQ</a></li>
                            <li><a href="product-comparison.html">Product Comparison</a></li>
                            <li><a href="order-tracking.html">Order Tracking</a></li>
                            <li><a href="search-results.html">Search Results</a></li>
                            <li><a href="404.html">404 Not Found</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a class="text-danger" href="docs/dev-setup.html">Documentation</a></li>
                        </ul>
                    </li>
                    <li class="has-children"><span><a href="components/accordion.html">Components</a><span
                                class="sub-menu-toggle"></span></span>
                        <ul class="slideable-submenu">
                            <li><a href="components/accordion.html">Accordion</a></li>
                            <li><a href="components/alerts.html">Alerts</a></li>
                            <li><a href="components/buttons.html">Buttons</a></li>
                            <li><a href="components/cards.html">Cards</a></li>
                            <li><a href="components/carousel.html">Carousel</a></li>
                            <li><a href="components/countdown.html">Countdown</a></li>
                            <li><a href="components/forms.html">Forms</a></li>
                            <li><a href="components/gallery.html">Gallery</a></li>
                            <li><a href="components/google-maps.html">Google Maps</a></li>
                            <li><a href="components/images.html">Images &amp; Figures</a></li>
                            <li><a href="components/list-group.html">List Group</a></li>
                            <li><a href="components/market-social-buttons.html">Market &amp; Social Buttons</a></li>
                            <li><a href="components/media.html">Media Object</a></li>
                            <li><a href="components/modal.html">Modal</a></li>
                            <li><a href="components/pagination.html">Pagination</a></li>
                            <li><a href="components/pills.html">Pills</a></li>
                            <li><a href="components/progress-bars.html">Progress Bars</a></li>
                            <li><a href="components/shop-items.html">Shop Items</a></li>
                            <li><a href="components/steps.html">Steps</a></li>
                            <li><a href="components/tables.html">Tables</a></li>
                            <li><a href="components/tabs.html">Tabs</a></li>
                            <li><a href="components/team.html">Team</a></li>
                            <li><a href="components/toasts.html">Toast Notifications</a></li>
                            <li><a href="components/tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                            <li><a href="components/typography.html">Typography</a></li>
                            <li><a href="components/video-player.html">Video Player</a></li>
                            <li><a href="components/widgets.html">Widgets</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Navbar-->
    <div class="navbar">
        <div class="btn-group categories-btn">
            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="icon-menu text-lg"></i>&nbsp;Categories
            </button>
            <div class="dropdown-menu mega-dropdown">
                <div class="row">


                    @foreach($categories as $category)
                        <div class="col-sm-3">
                            <a class="d-block navi-link text-center mb-30" href="shop-grid-ls.html">
                                <img class="d-block" src="{{$category['images']}}" style="width: 137px; height: 137px">
                                <span class="text-gray-dark">{{$category['cname']}}</span>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Main Navigation-->
        <nav class="site-menu">
            <ul>
                <li class=" {{ active_class(if_uri('/')) }}"><a href="/">Home</a>

                </li>
                <li class="has-megamenu {{ active_class(if_route('lists')) }}"><a href="javascript:;">Browse Products</a>

                    <ul class="mega-menu">
                        @foreach($categories as $category)
                            <li>
                                <a href="/lists/{{$category['id']}}">
                                    <span class="mega-menu-title">{{$category['cname']}}</span>
                                </a>
                                <ul class="sub-menu">
                                    @foreach($category['_data'] as $second)
                                        <li><a href="/lists/{{$second['id']}}">{{$second['cname']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="has-submenu"><a href="account-orders.html">Account</a>
                    <ul class="sub-menu">
                        <li><a href="account-login.html">Login / Register</a></li>
                        <li><a href="account-password-recovery.html">Password Recovery</a></li>
                        <li><a href="account-orders.html">Orders List</a></li>
                        <li><a href="account-wishlist.html">Wishlist</a></li>
                        <li><a href="account-profile.html">Profile Page</a></li>
                        <li><a href="account-address.html">Contact / Shipping Address</a></li>
                        <li><a href="account-tickets.html">My Tickets</a></li>
                        <li><a href="account-single-ticket.html">Single Ticket</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="blog-rs.html">Blog</a>
                    <ul class="sub-menu">
                        <li class="has-children"><a href="blog-rs.html">Blog Layout</a>
                            <ul class="sub-menu">
                                <li><a href="blog-rs.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-ls.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-ns.html">Blog No Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="has-children"><a href="blog-single-rs.html">Single Post Layout</a>
                            <ul class="sub-menu">
                                <li><a href="blog-single-rs.html">Post Right Sidebar</a></li>
                                <li><a href="blog-single-ls.html">Post Left Sidebar</a></li>
                                <li><a href="blog-single-ns.html">Post No Sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="faq.html">Help / FAQ</a></li>
                        <li><a href="product-comparison.html">Product Comparison</a></li>
                        <li><a href="order-tracking.html">Order Tracking</a></li>
                        <li><a href="search-results.html">Search Results</a></li>
                        <li><a href="404.html">404 Not Found</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                        <li><a class="text-danger" href="docs/dev-setup.html">Documentation</a></li>
                    </ul>
                </li>
                <li class="has-megamenu"><a href="components/accordion.html">Components</a>
                    <ul class="mega-menu">
                        <li><span class="mega-menu-title">A - F</span>
                            <ul class="sub-menu">
                                <li><a href="components/accordion.html">Accordion</a></li>
                                <li><a href="components/alerts.html">Alerts</a></li>
                                <li><a href="components/buttons.html">Buttons</a></li>
                                <li><a href="components/cards.html">Cards</a></li>
                                <li><a href="components/carousel.html">Carousel</a></li>
                                <li><a href="components/countdown.html">Countdown</a></li>
                                <li><a href="components/forms.html">Forms</a></li>
                            </ul>
                        </li>
                        <li><span class="mega-menu-title">G - M</span>
                            <ul class="sub-menu">
                                <li><a href="components/gallery.html">Gallery</a></li>
                                <li><a href="components/google-maps.html">Google Maps</a></li>
                                <li><a href="components/images.html">Images &amp; Figures</a></li>
                                <li><a href="components/list-group.html">List Group</a></li>
                                <li><a href="components/market-social-buttons.html">Market &amp; Social Buttons</a></li>
                                <li><a href="components/media.html">Media Object</a></li>
                                <li><a href="components/modal.html">Modal</a></li>
                            </ul>
                        </li>
                        <li><span class="mega-menu-title">P - T</span>
                            <ul class="sub-menu">
                                <li><a href="components/pagination.html">Pagination</a></li>
                                <li><a href="components/pills.html">Pills</a></li>
                                <li><a href="components/progress-bars.html">Progress Bars</a></li>
                                <li><a href="components/shop-items.html">Shop Items</a></li>
                                <li><a href="components/steps.html">Steps</a></li>
                                <li><a href="components/tables.html">Tables</a></li>
                                <li><a href="components/tabs.html">Tabs</a></li>
                            </ul>
                        </li>
                        <li><span class="mega-menu-title">T - W</span>
                            <ul class="sub-menu">
                                <li><a href="components/team.html">Team</a></li>
                                <li><a href="components/toasts.html">Toast Notifications</a></li>
                                <li><a href="components/tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                                <li><a href="components/typography.html">Typography</a></li>
                                <li><a href="components/video-player.html">Video Player</a></li>
                                <li><a href="components/widgets.html">Widgets</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Toolbar ( Put toolbar here only if you enable sticky navbar )-->
        <div class="toolbar">
            <div class="toolbar-inner">
                <div class="toolbar-item"><a href="product-comparison.html">
                        <div><span class="compare-icon"><i class="icon-repeat"></i><span class="count-label">3</span></span><span
                                class="text-label">Compare</span></div>
                    </a></div>
                <div class="toolbar-item"><a href="cart.html">
                        <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span class="count-label">3   </span></span><span
                                class="text-label">Cart</span></div>
                    </a>
                    <div class="toolbar-dropdown cart-dropdown widget-cart">
                        <!-- Entry-->
                        <div class="entry">
                            <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/04.jpg"
                                                                                     alt="Product"></a></div>
                            <div class="entry-content">
                                <h4 class="entry-title"><a href="shop-single.html">Canon EOS M50 Mirrorless Camera</a></h4><span
                                    class="entry-meta">1 x $910.00</span>
                            </div>
                            <div class="entry-delete"><i class="icon-x"></i></div>
                        </div>
                        <!-- Entry-->
                        <div class="entry">
                            <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/05.jpg"
                                                                                     alt="Product"></a></div>
                            <div class="entry-content">
                                <h4 class="entry-title"><a href="shop-single.html">Apple iPhone X 256 GB Space Gray</a></h4><span
                                    class="entry-meta">1 x $1,450.00</span>
                            </div>
                            <div class="entry-delete"><i class="icon-x"></i></div>
                        </div>
                        <!-- Entry-->
                        <div class="entry">
                            <div class="entry-thumb"><a href="shop-single.html"><img src="{{asset('org/unishop/img')}}/shop/widget/06.jpg"
                                                                                     alt="Product"></a></div>
                            <div class="entry-content">
                                <h4 class="entry-title"><a href="shop-single.html">HP LaserJet Pro Laser Printer</a></h4><span
                                    class="entry-meta">1 x $188.50</span>
                            </div>
                            <div class="entry-delete"><i class="icon-x"></i></div>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;$2,548.50</p>
                        </div>
                        <div class="d-flex">
                            <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="cart.html">Expand Cart</a></div>
                            <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="checkout.html">Checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Content-->
@yield('content')

<!-- Site Footer-->
<footer class="site-footer" style="background-image: url(img/footer-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Categories-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">Shop Departments</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="#">Computers &amp; Accessories</a></li>
                                <li><a href="#">Smartphones &amp; Tablets</a></li>
                                <li><a href="#">TV, Video &amp; Audio</a></li>
                                <li><a href="#">Cameras, Photo &amp; Video</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Wearable Electronics</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="#">Printers &amp; Ink</a></li>
                                <li><a href="#">Video Games</a></li>
                                <li><a href="#">Car Electronics</a></li>
                                <li><a href="#">Smart Home, IoT</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <li><a href="#">Software</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- About Us-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">About Us</h3>
                    <ul>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">About Unishop</a></li>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Account / Shipping Info-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">Account &amp; Shipping Info</h3>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Shipping Rates & Policies</a></li>
                        <li><a href="#">Refunds & Replacements</a></li>
                        <li><a href="#">Taxes</a></li>
                        <li><a href="#">Delivery Info</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                    </ul>
                </section>
            </div>
        </div>
        <hr class="hr-light mt-2 margin-bottom-2x hidden-md-down">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Contact Info-->
                <section class="widget widget-light-skin">
                    <h3 class="widget-title">Get In Touch With Us</h3>
                    <p class="text-white">Phone: +1 (900) 33 169 7720</p>
                    <ul class="list-unstyled text-sm text-white">
                        <li><span class="opacity-50">Monday-Friday:&nbsp;</span>9.00 am - 8.00 pm</li>
                        <li><span class="opacity-50">Saturday:&nbsp;</span>10.00 am - 6.00 pm</li>
                    </ul>
                    <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a
                        class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a
                        class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a
                        class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a
                        class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Mobile App Buttons-->
                <section class="widget widget-light-skin">
                    <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span
                            class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a
                        class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span
                            class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span
                            class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
                </section>
            </div>
            <div class="col-lg-6">
                <!-- Subscription-->
                <section class="widget widget-light-skin">
                    <h3 class="widget-title">Be Informed</h3>
                    <form class="row"
                          action="//rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544"
                          method="post" target="_blank" novalidate>
                        <div class="col-sm-9">
                            <div class="input-group input-light">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span
                                    class="input-group-addon"><i class="icon-mail"></i></span>
                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                            </div>
                            <p class="form-text text-sm text-white opacity-50 pt-2">Subscribe to our Newsletter to receive early discount
                                offers, latest news, sales and promo information.</p>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-primary btn-block mt-0" type="submit">Subscribe</button>
                        </div>
                    </form>
                    <div class="pt-3"><img class="d-block" style="width: 324px;" alt="Cerdit Cards"
                                           src="{{asset('org/unishop/img')}}/credit-cards-footer.png"></div>
                </section>
            </div>
        </div>
        <!-- Copyright-->
        <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a
                href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
    </div>
</footer>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>
<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
<script src="{{asset('org/unishop/js')}}/vendor.min.js"></script>
<script src="{{asset('org/unishop/js')}}/scripts.min.js"></script>
@stack('js')
</body>
</html>