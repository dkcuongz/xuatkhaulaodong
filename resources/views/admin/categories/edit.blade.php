@extends('adminlte::page')

@section('title', 'Sửa danh mục')

@section('content_header')
    <h1 class="m-0 text-dark">Sửa danh mục</h1>
@stop

@section('content')
    <form action="{{route('admin.categories.update', $category->slug)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <select name="parent_id" id="" class="form-control">
                            @foreach ($categories as $subcategory)
                                <!-- Include categories.blade.php file and pass the current category to it -->
                                    @include('admin.categories.categories', ['parent_id'=>$category->parent_id,'category' => $subcategory, $level=''])
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Tên danh mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tên danh mục" name="name"
                                   value="{{old('name') ?? $category->name}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-default">
                            Danh sách danh mục
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
