@extends('clients.layouts.auth_master')

@section('content')
<div class="form-box">
    <form class="form" method="POST" action="{{route('handle-register')}}">
        @csrf
        <span class="title">Sign up</span>
        <span class="subtitle">Create a free account with your email.</span>
        @if (session('msg'))
            <div class="p-4 mb-4 text-red rounded-lg"> {{ session('msg') }} </div>
        @endif
        <div class="form-container">
            <input type="text" class="input" placeholder="Full Name" name="name">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            
            <input type="email" class="input" placeholder="Email" name="email">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            
            <input type="password" class="input" placeholder="Password" name="password">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            
            <input type="password" class="input" placeholder="Comfirm Password" name="password_confirmation">
        </div>
        <button>Sign up</button>
    </form>
    <div class="form-section">
        <p>Have an account? <a href="{{route('login')}}">Log in</a> </p>
    </div>
</div>
@endsection