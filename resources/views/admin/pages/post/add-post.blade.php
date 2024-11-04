@extends('admin.layouts.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Post</h1>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="d-flex gap-5">
            @csrf
            <div class="w-50 mb-3">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="desc" class="form-control">
                    @error('desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Poster</label>
                    <input type="file" name="poster" class="form-control">
                    @error('poster')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
            <div class="w-50 mb-3">
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" id="body" cols="30" rows="10" class="form-control"></textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Poster</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->desc }}</td>
                            <td><img src="{{ asset('storage/upload/' . $item->poster) }}" width="100" alt=""></td>
                            <td>{{ $item->category->name }}</td>
                            <td class="d-flex justify-content-start align-items-center gap-2">
                                <a href="{{ route('post.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa ?')">Xoá</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    ClassicEditor
        .create(document.querySelector('#body'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token'=>csrf_token()]) }}"
            }
        })
        .catch(error => {
            console.error('Lỗi khi khởi tạo CKEditor:', error);
        });
</script>
@endsection 
