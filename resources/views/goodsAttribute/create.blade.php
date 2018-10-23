@extends('layout.admin_master')
@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.index')}}" class="nav-link ">Attributes list</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.create')}}" class="nav-link active">Add new</a>
                </li>
            </ul>
        </div>
        <form action="{{route('goodsAttribute.goodsAttribute.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">Attribute name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="aname">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 label-control text-center">Belongs to</label>
                    <div class="col-md-10">
                        <select name="pid" class="select2 form-control" id="basicSelect">
                            <option value="0">Top Attribute</option>
                        @foreach($attributes as $attribute)
                                <option value="{{$attribute['id']}}">{!! $attribute['aname'] !!}</option>
                            @endforeach
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
