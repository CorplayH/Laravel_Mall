@extends('layout.admin_master')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav" style="border-bottom: 1px solid #0b0c0f">
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.index')}}" class="nav-link active">属性列表</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('goodsAttribute.goodsAttribute.create')}}" class="nav-link">添加属性</a>
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
                            <th>Attribute Name</th>
                            <th>Belongs to</th>
                            <th width="120">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $attribute)
                            <tr role="row" class="odd">
                                <td>{{$attribute->id}}</td>
                                <td>{{$attribute->aname}}</td>
                                <td>{{$attribute->attribute ? $attribute->attribute->aname : 'Top Attribute'}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('goodsAttribute.goodsAttribute.edit',$attribute)}}"
                                           class="btn btn-sm btn-info mr-1">Edit</a>
                                        <a href="javascript:;" onclick="del(this)" class="btn btn-sm btn-danger">Delete</a>
                                        <form action="{{route('goodsAttribute.goodsAttribute.destroy',$attribute)}}" method="post">
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
            {{ $attributes->links() }}
        </div>
    </div>
@endsection

@push('js')
    <script>
        function del(obj) {
            swal({
                type: "question",
                title: "It will delete all sub items as well!",
                text: "Are you sure to delete?",
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete all!',
                showCancelButton: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $(obj).next('form').trigger('submit');
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The category data is safe :)',
                        'error'
                    )
                }
            });
        }
    </script>
@endpush
