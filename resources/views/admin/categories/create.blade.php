@extends('adminlte::page')

@section('title', 'Tạo mới danh mục')

@section('content_header')
    <h1 class="m-0 text-dark">Tạo mới danh mục</h1>
@stop

@section('content')
    <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Danh mục cha</label>
                            <select name="parent_id" id="" class="form-control">
                            @foreach ($categories as $subcategory)
                                <!-- Include categories.blade.php file and pass the current category to it -->
                                    @include('admin.categories.categories', ['parent_id'=>0,'category' => $subcategory, $level=''])
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Tên danh mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tên danh mục" name="name" value="{{old('name')}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-default">
                            Danh sách danh mục
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
