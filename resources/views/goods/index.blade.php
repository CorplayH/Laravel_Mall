@extends('layout.admin_master')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goods.goods.index')}}" class="nav-link active">商品列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goods.goods.create')}}" class="nav-link">添加商品</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered zero-configuration dataTable"
                           id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row">
                            <th class="juzhong">id</th>
                            <th class="juzhong">图片</th>
                            <th class="juzhong">商品名称</th>
                            <th class="juzhong">商品价格 ($)</th>
                            <th class="juzhong">所属分类</th>
                            <th width="120" class="juzhong">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($goods as $good)
                            <tr role="row" class="odd">
                                <td class="juzhong">{{$good['id']}}</td>
                                <td class="juzhong">
                                    <img src="{{$good['images'][0]}}" style="height: 80px;">
                                </td>
                                <td class="juzhong">{{$good['gname']}}</td>
                                <td class="juzhong">{{$good['price']}}</td>
                                <td class="juzhong">{{$good->getCategory($good['category_id'])}}</td>
                                <td class="juzhong">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('goods.product.index',['goods' => $good])}}"
                                           class="btn btn-sm btn-success mr-1">货品列表</a>
                                        <a href="{{route('goods.goods.edit',$good)}}" class="btn btn-sm btn-info mr-1">编辑</a>
                                        <a href="javascript:;" onclick="del(this)" class="btn btn-sm btn-danger">删除</a>
                                        <form action="{{route('goods.goods.destroy',$good)}}" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
@endsection
@push('js')
    @include('layout.del')
@endpush
