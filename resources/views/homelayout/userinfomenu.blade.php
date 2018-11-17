<div class="col-lg-4">
    <aside class="user-info-wrapper">
        <div class="user-cover" style="background-image: url({{asset('org/unishop')}}/img/account/user-cover-img.jpg);">
        </div>
        <div class="user-info">
            <div class="user-avatar">
                <a class="edit-avatar" id="avatar" href="javascript:;"></a>
                <img src="{{auth()->user()->icon ? : asset('')}}" id="userIcon" style="height: 115px; width: 115px;" alt="User">
                <form action="{{route('user.changeIcon')}}" method="post" id="changIcon">
                    @csrf
                    <input type="hidden" name="icon" id="icon" value="">
                </form>
            </div>
            <div class="user-data">
                <h4 class="h5">{{auth()->user()->name}}</h4><span>Joined at {{$joinTime}}</span>
            </div>
        </div>
    </aside>
    <nav class="list-group">
        <a class="list-group-item with-badge {{active_class(if_route('order.showOrder'))}}" href="{{route('order.showOrder')}}">
            <i class="icon-shopping-bag"></i>Orders
        </a>
        <a class="list-group-item {{active_class(if_route('user.userInfo'))}}" href="{{route('user.userInfo')}}">
            <i class="icon-user"></i>Profile
        </a>
        <a class="list-group-item {{active_class(if_route('user.address.index'))}} " href="{{route('user.address.index')}}">
            <i class="icon-map-pin"></i>Addresses
        </a>
        <a class="list-group-item with-badge {{active_class(if_route('user.wishList'))}}" href="{{route('user.wishList')}}">
            <i class="icon-heart"></i>Wishlist
        </a>
        <a class="list-group-item with-badge" href="account-tickets.html"><i class="icon-tag"></i>My
            Tickets<span class="badge badge-default badge-pill">4</span>
        </a>
    </nav>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#avatar' //绑定元素
            , url: '{{route('util.upload')}}' //上传接口
            , multiple: false
            , data: {_token: "{{csrf_token()}}"}
            , done: function (res) {
                //上传完毕回调
                if (res.code == 0) {
                    // 把返回回来的路径赋值给路径
                    $('#userIcon').attr('src',res.path);
                    //把路径的值赋给隐藏的input表单
                    $('#icon').val(res.path);
                    $('#changIcon').submit();
                }
            }
            , error: function () {
                //请求异常回调
            }
        });
    });
</script>
