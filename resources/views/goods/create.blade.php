@extends('layout.admin_master')
@push('css')
    <style>
        #box img {
            width: 120px;
            margin-right: 10px;
            padding: 10px;
            height: 120px;
        }
    </style>
@endpush


@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goods.goods.index')}}" class="nav-link">商品列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goods.goods.create')}}" class="nav-link active">添加商品</a>
                </li>
            </ul>
        </div>
        <form action="{{route('goods.goods.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">商品名称</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="gname">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">商品价格</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">所属分类</label>
                    <div class="col-md-3">
                        <select name="category_id[]" class="select2 form-control" id="topCategory">

                            <option value="">选择顶级分类</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['cname']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="category_id[]" class="select2 form-control" id="secondCategory">
                            <option value="">选择二级分类</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="category_id[]" class="select2 form-control" id="thirdCategory">
                            <option value="">选择三级分类</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">可用属性</label>
                    <div class="col-md-10" id="attrs">

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">商品图片</label>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-bg-gradient-x-blue-cyan mr-1 mb-1" id="goodsPics">上传图片</button>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="box">

                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">商品详情</label>
                    <div class="col-md-10">
                        <div id="editormd">
                            <textarea id="editormd-markdown" name="description" style="display:none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row" id="recommend">
                    <label class="col-md-2 label-control text-center">是否推荐</label>
                    <div class="col-md-10" id="is_recommend">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="is_recommend" id="is_recommend" value="1">
                            <label class="form-check-label" for="is_commend">是</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-bg-gradient-x-purple-blue">保存数据</button>
            </div>

        </form>
    </div>
@endsection


@push('js')
    <script>
        $('#topCategory').change(function () {
            // 当顶级分类被选中的时候, 二级三级分类清空
            $('#secondCategory').html('<option value="">Choose level two category</option>')
            $('#thirdCategory').html('<option value="">Choose level three category</option>')
            $('#attrs').html('');
            // 开始异步请求数据
            // 1. 取到 当前 选中分类 的值
            var id = $(this).val();
            // 2. 发送异步请求
            $.ajax({
                url: '/dash/getChildren/' + id,
                method: 'get',
                dataType: 'json',
                success: function (res) {
                    var html = '';
                    $.each(res, function (k, v) {
                        html += '<option value="' + v.id + '">' + v.cname + '</option>'
                    });
                    $('#secondCategory').append(html)
                }
            })

        });

        $('#secondCategory').change(function () {
            // 当二级分类被选中的时候, 三级分类清空
            $('#thirdCategory').html('<option value="">Choose level three category</option>');
            $('#attrs').html('');
            // 开始异步请求数据
            // 1. 取到 当前 选中分类 的值
            var id = $(this).val();
            // 2. 发送异步请求
            $.ajax({
                url: '/dash/getChildren/' + id,
                method: 'get',
                dataType: 'json',
                success: function (res) {
                    var html = '';
                    $.each(res, function (k, v) {
                        html += '<option value="' + v.id + '">' + v.cname + '</option>'
                    });
                    $('#thirdCategory').append(html)
                }
            })

        });

        // 当三级分类选中时, 找所有可用属性
        $('#thirdCategory').change(function () {
            $('#attrs').html('');
            var id = $(this).val();
            $.ajax({
                url: '/dash/getAttr/' + id,
                method: 'get',
                dataType: 'json',
                success: function (res) {
                    var html = '';
                    $.each(res, function (k, v) {
                        html += '<div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="attrs[]" id="attr' + v.id + '" value="' + v.id + '"><label class="form-check-label" for="attr' + v.id + '">' + v.aname + '</label></div>'
                    });
                    $('#attrs').html(html);
                }

            })
        });
    </script>
    <script>
        // 自定义editor.md编辑器
        $(function () {
            var editor = editormd("editormd", {
                width: "100%",
                height: 400,
                path: "{{asset('org/editor.md/lib')}}/",
                saveHTMLToTextarea: true
            });
        });
    </script>
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
                elem: '#goodsPics' //绑定元素
                , url: '/util/upload' //上传接口
                , multiple: true
                , done: function (res) {
                    //上传完毕回调
                    if (res.code == 0){
                        // 将返回的上传图片的地址,用img标签展示
                        $('<img src="' + res.path + '" /><input type="hidden" name="images[]" value="' + res.path + '">').appendTo('#box');
                    }

                }
                , error: function () {
                    //请求异常回调
                }
            });
        });
    </script>

@endpush
