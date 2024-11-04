@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <div class="w-50">
            <h3>Thêm danh mục</h3>
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" name="desc" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="w-100 mt-5">
            <h3>Danh sách danh mục</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->desc}}</td>
                        <td class="d-flex justify-content-start align-items-center gap-2">
                            <a href="{{route('category.edit', $item->id)}}" class="btn btn-warning">Sửa</a>
                            <form action="{{route('category.destroy', $item->id)}}" method="post">
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
@endsection
