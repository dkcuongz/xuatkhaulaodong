@extends('adminlte::page')

@section('title', 'Chi tiết banners')

@section('content_header')
    <h1 class="m-0 text-dark">Chi tiết liên hệ</h1>
@stop

@section('content')
    <form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Tên</label>
                            <p>{{ $contact->name}}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <div>{{$contact->email}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Số điện thoại</label>
                            <div>{{$contact->phone}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Website</label>
                            <div>{{$contact->website}}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <div>{{$contact->content}}</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('admin.categories.index')}}" class="btn btn-default">
                            Danh sách liên hệ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
