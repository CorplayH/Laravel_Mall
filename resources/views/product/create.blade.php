@extends('layout.admin_master')

@section('content')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goods.product.index',['goods'=>$goods['id']])}}" class="nav-link">货品列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goods.product.create',['goods'=>$goods['id']])}}" class="nav-link active">添加货品</a>
                </li>
            </ul>
        </div>
        <form action="{{route('goods.product.store',['goods_id'=>$goods['id']])}}" method="post">
            @csrf
            <div class="card-body">
                <div class="text-center mb-2">
                    <h3 class="text-primary">{{$goods['gname']}} 货品添加</h3>
                </div>
                <div class="card-block">
                    @foreach($topAttr as $attr)
                        <div class="form-group row">
                            <label class="col-md-2 label-control text-center">{{$attr->aname}}</label>
                            <div class="col-md-10">
                                <select class="form-control" name="attrs[]" id="basicSelect">
                                    <option value="">请选择{{$attr['aname']}}</option>
                                    @foreach($attr->getSon as $son)
                                        <option value="{{$son['id']}}">{{$son['aname']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <label class="col-md-2 label-control text-center">Base price</label>
                        <div class="col-md-10">
                            <input type="text" disabled name="" value="{{$goods['price']}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 label-control text-center">附加价格</label>
                        <div class="col-md-10">
                            <input type="text" name="addPrice" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 label-control text-center">库存数量</label>
                        <div class="col-md-10">
                            <input type="text" name="stock" class="form-control">
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
