<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub Notification</title>
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
                        "primary-dark": "#d11e4a",
                        /* Added for hover states */
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
            background-color: #f8f5f6;
            /* Fallback for email clients */
            margin: 0;
            padding: 0;
        }

        /* Specific override for Gmail to ensure fonts look okay if Google Fonts fail */
        .body-text {
            font-family: 'Plus Jakarta Sans', Helvetica, Arial, sans-serif;
        }
    </style>
</head>
{{-- @dd($user) --}}

<body class="bg-background-light text-slate-800 antialiased py-10 px-4">

    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-xl overflow-hidden font-display">

        <div class="bg-primary p-8 text-center">
            <div
                class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                <span class="material-symbols-outlined text-white text-4xl">favorite</span>
            </div>
            <h1 class="text-white text-3xl font-bold tracking-tight">LuvHub</h1>
        </div>

        <div class="p-8 space-y-6">
            <h2 class="text-2xl font-bold text-gray-900">Hello there!</h2>

            <p class="text-gray-600 leading-relaxed text-base">
                We received a request to access your account on LuvHub. Click the button below to navigate directly to
                your dashboard.
            </p>

            <div class="py-4 text-center">
                {{-- <a href="http://127.0.0.1:8000/login/reset/{{ $user->user_id }}"
                    class="inline-block bg-primary hover:bg-primary-dark text-white text-lg font-semibold py-4 px-8 rounded-full shadow-lg transition-transform transform hover:scale-105 no-underline">
                    Đặt lại mật khẩu ở đây
                </a> --}}
                <a href="{{ url('login/reset/' . $user->user_id) }}" style="color: #f42559;">
                    Đặt mật khẩu lại đây
                </a>
            </div>

            <p class="text-gray-500 text-sm leading-relaxed">
                If you did not request this email, you can safely ignore it. The link will expire in 24 hours.
            </p>

            <hr class="border-gray-100 my-6">

            <div class="text-xs text-gray-400 break-all">
                <p class="mb-2">Button not working? Copy and paste this link into your browser:</p>
                <a href="http:" class="text-primary hover:underline">Click here to reset password</a>
            </div>
        </div>

        <div class="bg-gray-50 p-6 text-center text-xs text-gray-400">
            <p class="mb-2">&copy; 2024 LuvHub Inc. All rights reserved.</p>
            <p>
                <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a> •
                <a href="#" class="hover:text-primary transition-colors">Contact Support</a>
            </p>
        </div>

    </div>

</body>

</html>
