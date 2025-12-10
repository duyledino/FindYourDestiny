<!DOCTYPE html>

<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script>
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
                        "display": ["Plus Jakarta Sans", "sans-serif"]
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
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .form-input {
            border-color: #e6dbde;
        }

        .form-input:focus {
            border-color: #f42559;
            box-shadow: 0 0 0 1px #f42559;
        }

        .dark .form-input {
            background-color: #2c1a1e;
            border-color: #443339;
            color: #f8f5f6;
        }

        .dark .form-input::placeholder {
            color: #8a606b;
        }

        .dark .form-input:focus {
            border-color: #f42559;
        }

        .password-toggle-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#181113] dark:text-[#f8f5f6]">
    <div
        class="relative flex h-auto min-h-screen w-full flex-col items-center justify-center group/design-root overflow-x-hidden p-4 sm:p-6 lg:p-8">
        <div class="">
            <div class="mx-auto flex h-full max-w-7xl">
                <div class="grid w-full grid-cols-1 lg:grid-cols-2">
                    <div class="flex flex-col justify-center px-4 py-10 sm:px-6 md:px-12">
                        <header class="flex items-center justify-between whitespace-nowrap">
                            <div class="flex items-center gap-3 text-primary">
                                <div class="size-6">
                                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold tracking-[-0.015em] text-[#181113] dark:text-white">LuvHub
                                </h2>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <span class="text-[#8a606b] dark:text-[#a18c92]">Đã có tài khoản?</span>
                                <a class="font-medium text-primary hover:underline" href="/login">Đăng nhập</a>
                            </div>
                        </header>
                        <main class="mt-10 flex flex-col">
                            <div class="flex flex-col gap-2 text-left">
                                <h1
                                    class="text-3xl font-black leading-tight tracking-[-0.033em] text-[#181113] dark:text-white sm:text-4xl">
                                    Bắt đầu hành trình của bạn</h1>
                                <h2 class="text-base font-normal leading-normal text-[#8a606b] dark:text-[#a18c92]">Tham
                                    gia cộng đồng hẹn hò sôi động nhất và tìm kiếm một nửa hoàn hảo của bạn.</h2>
                            </div>
                            <div class="mt-8 flex flex-wrap gap-3">
                                <button
                                    class="flex h-12 flex-1 min-w-[150px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-full bg-[#f42559] px-5 text-sm font-bold leading-normal tracking-[0.015em] text-white sm:text-base">
                                    <svg class="size-5" fill="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.35,11.1H12.18V13.83H18.69C18.36,17.64 15.19,19.27 12.19,19.27C8.36,19.27 5,16.25 5,12C5,7.9 8.2,4.73 12.19,4.73C15.29,4.73 17.1,6.7 17.1,6.7L19,4.72C19,4.72 16.56,2 12.19,2C6.42,2 2.03,6.8 2.03,12C2.03,17.05 6.16,22 12.19,22C17.6,22 21.5,18.33 21.5,12.91C21.5,11.76 21.35,11.1 21.35,11.1V11.1Z">
                                        </path>
                                    </svg>
                                    <span class="truncate">Đăng ký với Google</span>
                                </button>
                                <button
                                    class="flex h-12 flex-1 min-w-[150px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-full bg-[#f8f5f6] px-5 text-sm font-bold leading-normal tracking-[0.015em] text-[#181113] dark:bg-[#2c1a1e] dark:text-white sm:text-base">
                                    <svg class="size-5" fill="currentColor" viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.32 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 12 2.04Z">
                                        </path>
                                    </svg>
                                    <span class="truncate">Đăng ký với Facebook</span>
                                </button>
                            </div>
                            <div class="relative my-6 flex items-center">
                                <div class="flex-grow border-t border-solid border-[#e6dbde] dark:border-[#443339]">
                                </div>
                                <span class="mx-4 flex-shrink text-sm text-[#8a606b] dark:text-[#a18c92]">hoặc</span>
                                <div class="flex-grow border-t border-solid border-[#e6dbde] dark:border-[#443339]">
                                </div>
                            </div>
                            <form class="flex flex-col gap-4" action="{{ route('register.post') }}" method="post">
                                @csrf
                                @if ($errors->any())
                                    <div class="text-red-500">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <label class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Tên người
                                            dùng</p>
                                        <input
                                            class="form-input flex h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full p-3 text-base font-normal leading-normal placeholder:text-[#8a606b]"
                                            placeholder="Nhập tên người dùng" type="text" name="user_name" value="" />
                                    </label>
                                    <label class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Email</p>
                                        <input
                                            class="form-input flex h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full p-3 text-base font-normal leading-normal placeholder:text-[#8a606b]"
                                            placeholder="Nhập email của bạn" type="email" name="email" value="" />
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <label class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Mật khẩu</p>
                                        <div class="relative w-full">
                                            <input
                                                class="form-input flex h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full p-3 pr-12 text-base font-normal leading-normal placeholder:text-[#8a606b]"
                                                placeholder="Tạo mật khẩu" type="password" value="" name="password" />
                                            <span
                                                class="material-symbols-outlined password-toggle-icon text-[#8a606b]">visibility_off</span>
                                        </div>
                                    </label>
                                    <label class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Xác nhận mật
                                            khẩu</p>
                                        <input
                                            class="form-input flex h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full p-3 text-base font-normal leading-normal placeholder:text-[#8a606b]"
                                            placeholder="Nhập lại mật khẩu" type="password" value=""
                                            name="password_confirmation" />
                                    </label>
                                </div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Năm sinh</p>
                                        <input
                                            class="form-input flex h-12 w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full p-3 text-base font-normal leading-normal placeholder:text-[#8a606b]"
                                            placeholder="Nhập lại mật khẩu" type="text" value="{{ Date('Y') - 18 }}"
                                            name="year_of_birth" />
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="pb-2 text-sm font-medium text-[#181113] dark:text-white">Giới tính</p>
                                        <select class="form-input h-12 w-full rounded-full text-base font-normal"
                                            name="user_gender">
                                            <option value="">Chọn giới tính</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Other">Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center gap-3">
                                    <input
                                        class="h-4 w-4 rounded border-[#e6dbde] bg-white text-primary focus:ring-primary dark:border-[#443339] dark:bg-[#2c1a1e] dark:ring-offset-background-dark"
                                        id="terms" type="checkbox" />
                                    <label class="text-sm text-[#8a606b] dark:text-[#a18c92]" for="terms">Tôi đồng
                                        ý với
                                        <a class="font-medium text-primary hover:underline" href="#">Điều khoản
                                            Dịch
                                            vụ</a> và <a class="font-medium text-primary hover:underline" href="#">Chính
                                            sách Bảo mật</a>.</label>
                                </div>
                                <button
                                    class="mt-4 flex h-12 min-w-[84px] max-w-full cursor-pointer items-center justify-center overflow-hidden rounded-full bg-primary px-5 text-base font-bold leading-normal tracking-[0.015em] text-white">
                                    <span class="truncate">Tạo tài khoản</span>
                                </button>
                            </form>
                        </main>
                    </div>
                    <div class="relative hidden lg:block">
                        <div class="absolute inset-0 h-full w-full bg-cover bg-center"
                            data-alt="A happy, diverse couple enjoying a moment together outdoors."
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyf2ZZ2tmyDD75BYf0lvF-E0uEs6_OzDufFVdOjmbo311z3gY0Qi6aJrb4xTF4BqcAsZjoIxPYoCGYvfrsibCszkVqgv_UtIVUbfyfak1KWOu9i70WZ0FhQWxJcWcD6mxtKjP83LpUiJKcEUUo3a1JgO2jHIsMG5C9N2nznSAwVCjiOObcApOxeocJP35mWgj5USg1BZHFZOmrpAWJtrr7R4UosY88KjSTgjsB9ps5TWjxc1NhGfxGzj-SB6VIvX6VX6KHMV9i8SXm");'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script defer>
    let theme = JSON.parse(localStorage.getItem('theme'));
    if (theme === null) {
        localStorage.setItem('theme', JSON.stringify('light'));
    } else if (theme !== null && theme === "light") {
    } else if (theme !== null && theme === 'dark') {
        document.querySelector('html').classList.add('dark');
    }
</script>
@include('toast.toast-script')

</html>