@extends('admin.layouts.main')
@section('content')
    <div>
        <table class="table">
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
                    <th scope="row">{{$loop->index}}</th>
                    <td>{{$item->content}}</td>
                    <td>{{$item->post->title}}</td>
                    <td>{{$item->user->id}}</td>
                    <td>
                        <form action="{{route('comment.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
