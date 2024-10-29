<!-- Phần header -->
<header>
    <!-- Nav top -->
    <div class="border-b-[1px]">
        <div class="flex mx-[10%] justify-between items-center">
            <!-- ul left -->
            <ul class="flex py-[16px]">
                <li>
                    <a href="{{route('home')}}">
                        <img
                            src="https://s1.vnecdn.net/vnexpress/restruct/i/v928/v2_2019/pc/graphics/logo.svg"
                            alt=""
                        />
                    </a>
                </li>
            </ul>

            <!-- ul right-->
            <ul class="flex py-[16px] items-center justify-between">
                <li class="mx-[10px]">
                    <div
                        class="rounded-full border-[1px] border-soild border-[#E5E5E5] px-[10px] py-[2px]"
                    >
                        <i
                            class="fa-solid fa-magnifying-glass text-[#bdbdbd]"
                        ></i>
                        <input
                            type="text"
                            class="focus:outline-none placeholder-[#828282]"
                            placeholder="Tìm kiếm"
                        />
                    </div>
                </li>
                <li class="mx-[10px]">
                    @if (!Auth::user())
                    <a class="text-[#757575] py-[10px]" href="{{route('login')}}"
                        ><i class="fa-regular fa-user mr-[6px]"></i
                        >Đăng nhập</a
                    >
                    @endif
                    <a class="text-[#757575] py-[10px]" href="{{route('logout')}}"
                        ><i class="fa-regular fa-user mr-[6px]"></i
                        >Đăng xuất</a
                    >
                </li>
            </ul>
        </div>
    </div>
    <!-- Nav bottom bị lòi ra ngoài-->
    <div class="py-[16px] border-b-[1px]">
        <ul class="mx-[14px] flex justify-between">
            <li class="ml-[10px] mr-[4px]">
                <a href="{{route('home')}}"
                    ><i
                        class="fa-solid fa-house bg-[#adadad] hover:bg-[#828282] hover:text-white p-[4px] rounded-full"
                    ></i
                ></a>
            </li>
            @foreach ($categories as $category)
            <li class="relative group">
                <a class="text-[14px]" href="{{route('category', $category->id)}}">{{$category->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</header>