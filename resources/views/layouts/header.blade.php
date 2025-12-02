<header
    class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm border-b border-primary/20">
    <nav class="container mx-auto flex items-center justify-between whitespace-nowrap px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center gap-4 text-gray-900 dark:text-white">
            <div class="size-8 text-primary">
                <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">LuvHub</h2>
        </div>
        <div class="hidden md:flex items-center gap-9">
            <a class="text-sm font-medium leading-normal
            @if (count(explode('/', url()->current())) === 3) text-primary border-b-2 border-primary @endif
             hover:text-primary transition-colors" href="{{ route('homepage.get') }}">Trang chủ</a>
            <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Tìm
                kiếm</a>
            <a class="text-sm font-medium leading-normal 
            @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'connect') text-primary border-b-2 border-primary @endif
            hover:text-primary transition-colors" href="{{ route('connect.get') }}">Khám phá</a>
            <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Blog</a>
        </div>
        <div class="flex items-center gap-2">
            @auth
                <a href="{{ route('checkout.get') }}"
                    class="group inline-flex items-center gap-x-2 rounded-full border border-pink-500/30 bg-white/10 px-4 py-1.5 backdrop-blur-md transition-all hover:border-pink-500 hover:bg-pink-500/20">
                    <span
                        class="flex h-6 w-6 items-center justify-center rounded-full bg-pink-500 text-white shadow-sm group-hover:bg-pink-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3.5 w-3.5">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                    </span>

                    <span class="text-sm font-semibold text-[#f42559] group-hover:text-pink-400">
                        {{ auth()->user()->connect->connect_quantity }} Connects
                    </span>
                </a>
                {{-- When user is logged in --}}
                <a href="{{ route('profile.get') }}">
                    <button
                        class="flex min-w-[84px] gap-x-1 p-1 cursor-pointer items-center justify-center overflow-hidden">
                        <span class="truncate">{{ auth()->user()->user_name }}</span>
                        {{-- @dd(auth()->user()->user_image) --}}
                        <img src="{{ auth()->user()->user_image === null || auth()->user()->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . auth()->user()->user_image) }}"
                            alt="User Avatar"
                            class="w-10 h-10 rounded-full border-2 border-gray-300 dark:border-gray-700 object-cover cursor-pointer hover:ring-2 hover:ring-primary transition-all" />
                    </button>
                </a>
                <a href="{{ route('logout.get') }}">
                    <button
                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors">
                        <span class="truncate">Logout</span>
                    </button>
                </a>
            @else
                {{-- Else user doesn't --}}
                <a href="{{ route('login.get') }}">
                    <button
                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 dark:bg-primary/30 text-primary text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/30 dark:hover:bg-primary/40 transition-colors">
                        <span class="truncate">Đăng nhập</span>
                    </button>
                </a>
                <a href="{{ route('register.get') }}">
                    <button
                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors">
                        <span class="truncate">Đăng ký</span>
                    </button>
                </a>
            @endauth

        </div>
    </nav>
</header>