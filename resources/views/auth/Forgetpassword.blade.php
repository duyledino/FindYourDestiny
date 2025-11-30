<!DOCTYPE html>

<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
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
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">
    <div class="relative flex min-h-screen w-full flex-col items-center justify-center p-4 group/design-root">
        <div class="absolute top-0 left-0 right-0 p-4">
            <header class="flex items-center justify-between whitespace-nowrap px-4 py-3 sm:px-10">
                <div class="flex items-center gap-4 text-slate-900 dark:text-white">
                    <div class="size-6 text-primary">
                        <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">LuvHub</h2>
                </div>
            </header>
        </div>
        <main class="w-full max-w-md mx-auto p-6">
            @session('success')
                <div class="text-xl text-green-500">
                    {{ session('success') }}
                </div>
            @endsession
            <div class="flex flex-col gap-6">
                <div class="text-center">
                    <h1 class="text-slate-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">Quên mật
                        khẩu?</h1>
                    <p class="text-slate-600 dark:text-slate-400 text-base font-normal leading-normal pt-2">
                        Đừng lo lắng. Hãy nhập email đã đăng ký của bạn và chúng tôi sẽ gửi cho bạn một liên kết để đặt
                        lại mật khẩu.
                    </p>
                </div>
                <form class="flex flex-col gap-4" action="{{ route('forgetpassword.post') }}" method="post">
                    @csrf
                    <div class="flex flex-col">
                        <label class="text-slate-800 dark:text-slate-300 text-base font-medium leading-normal pb-2"
                            for="email-address">Địa chỉ Email</label>
                        <input
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-slate-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary h-14 placeholder:text-slate-400 dark:placeholder:text-slate-500 p-[15px] text-base font-normal leading-normal"
                            id="email-address" name="email" placeholder="vidu@email.com" type="email"
                            value="" />
                    </div>
                    @if ($errors->any())
                        <h1 class="text-red-500 text-xl">{{ $errors->first() }}</h1>
                    @endif
                    <button
                        class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 py-2 flex-1 bg-primary hover:bg-primary/90 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors duration-200">
                        <span class="truncate">Gửi liên kết đặt lại</span>
                    </button>
                </form>
                <div class="text-center">
                    <a class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:underline"
                        href="/login">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        <span>Nhớ mật khẩu rồi? Quay lại Đăng nhập</span>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
