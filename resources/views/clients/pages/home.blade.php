@extends('clients.layouts.master')

@section('content')
<div class="mt-[28px] mx-auto w-[1100px]">
    <!-- Phần content top -->
    <div class="grid grid-cols-[3fr_1fr] ">
        <div class="pr-[20px]">
            <div class="flex ">
                <a href="{{route('detail', $newPost->id)}}">
                    <img class="w-[520px] h-[312px] object-cover"
                    src="{{$newPost->poster}}"
                    alt="">
                </a>
                <div class="ml-[16px] max-w-[220px]">
                    <h2 class="text-[20px] font-bold  mb-[12px]">
                        <a href="{{route('detail', $newPost->id)}}">{{$newPost->title}}</a>
                    </h2>
                    <span class="mb-[12px] block">{{$newPost->desc}}</span>
                </div>
            </div>
            <div class="pt-[20px] mb-[20px] border-b-[1.5px]"></div>
            <div class="grid grid-cols-3 gap-[24px]">
                @foreach ($relatedPosts as $post)
                <div class="flex flex-col">
                    <h4 class="hover:text-[#087cce] font-bold text-[15px] mb-[6px] h-[40px] overflow-hidden text-ellipsis">
                        {{$post->title}}
                    </h4>
                    <img class="object-cover h-[200px] w-full" src="{{$post->poster}}" alt="">
                </div>
                @endforeach
            </div>

            @include('clients.blocks.new_posts')
        </div>
        @include('clients.blocks.sidebar')
    </div>
</div>
@endsection