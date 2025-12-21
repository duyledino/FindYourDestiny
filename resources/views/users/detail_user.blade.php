<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User Profile Page</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                        "display": ["Plus Jakarta Sans"]
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
                'opsz' 24
        }
    </style>
</head>

@extends('layouts.main')

@section('content')
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col w-full max-w-[960px] flex-1 px-4 md:px-10">
                    @if ($user)
                        <main class="">
                            <div class="flex p-4 container">
                                <div
                                    class="flex w-full flex-col gap-4 @[520px]:flex-row @[520px]:justify-between @[520px]:items-center">
                                    <div class="flex gap-4 items-center">
                                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-32 w-32"
                                            data-alt="Profile picture of Jessica"
                                            style='background-image: url("{{ $user->user_image === null || $user->user_image === '' ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}");'>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <p
                                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">
                                                {{ $user->user_name }}, {{ date('Y') - $user->year_of_birth }}
                                            </p>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">
                                                {{ $user->user_address !== null ? $user->user_address : 'Không tiết lộ' }}
                                            </p>
                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal mt-1">
                                                {{-- add slogan column --}}
                                                {{ $user->slogan === null ? 'Chưa cập nhật' : $user->slogan }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex w-full max-w-[480px] gap-3 @[480px]:w-auto @[480px]:flex-col">
                                        <button
                                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 dark:bg-primary/30 text-primary text-sm font-bold leading-normal tracking-[0.015em] flex-1 @[480px]:flex-auto gap-2">
                                            <span class="material-symbols-outlined text-lg">favorite</span>
                                            <span class="truncate">Like</span>
                                        </button>
                                        <button
                                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 dark:bg-primary/30 text-primary text-sm font-bold leading-normal tracking-[0.015em] flex-1 @[480px]:flex-auto gap-2">
                                            <span class="material-symbols-outlined text-lg">star</span>
                                            <span class="truncate">Favorite</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h2
                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                                Photos</h2>
                            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica smiling at a cafe"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD3Fj7f6i2XXFkmJrfQS-iBdZFq4tvBq8HdB6st2FICMcAQaYXBBFmCmglhZtejMOC3LMO7rf-2LTpnEm5OqyqbN7Tn3e903Mr4AWiVeAhjlpzMSfOkhyvGzwmHhKTRU3SZGVQVO5rKoN2IZrPny6wnq2Pz9Laxy2_FeIX8h_HCl8UNLmLor8RIho2WCpxHPKAkTkvDq8w6OMIYwNAkt3tPF11o1zMjwxWcZRGJrWhlXyaWtvc3F7B91KeaBygavyORuL-5LXW-Mg");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica hiking on a sunny day"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB3VoRzCpUdblOfYMF3LDvwkliQAD_kM2M5wk-CBun2oYMJWe5obPdsVRauvs0VuG9uCF1u3if-hZSJO_y6tCS4n1KPDNpHTO_sxUAaMhwNhLHGzMTYI3b5c3zWsTzj68wvVG0OprdDuPeFrwUoKun4UKSd-bQtipCw5X1NWqa5cI_yIpwmEkXeda861zoBP-8a3f6lRVQ2k6yggbPZpnf4j4oq1z5MBlA9YetW9R-3PsHYUZZ8lh4SyizpXkXCUB7mkmEcyvnqOA");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica with her pet dog"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTx6Js8ZrpIt5uo9SeYF3S9wWc1XhH5lkJ45hj0iJD7JAgn-RfeI4WZpAljBz_wTdM0Se7WkPmmkgSFgbw34E9krSW-hByyA0gcgqhYxmIR3o2s6jAMacdwH4I-Pr4qia8ugMFwzkGGzZMAPuGIYcrjALKt6fwV4S98AbGqLXlzJcGXI1inOSBfGmFqgJEEEVl_EY7c2IR_bEBeR6XuP1wnvUz_uHkb0BmhlXQbWh9wqbKuJ6P7qCzPkhyv1jwzQ8xDvtbXfCldg");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica reading a book in a park"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuARsckH4zKIagMeQcaje0lorPBu4ZfJEUY9so4ZLPMQRxI8t32fBxlVK0y8jJQ5DUUb-1vxxB9nzDYwz-hZKVZTV-pPdLJnzEQFr2t35hFoVQY10Ots6bMKOY8UrGBlde1xlZ9IwFmdquFdm_sHBdrWTqzbRi5u-cGp8CVLYNqQ1bKCduSbkv9Qeh2INCGgy5OztLoe1XK6QFa9DTVMuGeidxv7nJ3ZtmCkw6kzqPpXDHLJOLTVrL6iSBe_aOSl3qkJjbFoiBxmZA");'>
                                    </div>
                                </div>
                            </div>
                            <h2
                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                                About Me</h2>
                            <div class="px-4 py-2 flex flex-col gap-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-3 bg-white dark:bg-background-dark/50 p-4 rounded-lg">
                                        <span class="material-symbols-outlined text-primary text-2xl">person</span>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Gender</p>
                                            <p class="font-bold text-sm text-[#181113] dark:text-white">
                                                @if ($user->user_gender === 'Male')
                                                    Nam
                                                @elseif ($user->user_gender === 'Female')
                                                    Nữ
                                                @else
                                                    Other
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white dark:bg-background-dark/50 p-4 rounded-lg">
                                        <span class="material-symbols-outlined text-primary text-2xl">height</span>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Height</p>
                                            <p class="font-bold text-sm text-[#181113] dark:text-white">{{ $user->height }}m
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-3">Hobbies</h3>
                                    <div class="flex flex-wrap gap-2">
                                        @if ($user->hobbies !== '')
                                            @foreach (explode(',', $user->hobbies) as $hobby)
                                                <span class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">
                                                    {{ $hobby }} </span>
                                            @endforeach
                                        @else
                                            <span class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Chưa
                                                cập nhật</span>
                                            {{-- <span
                                                class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Reading</span>
                                            <span
                                                class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Photography</span>
                                            <span
                                                class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Yoga</span>
                                            <span
                                                class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Traveling</span>
                                            --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.date.post') }}" method="post"
                                class="mt-10 px-4 py-6 bg-white dark:bg-background-dark/50 rounded-lg shadow-sm">
                                @csrf
                                <input type="hidden" name="amount_to_connect" value="25">
                                <input type="hidden" name="user_id_be_connected" value="{{ $user->user_id }}">
                                <input type="hidden" name="user_id_connect" value="{{ auth()->user()->user_id ?? '' }}">
                                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary text-3xl">favorite</span>
                                        <div>
                                            <p class="text-base font-bold text-[#181113] dark:text-white">Amount to Connect
                                            </p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ explode('.', $user->amount)[0] }} Connect
                                            </p>
                                        </div>
                                    </div>
                                    @if ($user->amount === '0.00')
                                        <button type="button"
                                            class="w-full sm:w-auto flex min-w-[84px] max-w-[480px] cursor-not-allowed items-center justify-center overflow-hidden rounded-full h-12 px-8 bg-gray-500 text-white text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-auto">
                                            <span class="truncate">Người dùng không hoạt động</span>
                                        </button>
                                    @elseif(auth()->user() != null && auth()->user()->user_id == $user->user_id)
                                        <button type="button"
                                            class="w-full sm:w-auto flex min-w-[84px] max-w-[480px] cursor-not-allowed items-center justify-center overflow-hidden rounded-full h-12 px-8 bg-gray-500 text-white text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-auto">
                                            <span class="truncate">Không thể kết nối chính mình</span>
                                        </button>
                                    @elseif($date_exists != null)
                                        <button type="button"
                                            class="w-full sm:w-auto flex min-w-[84px] max-w-[480px] cursor-not-allowed items-center justify-center overflow-hidden rounded-full h-12 px-8 bg-gray-500 text-white text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-auto">
                                            <span class="truncate">Đã thực hiện kết nối</span>
                                        </button>
                                    @else
                                        <button type="button" onclick="openModal()"
                                            class="w-full sm:w-auto flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-8 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-auto">
                                            <span class="truncate">Connect Now</span>
                                        </button>
                                    @endif
                                </div>
                                {{-- this is modal --}}
                                <div id="myModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog"
                                    aria-modal="true">

                                    <div
                                        class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity duration-300 ease-out">
                                    </div>

                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

                                            <div
                                                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div
                                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                            </svg>
                                                        </div>

                                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                            <h3 class="text-xl font-bold leading-6 text-gray-900"
                                                                id="modal-title">Confirm Action</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">
                                                                    Bạn chắc chắn với hành động này chưa ? Vì nó sẽ thay đổi
                                                                    cách bạn nhìn nhận về tình yêu !
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                    <button onclick="closeModal()"
                                                        class="inline-flex w-full justify-center rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-dark sm:ml-3 sm:w-auto">
                                                        Confirm
                                                    </button>
                                                    <button type="button" onclick="closeModal()"
                                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                            </form>
                        </main>
                    @else
                        <main class="">
                            <div class="flex p-4 container">
                                <div
                                    class="flex w-full flex-col gap-4 @[520px]:flex-row @[520px]:justify-between @[520px]:items-center">
                                    <div class="flex gap-4 items-center">
                                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-32 w-32"
                                            data-alt="Profile picture of Jessica"
                                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCl44b91EwwnZZrGY3kD8pkiHja1zx24nIWkHgEb39HhETBiMqwtBCtHTr2vgxHFSJTQcjR7oOHonzc08WwBgcmCHkoOCnDm95ArcmErRG7lgMboO715lY6ABeE2M2a-z-l38oX2kkqi_HLX2ishdlhgKk5e6-PPimmRDJ1ZMNhrvHZt3Tuj-Wex0wCtuODmFilBAC4UkhTPEd2FamAbeQ7lmYRpd74Vhn3RxOcoejv2Hip00AII9LgsY1b-uXK4TQvtZzxzJBh5A");'>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <p
                                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">
                                                Jessica, 28</p>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">
                                                San Francisco, CA</p>
                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal mt-1">
                                                Hi I'm Jessica, I'm finding someone that loves me.</p>
                                        </div>
                                    </div>
                                    <div class="flex w-full max-w-[480px] gap-3 @[480px]:w-auto @[480px]:flex-col">
                                        <button
                                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 dark:bg-primary/30 text-primary text-sm font-bold leading-normal tracking-[0.015em] flex-1 @[480px]:flex-auto gap-2">
                                            <span class="material-symbols-outlined text-lg">favorite</span>
                                            <span class="truncate">Like</span>
                                        </button>
                                        <button
                                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 dark:bg-primary/30 text-primary text-sm font-bold leading-normal tracking-[0.015em] flex-1 @[480px]:flex-auto gap-2">
                                            <span class="material-symbols-outlined text-lg">star</span>
                                            <span class="truncate">Favorite</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h2
                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                                Photos</h2>
                            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica smiling at a cafe"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD3Fj7f6i2XXFkmJrfQS-iBdZFq4tvBq8HdB6st2FICMcAQaYXBBFmCmglhZtejMOC3LMO7rf-2LTpnEm5OqyqbN7Tn3e903Mr4AWiVeAhjlpzMSfOkhyvGzwmHhKTRU3SZGVQVO5rKoN2IZrPny6wnq2Pz9Laxy2_FeIX8h_HCl8UNLmLor8RIho2WCpxHPKAkTkvDq8w6OMIYwNAkt3tPF11o1zMjwxWcZRGJrWhlXyaWtvc3F7B91KeaBygavyORuL-5LXW-Mg");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica hiking on a sunny day"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB3VoRzCpUdblOfYMF3LDvwkliQAD_kM2M5wk-CBun2oYMJWe5obPdsVRauvs0VuG9uCF1u3if-hZSJO_y6tCS4n1KPDNpHTO_sxUAaMhwNhLHGzMTYI3b5c3zWsTzj68wvVG0OprdDuPeFrwUoKun4UKSd-bQtipCw5X1NWqa5cI_yIpwmEkXeda861zoBP-8a3f6lRVQ2k6yggbPZpnf4j4oq1z5MBlA9YetW9R-3PsHYUZZ8lh4SyizpXkXCUB7mkmEcyvnqOA");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica with her pet dog"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTx6Js8ZrpIt5uo9SeYF3S9wWc1XhH5lkJ45hj0iJD7JAgn-RfeI4WZpAljBz_wTdM0Se7WkPmmkgSFgbw34E9krSW-hByyA0gcgqhYxmIR3o2s6jAMacdwH4I-Pr4qia8ugMFwzkGGzZMAPuGIYcrjALKt6fwV4S98AbGqLXlzJcGXI1inOSBfGmFqgJEEEVl_EY7c2IR_bEBeR6XuP1wnvUz_uHkb0BmhlXQbWh9wqbKuJ6P7qCzPkhyv1jwzQ8xDvtbXfCldg");'>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
                                        data-alt="Jessica reading a book in a park"
                                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuARsckH4zKIagMeQcaje0lorPBu4ZfJEUY9so4ZLPMQRxI8t32fBxlVK0y8jJQ5DUUb-1vxxB9nzDYwz-hZKVZTV-pPdLJnzEQFr2t35hFoVQY10Ots6bMKOY8UrGBlde1xlZ9IwFmdquFdm_sHBdrWTqzbRi5u-cGp8CVLYNqQ1bKCduSbkv9Qeh2INCGgy5OztLoe1XK6QFa9DTVMuGeidxv7nJ3ZtmCkw6kzqPpXDHLJOLTVrL6iSBe_aOSl3qkJjbFoiBxmZA");'>
                                    </div>
                                </div>
                            </div>
                            <h2
                                class="text-[#181113] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
                                About Me</h2>
                            <div class="px-4 py-2 flex flex-col gap-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-3 bg-white dark:bg-background-dark/50 p-4 rounded-lg">
                                        <span class="material-symbols-outlined text-primary text-2xl">person</span>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Gender</p>
                                            <p class="font-bold text-sm text-[#181113] dark:text-white">Female</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white dark:bg-background-dark/50 p-4 rounded-lg">
                                        <span class="material-symbols-outlined text-primary text-2xl">height</span>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Height</p>
                                            <p class="font-bold text-sm text-[#181113] dark:text-white">5' 7"</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-3">Hobbies</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Hiking</span>
                                        <span
                                            class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Reading</span>
                                        <span
                                            class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Photography</span>
                                        <span
                                            class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Yoga</span>
                                        <span
                                            class="bg-primary/20 text-primary text-sm font-medium px-3 py-1 rounded-full">Traveling</span>
                                    </div>
                                </div>
                            </div>
                            <form class="mt-10 px-4 py-6 bg-white dark:bg-background-dark/50 rounded-lg shadow-sm">
                                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-primary text-3xl">favorite</span>
                                        <div>
                                            <p class="text-base font-bold text-[#181113] dark:text-white">Amount to Connect
                                            </p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">25 Connect</p>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class=" w-full sm:w-auto flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-8 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-auto">
                                        <span class="truncate">Connect Now</span>
                                    </button>
                                </div>

                            </form>
                        </main>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        const modal = document.querySelector('#myModal');
        console.log(modal);

        function openModal() {
            console.log("clicked.");
            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }
        // Optional: Close modal if clicking outside the white box
        window.onclick = function (event) {
            if (event.target == document.querySelector('.fixed.inset-0.z-10')) {
                closeModal();
            }
        }
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