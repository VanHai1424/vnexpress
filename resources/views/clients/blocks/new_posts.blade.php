<!-- tin bên trái -->
<div class="">
    <h2 class="mt-[60px] text-[24px] font-bold">Bài viết mới nhất</h2>
    <div class="mb-[20px] border-b-[1.5px]"></div>
    @foreach ($newPosts as $post)
    <div class="">
        <div class="mb-4 border-b-[1px] pb-6">
            <a href="{{route('detail', $post->id)}}" class="">
                <h4 class="text-[20px] font-bold mb-2 hover:text-[#087cce]">{{$post->title}}</h4>
                <div class="grid grid-cols-[1fr_2fr]">
                    <img class="w-full"
                        src="{{ asset('storage/upload/'. $post->poster) }}"
                        alt="">
                    <span class="ml-[16px] block max-h-[192px]">{{$post->desc}}</span>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>