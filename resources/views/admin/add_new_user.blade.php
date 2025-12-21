<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Add New User - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "primary-dark": "#d61a48",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d1b20",
                        "border-light": "#e8ced5",
                        "border-dark": "#4a2b35",
                        "text-main": "#1c0d11",
                        "text-secondary": "#9c495e",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "2xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px
        }

        ::-webkit-scrollbar-track {
            background: transparent
        }

        ::-webkit-scrollbar-thumb {
            background: #e8ced5;
            border-radius: 4px
        }

        /* Select arrow fix */
        select {
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuAvB0RFsmqpiwYiTABC3IFU2GwbciDUIefV9C3kDobj2VNgsqT2T3de8qQyjnmZOLMMHp9Ul4O-mtqr48EdOwVgZOxTWCw9rznIm3KN2w5ll-4Kk5ti42hPCQkkK_hbxZc8H_DWaxsLOocoEEcyTuOPe823KUwrRP5KpjnBFaDEzyEQbO3bp4JTKfwn62BGJ0MJblwTR011dJTD2RJ-VW_XSxxMQHmL_bgbG8EXZ3Z3xSmkpSW-l8OJwSKW7SJck7BRq3IHJ7jaSKo);
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            appearance: none
        }
    </style>
</head>

@extends('layouts.main_admin')
@section('admin_content')
    <main action="{{ route('add_user.post') }}" method="post" enctype="multipart/form-data"
        class=" sm:ml-64 min-h-screen transition-all duration-300 p-5">
        <!-- Page Header -->
        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-text-main dark:text-white tracking-tight mb-2">Add New
                    User</h1>
                <p class="text-text-secondary dark:text-gray-400 text-base max-w-2xl">
                    Create a new profile manually. Ensure all required fields marked with <span
                        class="text-primary">*</span> are filled correctly.
                </p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard.get') }}">
                    <button type="button"
                        class="px-5 py-2.5 text-sm font-semibold text-text-secondary bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark rounded-lg hover:bg-gray-50 dark:hover:bg-border-dark transition-colors shadow-sm"
                        type="button">
                        Cancel
                    </button>
                </a>
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-semibold text-white bg-primary rounded-lg hover:bg-primary-dark transition-colors shadow-sm shadow-primary/30 flex items-center gap-2"
                    form="user-form" type="submit">
                    <span class="material-symbols-outlined text-[1.25rem]">save</span>
                    Create Profile
                </button>
            </div>
        </div>
        <!-- Form Container -->
        <form class="grid grid-cols-1 lg:grid-cols-12 gap-8" action="{{ route('add_user.post') }}" method="post"
            enctype="multipart/form-data" id="user-form">
            <!-- Left Column: Avatar & Role -->
            @csrf
            <div class="lg:col-span-4 space-y-6">
                <!-- Avatar Upload Card -->
                <div
                    class="bg-white dark:bg-surface-dark rounded-2xl p-6 shadow-sm border border-border-light dark:border-border-dark flex flex-col items-center text-center">
                    <h3 class="text-lg font-bold text-text-main dark:text-white mb-4 self-start w-full">Profile Photo
                    </h3>
                    <div class="relative group cursor-pointer mb-6">
                        <div id="image_display"
                            class="size-48 rounded-full border-4 border-dashed border-border-light dark:border-border-dark bg-gray-50 dark:bg-background-dark flex flex-col items-center justify-center overflow-hidden transition-colors group-hover:border-primary group-hover:bg-primary/5">
                            <span id="icon_upload"
                                class="material-symbols-outlined text-4xl text-text-secondary mb-2 group-hover:text-primary">add_a_photo</span>
                            <span id="icon_name"
                                class="text-sm font-medium text-text-secondary group-hover:text-primary">Upload
                                Image</span>
                        </div>
                        <input id="user_image" accept=".png, .jpeg, .jpg, .webp"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" name="user_image" type="file" />
                    </div>
                    <p class="text-xs text-text-secondary px-4">
                        Cho phép *.jpeg, *.jpg, *.png, .webp <br /> tối đa 2 MB
                    </p>
                </div>
                <!-- Account Settings Card -->
                <div
                    class="bg-white dark:bg-surface-dark rounded-2xl p-6 shadow-sm border border-border-light dark:border-border-dark">
                    <h3 class="text-lg font-bold text-text-main dark:text-white mb-4">Account Role</h3>
                    <div class="space-y-4">
                        <label class="flex flex-col gap-1.5">
                            <span class="text-sm font-semibold text-text-main dark:text-white">Role Access</span>
                            <div class="relative">
                                <select name="role_id"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary py-3 pl-4 pr-10 text-base font-medium shadow-sm transition-shadow">
                                    @if ($roles != null && count($roles) > 0)
                                        <option value="" {{ old('role_id') == "" ? 'selected' : '' }}>Chọn role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_id }}" {{ old('role_id') == $role->role_id ? 'selected' : '' }}>
                                                {{ $role->role_name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="">Không có role</option>
                                    @endif
                                </select>
                                @error('role_id')
                                    <p class="text-red-500 text-sm mt-1">{{ 'Chưa chọn quyền' }}</p>
                                @enderror
                            </div>
                        </label>
                        <div class="p-4 rounded-lg bg-primary/5 border border-primary/20">
                            <div class="flex gap-3">
                                <span class="material-symbols-outlined text-primary mt-0.5">info</span>
                                <div class="text-sm text-text-main dark:text-gray-300">
                                    <span class="font-bold block mb-1">Regular User</span>
                                    Regular truy cập các tính năng hẹn hò. Không thể truy cập admin panel.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Column: User Details -->
            <div class="lg:col-span-8">
                <div
                    class="bg-white dark:bg-surface-dark rounded-2xl p-6 md:p-8 shadow-sm border border-border-light dark:border-border-dark">
                    <!-- Section 1: Basic Information -->
                    <div class="mb-8 border-b border-border-light dark:border-border-dark pb-8">
                        <h3 class="text-lg font-bold text-text-main dark:text-white mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">person</span>
                            Thông tin cơ bản
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Email<span
                                        class="text-primary">*</span></span>
                                <input name="email" value="{{ old('email') }}"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 placeholder:text-text-secondary/60 shadow-sm"
                                    placeholder="john.doe@example.com" type="email" />
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">Chưa nhập email</p>
                                @enderror
                            </label>
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">User Name <span
                                        class="text-primary">*</span></span>
                                <input name="user_name" value="{{ old('user_name') }}"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 placeholder:text-text-secondary/60 shadow-sm"
                                    placeholder="johndoe123" type="text" />
                                @error('user_name')
                                    <p class="text-red-500 text-sm mt-1">Chưa nhập username</p>
                                @enderror
                            </label>
                            <label class="flex flex-col gap-2 md:col-span-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Slogan (hay Bio)</span>
                                <input name="slogan" value="{{ old('slogan') }}"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 placeholder:text-text-secondary/60 shadow-sm"
                                    placeholder="Yêu tôi là sự lựa chọn đúng 💖" type="text" />
                                <span class="text-xs text-text-secondary">Câu nói khiến người khác ấn tượng</span>
                                @error('slogan')
                                    <p class="text-red-500 text-sm mt-1">Phải có ít hơn 81 kí tự</p>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <!-- Section 2: Demographics -->
                    <div class="mb-8 border-b border-border-light dark:border-border-dark pb-8">
                        <h3 class="text-lg font-bold text-text-main dark:text-white mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">accessibility_new</span>
                            Xã hội
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Giới tính</span>
                                <select name="user_gender"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 shadow-sm">
                                    <option disabled="" value="" {{ old('user_gender') === null ? 'selected' : '' }}>Select...</option>
                                    <option value="Male" {{ old('user_gender') == 'Male' ? 'selected' : '' }}>Nam</option>
                                    <option value="Female" {{ old('user_gender') == 'Female' ? 'selected' : '' }}>Nữ</option>
                                    <option value="Other" {{ old('user_gender') == 'Other' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('user_gender')
                                    <p class="text-red-500 text-sm mt-1">Giới tính không được trống</p>
                                @enderror
                            </label>
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Năm sinh</span>
                                <input name="year_of_birth" value="{{ old('year_of_birth') }}"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 placeholder:text-text-secondary/60 shadow-sm"
                                    max="2024" min="1900" placeholder="1995" type="number" />
                                @error('year_of_birth')
                                    <p class="text-red-500 text-sm mt-1">Năm sinh không được trống</p>
                                @enderror
                            </label>
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Height (cm)</span>
                                <input name="height" value="{{ old('height') }}"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary h-12 px-4 placeholder:text-text-secondary/60 shadow-sm"
                                    max="215" min="140" placeholder="175" type="number" />
                                @error('height')
                                    <p class="text-red-500 text-sm mt-1">Chiều cao phải > 140 và < 215</p>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <!-- Section 3: Location -->
                    <div>
                        <h3 class="text-lg font-bold text-text-main dark:text-white mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                            Location
                        </h3>
                        <div class="grid grid-cols-1 gap-6">
                            <label class="flex flex-col gap-2">
                                <span class="text-sm font-semibold text-text-main dark:text-white">Nơi ở hiện tại</span>
                                <textarea name="user_address"
                                    class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main dark:text-white focus:ring-primary focus:border-primary p-4 placeholder:text-text-secondary/60 shadow-sm resize-none"
                                    placeholder="Enter full address or city..." rows="3">{{ old('user_address') }}</textarea>
                                @error('user_address')
                                    <p class="text-red-500 text-sm mt-1">Không được nhiều hơn 100 kí tự</p>
                                @enderror
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script defer>
        const user_image = document.querySelector("#user_image");
        const image_display = document.querySelector("#image_display");
        const icon_upload = document.querySelector("#icon_upload");
        const icon_name = document.querySelector("#icon_name");
        user_image.addEventListener('change', e => {
            console.log(e.target.files);
            const file = e.target.files;
            const imageUrl = URL.createObjectURL(file[0]);
            image_display.style.backgroundImage = `url("${imageUrl}")`;
            image_display.style.backgroundSize = `cover`;
            icon_upload.style.display = 'none';
            icon_name.style.display = 'none';
        })
    </script>
@endsection

</html>