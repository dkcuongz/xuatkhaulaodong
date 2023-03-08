@extends('adminlte::page')

@section('title', 'Danh sách banners')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách banners</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.banners.create')}}" class="btn btn-primary mb-2">
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
                        @foreach($banners as $key => $banner)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$banner->title}}</td>
                                <td><div class="summary-content">{!! $banner->url !!}</div></td>
                                <td><div class="summary-content">{!! $banner->description !!}</div></td>
                                <td><div class="d-flex justify-content-center"><img class="img-banner" src="{{asset($banner->image->path ?? '')}}" alt=""></div></td>
                                <th><p class="font-weight-normal">{{$banner->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.banners.show', $banner)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.banners.edit', $banner)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.banners.destroy', $banner)}}"
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
