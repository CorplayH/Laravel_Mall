@extends('layout.admin_master')
@section('content')

    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('category.category.index')}}" class="nav-link active">分类列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.category.create')}}" class="nav-link">添加分类</a>
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
                            <th>id</th>
                            <th>分类名称</th>
                            <th>父级分类</th>
                            <th width="120">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="odd">
                                <td>{{$category['id']}}</td>
                                <td>{{$category['cname']}}</td>
                                <td>{{$category->category ? $category->category->cname : '顶级分类'}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('category.category.edit',$category)}}"
                                           class="btn btn-sm btn-info mr-1">编辑</a>
                                        <a href="javascript:;" onclick="del(this)" class="btn btn-sm btn-danger">删除</a>
                                        <form action="{{route('category.category.destroy',$category)}}" method="post">
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
{{--            {{$categories->links()}}--}}
        </div>
    </div>
@endsection

@push('js')
    @include('layout.del')
@endpush
