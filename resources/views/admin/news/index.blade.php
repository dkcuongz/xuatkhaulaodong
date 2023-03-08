@extends('adminlte::page')

@section('title', 'Danh sách bài viết tin tức')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách bài viết tin tức</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.news.create')}}" class="btn btn-primary mb-2">
                        Tạo mới
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Tiêu đề</th>
                            <th>Thumbnail</th>
                            <th>Trạng thái</th>
                            <th style="width: 15%" class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $key => $new)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$new->title}}</td>
                                <td>
                                    <div class="summary-content"><img
                                            src="{{asset($new->image->path ?? 'images-UI/notfound.jpg')}}" alt="">
                                    </div>
                                </td>
                                <th><p class="font-weight-normal">{{$new->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.news.show', $new)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.news.edit', $new)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.news.destroy', $new)}}"
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
            if (confirm('Bạn có muốn xóa bài viết này không ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
