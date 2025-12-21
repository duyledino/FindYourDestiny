<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 20
        }
    </style>
</head>

@extends('layouts.main')

@section('content')

{{-- @dd() --}}
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <header
                        class="sticky top-0 z-30 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm border-b border-primary/20">
                        <nav
                            class="container mx-auto flex items-center justify-between whitespace-nowrap px-4 sm:px-6 lg:px-8 py-3">
                            {{-- <div class="flex items-center gap-4 text-[#f42559] dark:text-white">
                                <div class="size-8 text-primary">
                                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">LuvHub</h2>
                            </div> --}}

                            <div class="hidden md:flex items-center gap-9">
                                <a class="text-primary text-sm font-bold leading-normal border-b-2 border-primary pb-1"
                                    href="#">Hồ Sơ</a>
                            </div>

                            {{-- <div class="flex items-center gap-2">
                                <button
                                    class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 bg-black/5 dark:bg-white/10 text-[#181113] dark:text-white/90 gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                                    <span class="material-symbols-outlined text-xl">notifications</span>
                                </button>
                                <button
                                    class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 bg-black/5 dark:bg-white/10 text-[#181113] dark:text-white/90 gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                                    <span class="material-symbols-outlined text-xl">settings</span>
                                </button>
                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                                    data-alt="User profile picture"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuColZUaa1YE0FqxOBUBeLXI0Y6KG5CLgE6xKdow_DMDvji709CMvc8qq_4MF8IzpnRnqG9Y2gGAISMa13LmE0NJJyZRV7rEwbUdB37kWvnFXMynIPi9jhKGWFte7tYYsNVZW5OYAp3i4mahmzBGCxCpb0d-aFs84DW0Ou7WB9m9m1u5qQGqW_u3x7jwRUlZWJn9NargC6ThpmnXft1MOzc6_vJIZj0Hw0H_yZnUoRaGlMugk9FLT3S-MDUnsE7OSWCHEILbsof4bN4g");'>
                                </div>
                            </div> --}}
                        </nav>
                    </header>

                    <main class="flex flex-col gap-8 p-4 md:p-10">
                        <div class="flex w-full flex-col gap-4 items-center p-4">
                            <div class="flex gap-4 flex-col items-center">
                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-32 w-32 border-4 border-white dark:border-background-dark/50 shadow-lg"
                                    data-alt="{{ auth()->user()->user_name }}"
                                    style='background-image: url("{{ auth()->user()->user_image === null || auth()->user()->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . auth()->user()->user_image) }}");'>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p
                                        class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] text-center">
                                        {{ auth()->user()->user_name }}, {{ date('Y') - auth()->user()->year_of_birth }}
                                    </p>
                                    <p
                                        class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal text-center">
                                        {{ auth()->user()->user_address == null ? 'Chưa cập nhật địa chỉ' : auth()->user()->user_address }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex w-full max-w-[480px] gap-3 mt-2">
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] flex-1">
                                    <a href="{{ route('profile.edit.get', [auth()->user()->user_id]) }}"
                                        class="w-full h-full flex justify-center items-center">
                                        <span class="truncate">Edit Profile</span>
                                    </a>
                                </button>
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-background-light dark:bg-background-dark/50 text-gray-800 dark:text-white text-sm font-bold leading-normal tracking-[0.015em] flex-1 border border-primary/20">
                                    <a href="{{ route('setting.post') }}"
                                        class="w-full h-full flex justify-center items-center">
                                        <span class="truncate">Settings</span>
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 p-4 bg-white dark:bg-background-dark/50 rounded-lg">

                            @php
                            $process = 0;
                            if (!empty(auth()->user()->user_address)) {
                                $process += 20;
                            }

                            if (!empty(auth()->user()->hobbies)) {
                                $process += 20;
                            }

                            if (!empty(auth()->user()->slogan)) {
                                $process += 20;
                            }

                            if (!empty(auth()->user()->height)) {
                                $process += 20;
                            }
                            if(!empty(auth()->user()->user_image)){
                                $process += 20;
                            }
                            // dd(auth()->user());
                            @endphp
                            {{-- @dd($process) --}}
                            <div class="flex gap-6 justify-between items-center">
                                <p class="text-gray-800 dark:text-white text-base font-medium leading-normal">Profile
                                    Completion</p>
                                <p class="text-primary text-sm font-bold leading-normal">{{ $process }}%</p>
                            </div>
                            <div class="rounded-full bg-primary/20">
                                <div class="h-2 rounded-full bg-primary" style="width: {{ $process }}%;"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="bg-white dark:bg-background-dark/50 p-6 rounded-lg">
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-3">
                                    About Me</h2>
                                <p class="text-gray-700 dark:text-gray-300 text-base font-normal leading-relaxed">
                                    {{ auth()->user()->slogan !== null ? auth()->user()->slogan : 'Chưa cập nhật' }}
                                </p>
                            </div>
                            <div class="bg-white dark:bg-background-dark/50 p-6 rounded-lg">
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-4">
                                    Interests</h2>
                                <div class="flex flex-wrap gap-3">
                                    @if (auth()->user()->hasHobbies())
                                        {{-- Only use ->get() if:

                                        You need to filter the query (e.g., $user->hobbies()->where('active', 1)->get()).

                                        You suspect the database has changed since you loaded the user and you need to force
                                        a fresh update of the data.

                                        Next Step --}}
                                        {{-- @dd(auth()->user()); --}}
                                        @foreach (auth()->user()->hobbies as $item)
                                            <div class="hobby-item">
                                                {{ $item->hobbies_name }}
                                            </div>
                                            {{-- <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Du
                                                Lịch</span>
                                            <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Đọc
                                                Sách</span>
                                            <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Nấu
                                                Ăn</span>
                                            <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Coffee</span>
                                            <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Chụp
                                                Hình</span>
                                            <span
                                                class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Chạy
                                                Bộ</span> --}}
                                        @endforeach
                                    @else
                                        <span
                                            class="flex items-center justify-center rounded-full bg-primary/20 px-4 py-1.5 text-sm font-medium text-primary">Chưa
                                            có</span>
                                    @endif
                                </div>
                            </div>
                            <div class="bg-white dark:bg-background-dark/50 p-6 rounded-lg">
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] pb-4">
                                    Gallery</h2>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="A photo of Jessica hiking on a mountain trail"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDMNKKdYBvr6hn0XucFoiqyUFGfGM1X_2jbxF-hXVOaCJO3Q6EXhwcmtiGcp0D0_IvexOIShtUEZ_zFneXyuh-Z04Mu8EIGCXGnula207XquG7eG1YYTWUUYBKkIdDKJTCVTAsEIRRkNQjEPAUFe2DnOqRpxaq34nyY4Oa09bBqCmSTihSQ42ezf1kS6KxBRLfKIN7U-Hfgknc9qm2sXumnT3H-SRTvMTLciKIsqifW86r4mGyrFVQfg0zlUyfdx_pm1InWBPPYwrPB");'>
                                    </div>
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="A close-up of a cup of latte art"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAHqQP88S3bFWe57_kghkKW6sBWhxMeXUlsCZLnU8hKSeISbtXciNgQgP54Cif6JR6AgdRz_xYSMpONXUFFFXJUpTxHcnUC2AACWv2cDYRH_-4NHVU1_NQTAIA-Jj9Bzoj5BU4dR3CFD1Kb6TU7qt9MjLUfF0SOpusvaUJrBsuTiJ8vTlFhZ5pgWpsO2gppZyr8Cfm7VVPJVGSnLt49XTc7M8danFXHB1YWXYYopWhq8V3wyNj_fpu7LrcCjiyMo3Slz1D89rNp75hV");'>
                                    </div>
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="A collection of old books on a wooden shelf"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCn8nNgjBMXyhWNRGi1q_WKnKZH4vM8lGsY5tP1P5bic931rnnFUH32YqjTlBqVqSVEOVGH1wcF81Fg3Wp8KWi-vNwUEdeak3XtYFIHpst8jlg4lSTFzyggvCq95M9s9_iGI9C_9UsXgIvzTZrg3VBUvBCFI9ltitsTMLYy_ubv6J1slyCtkkvBsVA7fjxsnEmV6-2YDHNGJeyKyqxAQEtwJUqOsGkFk_WrjvQSLNyz--oHvSQqivN6szcqdySEo_yglwqEzddA5kj-");'>
                                    </div>
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="A plate of freshly baked croissants"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCCa_ktKxuDEMq7W46kJe9mDyeU0aUAJ7fkvVBXtDWTSUzP__ES6uh8mkfGYA5XvygZhBnwNr6iHICLje15u6TbO3NO_xs11NQ7_el9WvZJla35MhN9p8cldPItHOhD85cWP9iCFzjQ7KgMqxKlMaEJ4aEELEo18IUNLXoXa2YenVt6kxycZrRh1I9VhpLHpLU5tDDvNWH5naraceXLelV4mqGgwt5tT-VKs__wN3Y_gNY-CKn_6xRGk0-42gOHwKC38hPeZJ1g0Gcp");'>
                                    </div>
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="Jessica laughing with friends at a cafe"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAp10qwuh_uI5G-RbjzjT1ktaWuBClP-dftjcE5AKG4fwLtYaJNjn74ShTmMBR9O1JeheIRMMGp0jgml2SqP3EExN15u1D6Cy5LKibJLYjUvIgpLKusCAGWW4eMNEAa8yA1VAF03JoHLqugVO5xLNHzfvDWaURNGA3vxpA9dW1sSWW4udh4rrTxEZF6Y872XRGe3EUZyAaYZgK-g_7gpC_p5SvHnZIjwZBCv-WBCaYdSwuTzZAqhNsG-S5l-TAYKFuLp2luh2zl5mg0");'>
                                    </div>
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                                        data-alt="A scenic view of Ha Long Bay in Vietnam"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB2-Qod-TA328vccaKDlva5mB338EK8PUoaHqQxQjc78zMbLP3JFIR-VtyVRfARysP8eFwZhhfhPZUlE1pUxK-rXh5kOygiqV1UBkulHcLtKpbinRbNrsmNZAyq2kFensUizyGUpg8x5gKtETJH1KJhh-Gxz7sQpUpLaDZf9x7MWOt26FLx7DOhhezJdy9ln2x03-_OQUUAv9Nk8kcxgIBHbOWD5d8tB5hwU3DcvodqGIriHrbq5A-accnhlKejtcgnb-9b7lk-8oQq");'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script defer>
        let theme = JSON.parse(localStorage.getItem('theme'));
        if (theme === null) {
            localStorage.setItem('theme', JSON.stringify('light'));
        } else if (theme !== null && theme === "light") {
        } else if (theme !== null && theme === 'dark') {
            document.querySelector('html').classList.add('dark');
        }
    </script>
@endsection



</html>