@extends('layout.admin_master')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav"style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.index')}}" class="nav-link ">Attributes list</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.create')}}" class="nav-link ">Add new</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.edit',$goodsAttribute)}}" class="nav-link active">Edit Attribute</a>
                </li>
            </ul>
        </div>
        <form action="{{route('goodsAttribute.goodsAttribute.update',$goodsAttribute)}}" method="post">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">Attribute name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="aname" value="{{$goodsAttribute['aname']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">Belongs to</label>
                    <div class="col-md-10">
                        <select name="pid" class="select2 form-control" id="basicSelect">
                            <option value="0">Top Attribute</option>
                            @foreach($goodsAttributes as $v)
                                <option value="{{$v->id}}" {{$v->id == $goodsAttribute['pid']? 'selected' :'' }}>{{$v->aname}}</option>
                            @endforeach

                            <ul>
                                <li>
                                    <span>父亲</span>
                                    <ul>
                                        <li>孩子1</li>
                                    </ul>
                                </li>
                            </ul>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-bg-gradient-x-purple-blue">保存数据</button>
            </div>
        </form>
    </div>
@endsection
