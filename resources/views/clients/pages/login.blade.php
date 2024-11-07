@extends('clients.layouts.auth_master')

@section('content')
<div class="">
    <div class="form-box">
        <form class="form min-w-[1000px]" action="{{route('handle-login')}}" method="POST">
            @csrf
            <span class="title">Sign in</span>
            <span class="subtitle">Sign in with your email account.</span>
            @if (session('msg'))
                <div class="p-4 mb-4 text-red rounded-lg"> {{ session('msg') }} </div>
            @endif
            <div class="form-container">
                <input type="email" class="input" name="email" placeholder="Email">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <input type="password" class="input" name="password" placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Sign in</button>
        </form>
        <div class="form-section">
            <p>No account yet? <a href="{{route('register')}}" class="text-blue-500 hover:underline">Sign up</a> </p>
        </div>
    </div>
</div>
@endsection
