<!-- Tin bên phải -->
<div class="pl-[20px] border-l-[1px]">
    <h2 class="text-[18px] font-bold">Top bài viết xem nhiều nhất trong ngày</h2>
    <ul class="mt-2">
        @foreach ($mostViewPosts as $post)
        <li class="border-b-[1px] pb-4 pt-4"><a class="block w-full h-full" href="{{route('detail', $post->id)}}">
            <h4 class="font-medium pb-2 hover:text-[#087cce]">{{$post->title}}</h4>
            <img class="h-[135px] w-full object-cover"
                src="{{$post->poster}}"
                alt="">
        </a></li>
        @endforeach
    </ul>
</div>
