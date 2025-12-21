<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #221014;
        }

        ::-webkit-scrollbar-thumb {
            background: #49222c;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #f42559;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body {{-- @dd(auth()->user()) --}}
    class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200 overflow-x-hidden">
    <div id="menu_icon"
        class="fixed sm:hidden left-[3%] top-[3%] z-50 cursor-pointer md:hidden flex items-center justify-center size-12 rounded-full bg-primary text-white">
        <span class="material-symbols-outlined text-3xl">menu</span>
    </div>
    <aside
        class="fixed top-0 left-0 z-40 sm:w-64 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white dark:bg-[#1a0c10] border-r border-gray-200 dark:border-gray-800">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <!-- Logo Area -->
            <div class="flex items-center sm:justify-center justify-between gap-3 mb-10 px-4">
                <div class="flex items-center">
                    <div class="size-8 text-primary">
                        <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white tracking-tight">LuvHub<span
                            class="text-primary text-xs ml-1 font-medium">Admin</span></h2>
                </div>
                <div id="close_icon"
                    class="sm:hidden cursor-pointer md:hidden flex items-center justify-center size-12 rounded-full bg-primary/10 text-primary">
                    <span class="material-symbols-outlined text-3xl">close</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <ul class="space-y-2 font-medium">
                <li>
                    <!-- Link tới trang hiện tại (User) -->
                    <a href="{{ route('dashboard.get') }}"
                        class="nav-item 
                        @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'dashboard')
                            active
                        @endif
                        flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">group</span>
                        <span class="ml-3">User Management</span>
                    </a>
                </li>
                <li>
                    <!-- Link tới trang Report -->
                    <a href="{{ route('reports.get') }}"
                        class="nav-item
                        @if (explode('/', url()->current())[Count(explode('/', url()->current())) - 1] === 'reports')
                            active
                        @endif
                        flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">flag</span>
                        <span class="ml-3">Reports</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ml-auto text-sm font-medium text-white bg-primary rounded-full">{{ auth()->user()->getPendingReport() }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chats.get') }}"
                        class="nav-item flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">chat</span>
                        <span class="ml-3">Chat</span>
                    </a>
                </li>
            </ul>

            <!-- Bottom Action -->
            <div class="absolute bottom-0 left-0 w-full p-4 border-t border-gray-200 dark:border-gray-800">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center sm:gap-0 gap-3">
                        <img class="w-10 h-10 rounded-full"
                            src="{{ auth()->user()->user_image === null || auth()->user()->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . auth()->user()->user_image) }}"
                            alt="Admin Avatar">
                        <div>
                            <div class="text-sm font-bold text-gray-900 dark:text-white">{{auth()->user()->user_name}}
                            </div>
                            <div class="text-xs text-gray-500">{{auth()->user()->email}}</div>
                        </div>
                    </div>
                    <a href="{{ route('homepage.get') }}">
                        <button class="ml-auto text-gray-400 hover:text-primary">
                            <span class="material-symbols-outlined">logout</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </aside>
    @yield('admin_content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('toast.toast-script')

    <script defer>
        let theme = JSON.parse(localStorage.getItem('theme'));
        if (theme === null) {
            localStorage.setItem('theme', JSON.stringify('light'));
        } else if (theme !== null && theme === "light") {
        } else if (theme !== null && theme === 'dark') {
            document.querySelector('html').classList.add('dark');
        }
        const menu_icon = document.querySelector("#menu_icon");
        const aside = document.querySelector("aside");
        const close_icon = document.querySelector("#close_icon");
        menu_icon.addEventListener("click", () => {
            aside.classList.remove("-translate-x-full");
        });
        close_icon.addEventListener("click", () => {
            aside.classList.add("-translate-x-full");
        })
    </script>
</body>

</html>