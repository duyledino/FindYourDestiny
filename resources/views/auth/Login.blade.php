<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }

        .form-input:focus~.material-symbols-outlined,
        .form-input:not(:placeholder-shown)~.material-symbols-outlined {
            color: #181113;
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

</head>

<body class="font-display bg-background-light dark:bg-background-dark text-[#181113] dark:text-white">
    @if (session('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif
    <div
        class="relative flex h-auto min-h-screen w-full flex-col items-center justify-center group/design-root overflow-x-hidden p-4 sm:p-6 lg:p-8">
        <header class="absolute top-0 left-0 right-0 flex items-center justify-start p-6 lg:p-10">
            <div class="flex items-center gap-3 text-[#181113] dark:text-white">
                <div class="size-6 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                            fill="currentColor" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">LuvHub</h2>
            </div>
        </header>
        <main class="w-full max-w-md mx-auto">
            <div class="flex flex-col justify-center p-4 sm:p-8">
                <div class="w-full">
                    <div class="mb-8 text-center">
                        <h1
                            class="text-4xl font-black leading-tight tracking-[-0.033em] text-[#181113] dark:text-white">
                            Chào mừng trở lại!</h1>
                        <p class="mt-2 text-base font-normal leading-normal text-[#8a606b] dark:text-gray-300">Đăng nhập
                            để tìm kiếm nửa kia của bạn.</p>
                    </div>
                    <form class="space-y-6" action="{{ route('login.post') }}" method="post">
                        @csrf
                        <label class="flex flex-col w-full">
                            <p class="text-[#181113] dark:text-white text-base font-medium leading-normal pb-2">Email
                            </p>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-[#181113] focus:outline-0 focus:ring-0 border border-[#e6dbde] bg-white focus:border-primary h-14 placeholder:text-[#8a606b] p-[15px] text-base font-normal leading-normal dark:bg-background-dark dark:border-gray-600 dark:focus:border-primary dark:text-white dark:placeholder:text-gray-400"
                                placeholder="Nhập email của bạn" name="email" type="text" />
                        </label>
                        <label class="flex flex-col w-full">
                            <div class="flex items-center justify-between pb-2">
                                <p class="text-[#181113] dark:text-white text-base font-medium leading-normal">Mật khẩu
                                </p>
                                <a class="text-sm font-medium text-primary hover:underline"
                                    href="{{ route('forgetpassword.get') }}">Quên mật khẩu?</a>
                            </div>
                            <div class="relative flex items-center">
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-[#181113] focus:outline-0 focus:ring-0 border border-[#e6dbde] bg-white focus:border-primary h-14 placeholder:text-[#8a606b] p-[15px] pr-12 text-base font-normal leading-normal dark:bg-background-dark dark:border-gray-600 dark:focus:border-primary dark:text-white dark:placeholder:text-gray-400"
                                    name="password" placeholder="Nhập mật khẩu của bạn" type="password" />
                                <div class="absolute right-4 text-[#8a606b] dark:text-gray-400 cursor-pointer">
                                    <span class="material-symbols-outlined">visibility_off</span>
                                </div>
                            </div>
                        </label>
                        <button
                            class="w-full bg-primary text-white font-bold h-14 rounded flex items-center justify-center text-base hover:opacity-90 transition-opacity"
                            type="submit">Đăng nhập</button>
                        <div class="relative flex items-center justify-center my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-[#e6dbde] dark:border-gray-600"></div>
                            </div>
                            <div
                                class="relative px-2 bg-background-light dark:bg-background-dark text-sm text-[#8a606b] dark:text-gray-300">
                                Hoặc đăng nhập bằng</div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="{{ route('social.redirect.get', 'google') }}">
                                <button
                                    class="w-full bg-white dark:bg-background-dark border border-[#e6dbde] dark:border-gray-600 text-[#181113] dark:text-white font-medium h-12 rounded flex items-center justify-center text-sm gap-2 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                    type="button">
                                    <img class="w-5 h-5" alt="Google logo"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLug5i7lFvkY6_ONDw8EIqRMLytZPnE7K_QwA19L7hmExhn4aPBvkTYY9FaqaH-RJpCBEMZBEuBJPKDCsDbRl2UFSf8xOj8uvrOeTCS70GlH99MMkzlMMk146UaZfLjvZaAZe8r9saa7UVEIfC_iwln6hmju13Z7KZBccWsu9cNf78zbYhF2uAdyh-ew8Z4WeiN9gmCImZyMmvH41r95F6-_YiplE1pOq5vSa9e7eM6A_jWZOeyoeBgSapBh71mfpaxmTwpAO04KY7" />
                                    Google
                                </button>
                            </a>
                            <a href="{{ route('social.redirect.get', 'facebook') }}">
                                <button
                                    class="w-full bg-white dark:bg-background-dark border border-[#e6dbde] dark:border-gray-600 text-[#181113] dark:text-white font-medium h-12 rounded flex items-center justify-center text-sm gap-2 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                    type="button">
                                    <img class="w-5 h-5" alt="Facebook logo"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ01YeNzQgCwRSoztd91IKOVzcP_jnsZux57wKRydX_5oS3zPR4sk-VE_e2uMlpyvFO1HcpmT-89BVmUMVbOh4_ii2FI_MEf2dvgMkOzW3iUYdSoNIEQhdLsDyXOkGKnmNAfjVxyvkbei1OCfkZxAvdGVV9PbPRixTRbBV4V1KAfI9ZjRsAvL2HaloGIfUVkmRoefC4rEVgHqlhC9oO63xjWFifF4KVTY8l01wDGgh6Zoc8LBDf7DGLzHzfIcDmeCEljtA2CJ8r2R0" />
                                    Facebook
                                </button>
                            </a>

                        </div>
                    </form>
                    <p class="text-center text-sm text-[#8a606b] dark:text-gray-300 mt-8">
                        Chưa có tài khoản? <a class="font-bold text-primary hover:underline"
                            href="{{ route('register.get') }}">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </main>
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