@extends('adminlte::page')

@section('title', 'Danh sách Giới thiệu')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách Giới thiệu</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.introduces.create')}}" class="btn btn-primary mb-2">
                        Tạo mới
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Tiêu đề</th>
                            <th>URL</th>
                            <th>Mô tả</th>
                            <th style="width: 20%">Ảnh</th>
                            <th>Trạng thái</th>
                            <th style="width: 15%" class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($introduces as $key => $introduce)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$introduce->title}}</td>
                                <td><div class="summary-content">{!! $introduce->url !!}</div></td>
                                <td><div class="summary-content">{!! $introduce->description !!}</div></td>
                                <td><div class="d-flex justify-content-center"><img class="img-banner" src="{{asset($introduce->image->path ?? '')}}" alt=""></div></td>
                                <th><p class="font-weight-normal">{{$introduce->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.introduces.show', $introduce)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.introduces.edit', $introduce)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.introduces.destroy', $introduce)}}"
                                       onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Xóa
                                    </a>
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
            if (confirm('Bạn có muốn xóa banner này không ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
