@extends('adminlte::page')

@section('title', 'Danh sách danh mục')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách danh mục</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary mb-2">
                        Tạo mới
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th>Danh mục cha</th>
                            <th class="text-center" style="width: 15%">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->parent->name ?? ''}}</td>
                                <td class="text-center">
                                    @if(!$category->has_child)
                                        <a href="{{route('admin.categories.edit', $category)}}"
                                           class="btn btn-primary btn-xs">
                                            Sửa
                                        </a>
                                        <a href="{{route('admin.categories.destroy', $category)}}"
                                           onclick="notificationBeforeDelete(event, this)"
                                           class="btn btn-danger btn-xs">
                                            Xóa
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Bạn có muốn xóa danh mục này không?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
