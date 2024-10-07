@extends('clients.layouts.auth_master')

@section('content')
<div class="">
    <div class="form-box">
        <form class="form min-w-[1000px] ">
            <span class="title">Sign up</span>
            <span class="subtitle">Sign in with your email account.</span>
            <div class="form-container">
                <input type="email" class="input" placeholder="Email">
                <input type="password" class="input" placeholder="Password">
            </div>
            <button>Sign up</button>
        </form>
        <div class="form-section">
            <p>No account yet? <a href="{{route('register')}}">Sign up</a> </p>
        </div>
    </div>
</div>
@endsection