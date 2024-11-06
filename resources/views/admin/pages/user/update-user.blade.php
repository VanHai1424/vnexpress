@extends('admin.layouts.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            @if (session()->has('success'))
                <div class="mt-3 alert alert-danger">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1 class="mt-2">Update User</h1>
            <a href="{{ route('user.index') }}" class="btn btn-secondary mb-2">
                <i class="fa-solid fa-arrow-left me-2"></i>Quay lại trang danh sách
            </a>
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data"
                class="d-flex gap-5">
                @method('PUT')
                @csrf
                <div class="w-50 mb-3">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" id="" class="form-control" value="{{ $user->role }}">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error('Lỗi khi khởi tạo CKEditor:', error);
            });
    </script>
@endsection
