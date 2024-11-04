@extends('admin.layouts.main')
@section('content')

        <div class="w-50">
            <h3>Chỉnh sửa danh mục danh mục</h3>
            <form action="{{route('category.update', $item->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" value="{{$item->name}}" class="form-control">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" name="desc" value="{{$item->desc}}" class="form-control">
                    @error('desc')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="w-75 mt-5">
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
                @foreach($list as $i)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{$i->name}}</td>
                        <td>{{$i->desc}}</td>
                        <td class="d-flex justify-content-start align-items-center">
                            <form action="{{route('category.destroy', $i->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Xoá</button>
                            </form>
                            <a href="{{route('category.edit', $i->id)}}" class="btn btn-primary">Sửa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection