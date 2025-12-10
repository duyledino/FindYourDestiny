<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edit Profile Page</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
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
        .material-icons-outlined {
            font-size: inherit
        }

        .form-select {
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuB3l-63rm_lveLsT5mWKw45FkRKmWBs3GwykGZLLMSmvz-BECdWKuu-34G6ZM8haAchW-aJSHHkJTcYaWSRA-HvbExniFqr0qIWCry-LfbKOztcsskidqDo8rWY5w0581jR2pBTt8gzPoRL5v7C13iPczGsa_lenHfqF0Z_kZtyb15p6ZZSLOmOzrTm78Y8mNSrLENm9JdHhRgW1AJe-0vFqvbUj2l9vFCKwi4uamlR29EXvx9K664j_ytBaiPy8KUOk2Vlju7t8rk)
        }

        .dark .form-select {
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuB3l-63rm_lveLsT5mWKw45FkRKmWBs3GwykGZLLMSmvz-BECdWKuu-34G6ZM8haAchW-aJSHHkJTcYaWSRA-HvbExniFqr0qIWCry-LfbKOztcsskidqDo8rWY5w0581jR2pBTt8gzPoRL5v7C13iPczGsa_lenHfqF0Z_kZtyb15p6ZZSLOmOzrTm78Y8mNSrLENm9JdHhRgW1AJe-0vFqvbUj2l9vFCKwi4uamlR29EXvx9K664j_ytBaiPy8KUOk2Vlju7t8rk)
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

@extends('layouts.main')

{{-- @dd($user) --}}
@section('content')
    @if (session('success'))
        <p class="text-xl text-green-500">{{ session('success') }}</p>
    @endif
    <div
        class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center py-5 sm:py-10 px-4">
                @if ($user)
                        <form action="{{ route('profile.edit.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                            <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                                <div class="flex flex-wrap justify-between gap-3 p-4">
                                    <div class="flex min-w-72 flex-col gap-3">
                                        <p
                                            class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                                            Edit Your Profile</p>
                                        <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">Update
                                            your
                                            account and personal details below.</p>
                                    </div>
                                </div>
                                <div class="border-b border-solid border-primary/20 mt-4 mb-8"></div>
                                <div class="flex p-4 @container">
                                    <div class="flex w-full gap-4 @[520px]:flex-row @[520px]:justify-between @[520px]:items-center">
                                        <div class="flex gap-4 items-center">

                                            <div id="imageDisplay"
                                                class="bg-center bg-no-repeat aspect-square bg-cover rounded-full min-h-24 h-28 w-28 min-w-24"
                                                data-alt="User profile picture"
                                                style='background-image: url("{{ auth()->user()->user_image === null || auth()->user()->user_image === '' ? asset('upload/Default_profile.png') : asset('storage/' . auth()->user()->user_image) }}");'>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <p
                                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">
                                                    Profile Photo</p>
                                                <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">
                                                    Upload a new photo for your profile.</p>
                                            </div>
                                        </div>
                                        <label for="imageUpload"
                                            class="flex min-w-[84px] max-w-[480px] w-fit cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-primary/20 text-gray-900 dark:text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:w-auto hover:bg-primary/30 transition-colors">
                                            <span class="truncate">Change Photo</span>
                                            <input id="imageUpload" type="file" name="user_image" accept=".png, .jpeg, .jpg, .webp"
                                                class="w-full h-full" hidden>
                                        </label>
                                    </div>
                                </div>
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                                    Account Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                                    <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Username</p>
                                            <input
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-gray-500 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                value="{{ $user->user_name }}" disabled />
                                        </label>
                                    </div>
                                    <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Email
                                            </p>
                                            <input
                                                class="form-input flex w-full min-w-0 flex-1 resize-none  overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-gray-500 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                type="email" value="{{ $user->email }}" disabled />
                                        </label>
                                    </div>
                                    {{-- <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Password</p>
                                            <div class="relative w-full">
                                                <input
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal pr-12"
                                                    type="password" value="••••••••••" />
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 dark:text-gray-400 cursor-pointer">
                                                    <span class="material-symbols-outlined text-xl">visibility_off</span>
                                                </button>
                                            </div>
                                        </label>
                                    </div> --}}
                                </div>
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                                    Connect để kết nối</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                                    <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Connect</p>
                                            <input name="amount"
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                value="{{ (int) auth()->user()->amount->amount }}" />
                                        </label>
                                    </div>
                                    {{-- <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Password</p>
                                            <div class="relative w-full">
                                                <input
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal pr-12"
                                                    type="password" value="••••••••••" />
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 dark:text-gray-400 cursor-pointer">
                                                    <span class="material-symbols-outlined text-xl">visibility_off</span>
                                                </button>
                                            </div>
                                        </label>
                                    </div> --}}
                                </div>
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                                    Personal Details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                                    <div class="flex flex-col w-full flex-wrap gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Year
                                                of Birth</p>
                                            <input
                                                class="form-input flex w-full max-h-fit min-w-0 flex-1 resize-none  overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                name="year_of_birth" type="text" value="{{ $user->year_of_birth }}" />
                                        </label>
                                        @error('year_of_birth')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Height (cm)</p>
                                            <input name="height"
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                value="{{ $user->height * 100 }}" />
                                        </label>
                                        @error('height')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col w-full flex-wrap gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Gender</p>
                                            <input type="hidden" name="user_gender" id="user_gender"
                                                value="{{ $user->user_gender }}">
                                            <div class="grid grid-cols-3 gap-2 rounded bg-primary/20 p-1">
                                                @php
                                                    $gender = ['Male', 'Female', 'Other'];
                                                @endphp
                                                @for ($i = 0; $i < count($gender); $i++)
                                                    <button type="button" value="{{ $gender[$i] }}"
                                                        class="buttonGender flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden h-10 px-4 {{ $gender[$i] == $user->user_gender ? 'bg-white dark:bg-gray-800 text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-300 hover:bg-white/50 dark:hover:bg-gray-800/50' }} text-sm font-medium leading-normal tracking-[0.015em] rounded-md ">{{ $gender[$i] }}</button></button>
                                                @endfor
                                            </div>
                                        </label>
                                        @error('user_gender')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex w-full flex-wrap items-end gap-4 px-4 py-3">
                                        <label class="flex flex-col min-w-40 flex-1">
                                            <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                                Location</p>
                                            <input name="user_address"
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-14 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal"
                                                value="{{ $user->user_address === null ? '' : $user->user_address }}"
                                                placeholder="{{ $user->user_address !== null ? '' : 'Hãy cập nhật nơi bạn sống' }}" />
                                        </label>
                                    </div>
                                </div>
                                <h2
                                    class="text-gray-900 dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-8">
                                    About Me</h2>
                                <div class="flex max-w-full flex-wrap gap-4 px-4 py-3">
                                    <label class="flex flex-col min-w-40 flex-1">
                                        <p class="text-gray-900 dark:text-white text-base font-medium leading-normal pb-2">
                                            Profile
                                            Slogan</p>
                                        <textarea name="slogan"
                                            class="form-textarea flex w-full min-w-0 flex-1 resize-y rounded text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-primary/20 bg-white/50 dark:bg-black/20 focus:border-primary h-28 placeholder:text-gray-400 p-[15px] text-base font-normal leading-normal">{{ $user->slogan !== null ? $user->slogan : '' }}</textarea>
                                    </label>
                                    @error('slogan')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col px-4 py-3">
                                    @php
                                        $hobbies = trim($user->hobbies);
                                        // dd($hobbies);
                                        $hobbiesArray = $hobbies !== '' ? explode(',', $hobbies) : [];
                                    @endphp
                                    <h2 class="text-xl font-semibold leading-7 text-gray-900 dark:text-white">Hobbies</h2>
                                    <div class="hobbiesContainer mt-6 flex flex-wrap items-center gap-3">
                                        <input type="hidden" name="hobbies" id="inputHobbies"
                                            value="{{ implode(',', array_map('trim', $hobbiesArray)) }}">
                                        @if ($hobbies !== '')
                                            {{-- @foreach ($hobbiesArray as $hobby)
                                            <span
                                                class="hobbyItem inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                                {{ $hobby }}
                                                <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                    type="button">
                                                    <span
                                                        class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                                </button>
                                            </span>
                                            @endforeach --}}
                                        @else
                                            {{-- <span
                                                class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                                Chưa cập nhật
                                            </span> --}}
                                        @endif
                                        {{-- <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Hiking
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span> --}}
                                        {{-- --}}
                                    </div>
                                    @error('hobbies')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <div class="mt-4 flex items-center gap-x-3">
                                        <input
                                            class="block w-full max-w-sm rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                            id="inputInsertHobby" placeholder="Add a hobby..." type="text" />
                                        <button id="buttonInsertHobby" type="button"
                                            class="rounded-lg bg-pink-100 dark:bg-gray-800 p-2 text-primary dark:text-pink-300 shadow-sm hover:bg-pink-200 dark:hover:bg-gray-700 transition-colors">
                                            <span class="material-icons-outlined text-2xl font-bold">add</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="border-t border-solid border-primary/20 mt-8 mb-6"></div>
                            <div class="flex flex-col sm:flex-row items-center justify-end gap-4 px-4 py-3">
                                <button type="button"
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 bg-transparent text-gray-800 dark:text-gray-200 text-base font-bold leading-normal tracking-[0.015em] w-full sm:w-auto hover:bg-primary/10 transition-colors">
                                    <a class="w-full h-full flex justify-center items-center" href="{{ route('profile.get') }}">
                                        <span class="truncate">Cancel</span>
                                    </a>
                                </button>
                                <input
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] w-full sm:w-auto hover:bg-primary/90 transition-colors"
                                    type="submit" value="Update Profile">
                                {{-- <button type="button" class="">
                                    <span class="truncate"></span>
                                </button> --}}
                            </div>
                        </form>
                    </div>
                @else
                <div class="min-h-screen">
                    <header class="bg-white/80 dark:bg-black/50 backdrop-blur-sm sticky top-0 z-10">
                        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-xl font-bold text-gray-800 dark:text-white">LuvHub</span>
                            </div>
                            <div class="hidden md:flex items-center space-x-8">
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Discover</a>
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Messages</a>
                                <a class="text-gray-800 dark:text-white font-semibold hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">My Profile</a>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button
                                    class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                                    <span class="material-icons-outlined text-2xl">notifications</span>
                                    <span
                                        class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-primary ring-2 ring-background-light dark:ring-background-dark"></span>
                                </button>
                                <button>
                                    <img alt="User avatar"
                                        class="w-10 h-10 rounded-full object-cover border-2 border-primary/50"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdWTf3xjyFUTCaIa1A73FV34cvr-witSUK10PoTomDI-2O-zJhjhnH0WXGkipTEeCTsV-04--R2jjXTWMxDhIk5ZEuHVI9mbg9Z8xpMe36blSD1I0Eqp0mcVTC324nlic7Jym4KF9lB0FNGa2ZQXCWeYMTxWsgOzxkcHCSEg5k_57SEcipqBcsMseK2PK5B2hJi8o0IKUhFSuGBhVYyG1J3YpyNv8Ja8zRbCYqLWUYAJKJGvMdZonYR4dkDWhrsweMTsHEBNPKCYA" />
                                </button>
                            </div>
                        </nav>
                    </header>
                    <main class="container mx-auto px-6 py-12 max-w-4xl">
                        <div class="mb-10">
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Edit Your Profile</h1>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">Update your account and personal details below.
                            </p>
                            <div class="mt-4 w-24 h-0.5 bg-primary/30"></div>
                        </div>
                        <form action="#" method="POST">
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 dark:border-gray-100/10 pb-12">
                                    <div class="flex items-center gap-x-6">
                                        <div
                                            class="w-20 h-20 rounded-lg bg-pink-100 dark:bg-gray-800 flex items-center justify-center">
                                            <span
                                                class="material-icons-outlined text-4xl text-pink-300 dark:text-gray-500">person</span>
                                        </div>
                                        <div>
                                            <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Profile
                                                Photo</h2>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Upload a new photo for your
                                                profile.
                                            </p>
                                        </div>
                                        <button
                                            class="ml-auto rounded-lg bg-pink-100 dark:bg-gray-800 px-4 py-2 text-sm font-semibold text-primary dark:text-pink-300 shadow-sm hover:bg-pink-200 dark:hover:bg-gray-700 transition-colors"
                                            type="button">Change Photo</button>
                                    </div>
                                </div>
                                <div class="border-b border-gray-900/10 dark:border-gray-100/10 pb-12">
                                    <h2 class="text-xl font-semibold leading-7 text-gray-900 dark:text-white">Account
                                        Information
                                    </h2>
                                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="username">Username</label>
                                            <div class="mt-2">
                                                <input
                                                    class="block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                                    id="username" name="username" type="text" value="alexj" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="email">Email</label>
                                            <div class="mt-2">
                                                <input autocomplete="email"
                                                    class="block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                                    id="email" name="email" type="email" value="alex.johnson@example.com" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="password">Password</label>
                                            <div class="mt-2 relative">
                                                <input
                                                    class="block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition pr-10"
                                                    id="password" name="password" type="password" value="••••••••••" />
                                                <button
                                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300"
                                                    type="button">
                                                    <span class="material-icons-outlined text-lg">visibility_off</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-gray-900/10 dark:border-gray-100/10 pb-12">
                                    <h2 class="text-xl font-semibold leading-7 text-gray-900 dark:text-white">Personal Details
                                    </h2>
                                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-2">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="birth-year">Year of Birth</label>
                                            <div class="mt-2">
                                                <select
                                                    class="form-select block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                                    id="birth-year" name="birth-year">
                                                    <option>1996</option>
                                                    <option selected="">1995</option>
                                                    <option>1994</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="height">Height (cm)</label>
                                            <div class="mt-2">
                                                <input
                                                    class="block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                                    id="height" name="height" type="number" value="182" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label
                                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">Gender</label>
                                            <div class="mt-2">
                                                <div class="inline-flex rounded-lg p-1 bg-pink-100 dark:bg-gray-800">
                                                    <button
                                                        class="px-6 py-1.5 text-sm font-medium rounded-md bg-white dark:bg-gray-700 text-primary dark:text-white shadow-sm"
                                                        type="button">Man</button>
                                                    <button
                                                        class="px-6 py-1.5 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-white"
                                                        type="button">Woman</button>
                                                    <button
                                                        class="px-6 py-1.5 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-white"
                                                        type="button">Other</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4">
                                            <label class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-300"
                                                for="location">Location</label>
                                            <div class="mt-2">
                                                <input
                                                    class="block w-full rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                                    id="location" name="location" type="text" value="San Francisco, CA" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-xl font-semibold leading-7 text-gray-900 dark:text-white">Hobbies</h2>
                                    <div class="mt-6 flex flex-wrap items-center gap-3">
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Hiking
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Cooking
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Photography
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Evaluating
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Wintering
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                                            Energy
                                            <button class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20"
                                                type="button">
                                                <span
                                                    class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="mt-4 flex items-center gap-x-3">
                                        <input
                                            class="block w-full max-w-sm rounded-lg border-0 py-2.5 px-3.5 bg-pink-50/50 dark:bg-gray-800/50 text-gray-900 dark:text-white shadow-sm ring-1 ring-inset ring-primary/20 dark:ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:focus:ring-primary sm:text-sm sm:leading-6 transition"
                                            id="add-hobby" name="add-hobby" placeholder="Add a hobby..." type="text" />
                                        <button
                                            class="rounded-lg bg-pink-100 dark:bg-gray-800 p-2 text-primary dark:text-pink-300 shadow-sm hover:bg-pink-200 dark:hover:bg-gray-700 transition-colors"
                                            type="button">
                                            <span class="material-icons-outlined text-2xl font-bold">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-12 pt-8 flex items-center justify-end gap-x-6 border-t border-gray-900/10 dark:border-gray-100/10">
                                <button
                                    class="text-sm font-semibold leading-6 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                                    type="button">Cancel</button>
                                <button
                                    class="rounded-full bg-primary px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-colors"
                                    type="submit">Update Profile</button>
                            </div>
                        </form>
                    </main>
                </div>
            @endif
        </div>
    </div>
    {{-- // js should be inside @section else it will be ignored by laravel --}}
    <script defer>
        const inputGender = document.getElementById("user_gender");
        const genderbuttons = document.querySelectorAll(".buttonGender");
        // console.log("inputGender>>>>>>>>>>>>", inputGender);
        // console.log("genderbutton>>>>>>>>>>>>", genderbuttons);
        genderbuttons.forEach((item, index) => {
            item.addEventListener('click', () => {
                genderbuttons.forEach(child => {
                    child.classList.remove('bg-white', 'dark:bg-gray-800', 'text-gray-900',
                        'dark:text-white'
                    )
                });
                inputGender.value = item.value;
                item.classList.add('transition-all', 'bg-white', 'dark:bg-gray-800', 'text-gray-900',
                    'dark:text-white');
            })
        })
        const inputHobbies = document.querySelector("#inputHobbies");
        const hobbiesContainer = document.querySelector(".hobbiesContainer");
        let hobbiesArray = inputHobbies.value === '' ? [] : inputHobbies.value.split(',');
        console.log(hobbiesArray);
        //TODO: load hobbies
        if (hobbiesArray.length < 1) {
            const hobbyItemHTML = `
                    <span class="hobbyItem inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                        Chưa cập nhật
                        <button onclick="deleteHobby()" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20" type="button">
                            <span class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                            </button>
                            </span>
                            `;
            hobbiesContainer.insertAdjacentHTML('beforeend', hobbyItemHTML);
        } else {
            hobbiesArray.forEach(item => {
                const hobbyItemHTML = `
                    <span class="hobbyItem inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                        ${item}
                        <button onclick="deleteHobby()" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20" type="button">
                            <span class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                            </button>
                            </span>
                            `;
                hobbiesContainer.insertAdjacentHTML('beforeend', hobbyItemHTML);
            });
        }

        // TODO: insert hobby
        const buttonInsertHobby = document.querySelector("#buttonInsertHobby");
        const inputInsertHobby = document.querySelector("#inputInsertHobby");

        buttonInsertHobby.addEventListener('click', () => {
            if (inputInsertHobby.value !== "") {
                if (hobbiesArray.length < 1) {
                    // console.log(hobbiesContainer.children[0]);
                    hobbiesContainer.removeChild(hobbiesContainer.children[1]);
                    hobbiesArray = [];
                }
                const hobby = inputInsertHobby.value;
                hobbiesArray = [...hobbiesArray, hobby];
                console.log(hobbiesArray);
                const hobbyItemHTML = `
                    <span class="hobbyItem inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-sm font-medium text-primary bg-white dark:bg-gray-800 ring-1 ring-inset ring-primary/50 dark:ring-gray-700">
                        ${hobby}
                        <button onclick="deleteHobby()" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-primary/20" type="button">
                            <span class="material-icons-outlined !text-xs text-primary group-hover:text-primary/80">close</span>
                            </button>
                            </span>
                            `;
                hobbiesContainer.insertAdjacentHTML('beforeend', hobbyItemHTML);
                inputInsertHobby.value = "";
                inputHobbies.value = hobbiesArray.join(',');
                console.log("hobbiesArray:>>>>>>> ", hobbiesArray.join(','));
                console.log("inputHobbies:>>>>>>> ", inputHobbies.value);
            }
        })

        // TODO: delete hobby
        const deleteHobby = () => {
            const hobbiesDel = document.querySelectorAll(".hobbyItem > button");
            hobbiesDel.forEach(item => {
                item.addEventListener('click', (e) => {
                    const spanContent = e.target.closest(".hobbyItem"); // get Node
                    const textContent = spanContent.childNodes[0].nodeValue.trim();
                    hobbiesArray = hobbiesArray.filter(item => item !== textContent);
                    hobbiesContainer.removeChild(spanContent);
                    inputHobbies.value = hobbiesArray.join(',');
                })
            })
        }

        //uploadShowImage
        const imageUpload = document.querySelector("#imageUpload");
        const imageDisplay = document.querySelector("#imageDisplay");
        imageUpload.addEventListener('change', (e) => {
            const files = e.target.files;
            const imageUrl = URL.createObjectURL(files[0]);
            console.log(imageUrl);
            console.log(imageDisplay.style.backgroundImage);
            imageDisplay.style.backgroundImage = `url("${imageUrl}")`;
        })
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