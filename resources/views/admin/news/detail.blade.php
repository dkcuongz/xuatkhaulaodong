@extends('adminlte::page')

@section('title', 'Chi tiết bài viết sự kiện')

@section('content_header')
    <h1 class="m-0 text-dark">Chi tiết bài viết sự kiện</h1>
@stop

@section('content')
    <form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label for="exampleInputName">Danh mục</label>
                        <div class="form-group">
                            @foreach ($categories as $subcategory)
                                @if($subcategory->id == $new->category_id)
                                    <lable>{{ $subcategory->name}}</lable>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tiêu đề</label>
                            <p>{{ $new->title}}</p>
                        </div>
                        <label for="exampleInputName">Ảnh</label>
                        <div class="form-group">
                            <img id="preview-image-before-upload"
                                 src="{{asset($new->image->path ?? 'images-UI/notfound.jpg')}}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <div>{!!$new->description!!}</div>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <div class="form-check">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $new->status == '1' ? 'Hoạt động' : 'Ẩn' }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('admin.news.index')}}" class="btn btn-default">
                            Danh sách bài viết tin tức
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
