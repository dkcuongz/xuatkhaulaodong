@extends('adminlte::page')

@section('title', 'Danh sách bài')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách bài viết</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-2">
                        Tạo mới
                    </a>
                    <div class="form-group">
                        <label><strong>Danh mục :</strong></label>
                        <select id='category' name="category_id" id="" class="form-control">
                        @foreach ($categories as $subcategory)
                            <!-- Include categories.blade.php file and pass the current category to it -->
                                @include('admin.categories.categories', ['parent_id'=>0,'category' => $subcategory, $level=''])
                            @endforeach
                        </select>
                    </div>
                    <table class="table table-hover table-bordered table-stripped data-table" id="index-post">
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
                        @foreach($posts as $key => $post)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <div class="summary-content"><img
                                            src="{{asset($post->image->path ?? 'images-UI/notfound.jpg')}}" alt="">
                                    </div>
                                </td>
                                <th><p class="font-weight-normal">{{$post->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.posts.show', $post)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.posts.destroy', $post)}}"
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
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Bạn có muốn xóa bài viết này không ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
