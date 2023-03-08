@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài viết giới thiệu')

@section('content_header')
    <h1 class="m-0 text-dark">Chỉnh sửa bài viết giới thiệu</h1>
@stop

@section('content')
    <form action="{{route('admin.introduce.update', $post)}}" method="post" enctype="multipart/form-data" id="upload-image">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $subcategory)
                                <!-- Include categories.blade.php file and pass the current category to it -->
                                    @include('admin.categories.categories', ['parent_id'=>$subcategory->parent_id,'category' => $subcategory, $level=''])
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tiêu đề</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tiêu đề" name="title"
                                   value="{{old('title') ?? $post->title}}">
                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Ảnh thumbnail</label>
                            <br>
                            <input type="file" name="image" placeholder="Chọn ảnh" id="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload"
                                 src="{{asset($post->image->path ?? 'images-UI/notfound.jpg')}}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <textarea class="summernote form-control @error('description') is-invalid @enderror"
                                      id="text" cols="30" rows="10" placeholder="Mô tả"
                                      name="description">{{old('description') ?? $post->description}}</textarea>
                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            @include('ckfinder::setup')
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       {{ $post->status == '1' ? 'checked' : '' }} name="status" id="status" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hoạt động
                                </label>
                            </div>
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{route('admin.introduce.index')}}" class="btn btn-default">
                            Danh sách bài viết giới thiệu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace('text', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        });
    </script>
    @include('ckfinder::setup')
    @push('js')
        <script type="text/javascript">

            $(document).ready(function (e) {


                $('#image').change(function () {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });

        </script>
    @endpush
@stop
