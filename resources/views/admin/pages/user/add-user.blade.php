@extends('admin.layouts.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add User</h1>
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" class="d-flex gap-5">
            @csrf
            <div class="w-50 mb-3">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td class="d-flex justify-content-start align-items-center gap-2">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="post">
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
