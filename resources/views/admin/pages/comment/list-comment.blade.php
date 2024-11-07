@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1>Danh sách bình luận</h1>
        @if (session()->has('msg'))
            <div class="mt-3 alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Bài viết</th>
                            <th scope="col">User</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$item->content}}</td>
                                <td>{{$item->post->title}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>
                                    <form action="{{route('comment.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
