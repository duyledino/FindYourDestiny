<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub Admin - User Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Active state style */
        .nav-item.active {
            background-color: rgba(244, 37, 89, 0.1);
            color: #f42559;
            border-right: 3px solid #f42559;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "primary-hover": "#d61c4b",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>


<!-- Sidebar Navigation -->
@extends('layouts.main_admin')
@section('admin_content')
    {{-- @dd($users) --}}
    <main class="sm:ml-64 min-h-screen transition-all duration-300">
        <div class="p-6 lg:p-10">

            <!-- SECTION: USER MANAGEMENT CONTENT -->
            <div id="view-users" class="w-full max-w-7xl mx-auto block fade-in">
                <header class="flex flex-wrap items-center justify-between gap-3 mb-8">
                    <div>
                        <h1 class="text-gray-900 dark:text-gray-50 text-4xl font-black leading-tight tracking-[-0.033em]">
                            User Management</h1>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Manage user accounts and permissions.</p>
                    </div>
                    <a href="{{ route('add_user.get') }}">
                        <button
                            class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-5 py-2.5 rounded-full font-bold text-sm hover:opacity-90 transition-opacity flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">add</span>
                            Add User
                        </button>
                    </a>
                </header>

                <!-- User Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div
                        class="card flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">Total Users</p>
                            <span class="material-symbols-outlined text-gray-400">group</span>
                        </div>
                        <p class="text-gray-900 dark:text-gray-50 tracking-tight text-3xl font-bold leading-tight">
                            {{ $total_user }}
                        </p>
                    </div>
                    <div
                        class="card flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">New This Week</p>
                            <span class="material-symbols-outlined text-green-500">trending_up</span>
                        </div>
                        <p class="text-green-600 tracking-tight text-3xl font-bold leading-tight">
                            +{{ $total_user_in_7days }}</p>
                    </div>
                    <div
                        class="card flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 shadow-sm">
                        <div class="flex justify-between items-start">
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">Active Users</p>
                            <span class="material-symbols-outlined text-primary">favorite</span>
                        </div>
                        <p class="text-primary tracking-tight text-3xl font-bold leading-tight">{{ $total_user_active }}</p>
                    </div>
                </div>

                <!-- User Table & Filter -->
                <div
                    class="card bg-white dark:bg-[#1a0c10] rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="p-4 flex flex-wrap items-center gap-4 border-b border-gray-200 dark:border-gray-800">
                        <div class="flex-1 min-w-[250px]">
                            <label class="flex flex-col h-10 w-full relative">
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                                    <span class="material-symbols-outlined" style="font-size: 20px;">search</span>
                                </div>
                                <input
                                    class="flex w-full rounded-lg text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary/50 border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 h-full pl-10 pr-4 text-sm transition-all"
                                    placeholder="Search users by name or email..." />
                            </label>
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Filter</button>
                            <button
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Export</button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-900/50">
                                <tr>
                                    <th class="px-6 py-4 font-bold">User</th>
                                    <th class="px-6 py-4 font-bold">Email</th>
                                    <th class="px-6 py-4 font-bold text-center">Status</th>
                                    <th class="px-6 py-4 font-bold text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                @if ($users !== null && count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr
                                            class="bg-white dark:bg-[#1a0c10] hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors">
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100 flex items-center gap-3">
                                                <div class="relative">
                                                    <img class="w-10 h-10 rounded-full object-cover border border-gray-200 dark:border-gray-700"
                                                        src="{{ $user->user_image == null || $user->user_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}"
                                                        alt="Avatar">
                                                    <span
                                                        class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white dark:border-[#1a0c10] rounded-full"></span>
                                                </div>
                                                <div>
                                                    <div class="font-bold">{{ $user->user_name }}</div>
                                                    <div class="text-xs text-gray-500">{{ $user->user_gender }}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">{{ $user->email }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($user->ban === 1)
                                                    <span
                                                        class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">Banned</span>
                                                @else
                                                    <span
                                                        class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">Active</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="{{ route('detail_user.get', ["user_id" => $user->user_id]) }}">
                                                    <button
                                                        class="text-gray-400 hover:text-primary p-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                                        <span class="material-symbols-outlined">edit</span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center justify-between">
                        <span class="text-sm text-gray-500">Page {{ $page }} of {{ $total_page }}</span>
                        <div class="flex gap-2">
                            @if ($page > 1)
                                <a href="{{ route('dashboard.get') }}?page={{ $page - 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Prev</button>
                                </a>
                            @endif
                            @if ($page < $total_page)
                                <a href="{{ route('dashboard.get') }}?page={{ $page + 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Next</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

<!-- Main Content Area -->

</html>