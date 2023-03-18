@extends('adminlte::page')

@section('title', 'Chi tiết bài viết giới thiệu')

@section('content_header')
    <h1 class="m-0 text-dark">Chi tiết bài viết giới thiệu</h1>
@stop

@section('content')
    <form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Tiêu đề</label>
                            <p>{{ $introduce->title}}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <div>{!!$introduce->description!!}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Ảnh thumnail</label>
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload"
                                     src="{{asset($introduce->image->path ?? 'images-UI/notfound.jpg')}}"
                                     alt="preview image" style="max-height: 250px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <div class="form-check">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $introduce->status == '1' ? 'Hoạt động' : 'Ẩn' }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('admin.introduces.index')}}" class="btn btn-default">
                            Danh sách bài viết giới thiệu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
