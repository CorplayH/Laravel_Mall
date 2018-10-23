@extends('layout.admin_master')
@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('category.category.index')}}" class="nav-link ">分类列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.category.create')}}" class="nav-link active">添加分类</a>
                </li>
            </ul>
        </div>
        <form action="{{route('category.category.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">分类名称</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="cname">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">父级分类</label>
                    <div class="col-md-10">
                        <select name="pid" class="select2  form-control " id="basicSelect">
                            <option value="0" hd="0">顶级分类</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}" level="{{$category['_level']}}">{!!$category['_cname']  !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="upload">
                    <label class="col-md-2 label-control text-center">顶级分类图</label>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-bg-gradient-x-blue-cyan mr-1 mb-1" id="goodsPics">上传图片</button>
                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                            预览图：
                            <div class="layui-upload-list" id="box">

                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="form-group row" id="attrs" style="display: none">
                    <label class="col-md-2 label-control text-center">可用属性</label>
                    <div class="col-md-10">
                        <div class="mb-2">
                            @foreach($attributes as $attribute)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="attr{{$attribute['id']}}"
                                           value="{{$attribute['id']}}" name="attr[]">
                                    <label class="form-check-label" for="attr{{$attribute['id']}}">{{$attribute['aname']}}</label>
                                </div>
                            @endforeach
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
        $('#basicSelect').change(function () {
            // 获取当前被选中的option的value值
            var value = $(this).find('option:checked').attr('level');
            // 判断value的值是否为0,如果为0,代表要么是顶级分类,要么是某一个一级分类,这个时候,应该让可用属性的选择框隐藏,反之,让选择框出来
            if (value == 1) {
                // 让选择框隐藏
                $('#attrs').hide();
            } else if (value == 2) {
                // 让选择框显示
                $('#attrs').show();
            }

            if (value !== 0){
                $('#upload').hide();
            }else {
                $('#upload').show();
            }
        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
                        $('<img src="' + res.path + '" /><input type="hidden" name="images" value="' + res.path + '">').appendTo('#box');
                    }

                }
                , error: function () {
                    //请求异常回调
                }
            });
        });
    </script>
@endpush
