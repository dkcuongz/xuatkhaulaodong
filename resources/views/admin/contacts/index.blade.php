@extends('adminlte::page')

@section('title', 'Danh sách liên hệ')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách liên hệ</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th style="width: 20%">Số điện thoại</th>
                            <th style="width: 20%">Website</th>
                            <th style="width: 20%">Nội dung</th>
                            <th style="width: 15%" class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $key => $contact)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>
                                    <div class="summary-content">{{$contact->email}}</div>
                                </td>
                                <th><p class="font-weight-normal">{{$contact->phone }}</p></th>
                                <th><p class="font-weight-normal">{{$contact->website }}</p></th>
                                <th><p class="font-weight-normal">{{$contact->content}}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.contacts.show', $contact)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.contacts.destroy', $contact)}}"
                                       onclick="notificationBeforeDelete(event, this)"
                                       class="btn btn-danger btn-xs">
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
            if (confirm('Bạn có muốn xóa liên hệ này không ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
