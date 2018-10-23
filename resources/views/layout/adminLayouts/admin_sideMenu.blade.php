<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
     data-img="{{asset('org/app-assets')}}/images/backgrounds/08.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo"
                                                                                        alt="Chameleon admin logo"
                                                                                        src="{{asset('org/app-assets')}}/images/logo/logo.png"/>
                    <h3 class="brand-text">Chameleon</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="/"><i class="ft-home"></i><span class="menu-title" data-i18n="">商城首页</span></a>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-grid"></i><span class="menu-title" data-i18n="">分类管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('category.category.index')}}">分类列表</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('category.category.create')}}">添加分类</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-globe"></i><span class="menu-title" data-i18n="">属性管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('goodsAttribute.goodsAttribute.index')}}">属性列表</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('goodsAttribute.goodsAttribute.create')}}">添加属性</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-package"></i><span class="menu-title" data-i18n="">商品管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('goods.goods.index')}}">商品列表</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('goods.goods.create')}}">添加商品</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-file-text"></i><span class="menu-title" data-i18n="">订单管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="">订单列表</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-user"></i><span class="menu-title" data-i18n="">用户管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="">用户列表</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="javascript:;"><i class="ft-lock"></i><span class="menu-title" data-i18n="">权限管理</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="">后台用户</a>
                    </li>
                    <li>
                        <a class="menu-item" href="">角色列表</a>
                    </li>
                    <li>
                        <a class="menu-item" href="">权限列表</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>
