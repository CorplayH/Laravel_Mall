@extends('layout.admin_master')

@section('content')
    <div class="card">

        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goods.product.index',['goods'=>$goods['id']])}}" class="nav-link active">货品列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goods.product.create',['goods'=>$goods['id']])}}" class="nav-link">添加货品</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="text-center mb-2">
                <h3 class="text-primary">{{$goods['gname']}} 货品列表</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered zero-configuration dataTable"
                           id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row">
                            <th>id</th>
                            <th>属性组合</th>
                            <th>附加价格</th>
                            <th>库存</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr role="row" class="odd">
                                <td>{{$product->id}}</td>
                                <td>{{$product->getAttrs($product['attrs'])}}</td>
                                <td>{{$product->addPrice}}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('goods.product.edit',['product' =>$product,'goods'=>$goods['id']])}}" class="btn btn-sm btn-info mr-1">编辑</a>
                                        <a href="javascript:;" onclick="del(this)"  class="btn btn-sm btn-danger">删除</a>
                                        <form action="{{route('goods.product.destroy',['$product'=>$product , 'goods_id'=>$goods['id']])}}" method="post">
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
