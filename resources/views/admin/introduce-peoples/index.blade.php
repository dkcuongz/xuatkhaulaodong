@extends('adminlte::page')

@section('title', 'Danh sách Giới thiệu con người')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách Giới thiệu con người</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.introduce-peoples.create')}}" class="btn btn-primary mb-2">
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
                        @foreach($introducePeoples as $key => $introducePeople)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$introducePeople->title}}</td>
                                <td><div class="summary-content">{!! $introducePeople->url !!}</div></td>
                                <td><div class="summary-content">{!! $introducePeople->description !!}</div></td>
                                <td><div class="d-flex justify-content-center"><img class="img-banner" src="{{asset($introducePeople->image->path ?? '')}}" alt=""></div></td>
                                <th><p class="font-weight-normal">{{$introducePeople->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.introduce-peoples.show', $introducePeople)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.introduce-peoples.edit', $introducePeople)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.introduce-peoples.destroy', $introducePeople)}}"
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
