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
            <a class="text-sm font-medium leading-normal 
            @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'connect') text-primary border-b-2 border-primary @endif
            hover:text-primary transition-colors" href="{{ route('connect.get', ['current_page' => 1]) }}">Khám phá</a>
            @if(auth()->user())
                <a class="text-sm font-medium leading-normal
                                    @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'message') text-primary border-b-2 border-primary @endif
                                 hover:text-primary transition-colors" href="{{ route('message.get') }}">Tin nhắn</a>
            @endif
            <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Blog</a>
        </div>
        <div class="md:flex hidden items-center gap-2">
            @auth
                <a href="{{ route('checkout.get') }}"
                    class="group inline-flex items-center gap-x-2 rounded-full border border-pink-500/30 bg-white/10 px-2 py-1.5 backdrop-blur-md transition-all hover:border-pink-500 hover:bg-pink-500/20">
                    <span
                        class="flex h-4 w-4 items-center justify-center rounded-full bg-pink-500 text-white shadow-sm group-hover:bg-pink-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3.5 w-3.5">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                    </span>

                    <span class="sm:text-sm text-[10px] font-semibold text-[#f42559] group-hover:text-pink-400">
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
                        class="flex sm:w-[84px] w-[70px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary text-white sm:text-sm text-[10px] font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors">
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
        <div id="menu_icon"
            class="cursor-pointer md:hidden flex items-center justify-center size-12 rounded-full bg-primary/20 text-primary">
            <span class="material-symbols-outlined !text-3xl">menu</span>
        </div>
    </nav>
</header>

<div id="overlay" onclick="toggleSidebar()"
    class="fixed top-16 left-0 right-0 bottom-0 bg-black/50 z-[99] hidden transition-opacity lg:hidden"></div>

<aside id="sidebar"
    class="fixed top-16 left-0 z-[99] h-[calc(100vh-4rem)] w-64 bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden">

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto h-full">

        <a href="{{ route('homepage.get') }}"
            class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl @if (count(explode('/', url()->current())) === 3) bg-[#f42559] text-white shadow-md shadow-[#f42559]/30 @else text-gray-600 hover:bg-[#f42559]/10 hover:text-[#f42559] @endif transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            Trang chủ
        </a>

        <a href="{{ route('connect.get', ['current_page' => 1]) }}"
            class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'connect') bg-[#f42559] text-white shadow-md shadow-[#f42559]/30 @else text-gray-600 hover:bg-[#f42559]/10 hover:text-[#f42559] @endif transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                </path>
            </svg>
            Khám phá
        </a>

        @if(auth()->user())
            <a href="{{ route('message.get') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'message') bg-[#f42559] text-white shadow-md shadow-[#f42559]/30 @else text-gray-600 hover:bg-[#f42559]/10 hover:text-[#f42559] @endif transition-colors">
                <div class="relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#f42559] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#f42559]"></span>
                    </span>
                </div>
                Tin nhắn
            </a>
        @endif

        <a href="#"
            class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-xl hover:bg-[#f42559]/10 hover:text-[#f42559] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            Blog
        </a>

        @auth
            <div class="mt-4 pt-4 border-t border-gray-100">
                <a href="{{ route('profile.get') }}"
                    class="flex items-center gap-3 px-2 py-2 text-sm font-medium text-gray-600 hover:text-[#f42559] transition-colors">
                    <img class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm"
                        src="{{ auth()->user()->user_image === null || auth()->user()->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . auth()->user()->user_image) }}"
                        alt="User avatar">
                    <div class="flex flex-col">
                        <span class="text-gray-800 font-semibold">{{ auth()->user()->user_name }}</span>
                        <span class="text-xs text-gray-400">Xem hồ sơ</span>
                    </div>
                </a>
            </div>
        @endauth
    </nav>
</aside>

<script defer>
    const menu_icon = document.querySelector("#menu_icon");

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menu_icon.addEventListener('click',toggleSidebar);

    function toggleSidebar() {
        if (sidebar.classList.contains('-translate-x-full')) {
            // Open Sidebar
            console.log();
            menu_icon.children[0].textContent = 'close';
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        } else {
            // Close Sidebar
            menu_icon.children[0].textContent = 'menu';
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    }
</script>