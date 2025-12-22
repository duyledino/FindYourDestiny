<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - User Details</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "primary-hover": "#d61a4a",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d161b",
                        "border-light": "#e8ced5",
                        "border-dark": "#4a2a32",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .card {
                @apply bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark rounded-xl shadow-sm;
            }
            .text-main {
                @apply text-slate-900 dark:text-slate-100;
            }
            .text-sub {
                @apply text-slate-500 dark:text-slate-400;
            }
            .table-head {
                @apply bg-background-light dark:bg-[#33181e] text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider;
            }
            .table-cell {
                @apply px-6 py-4 whitespace-nowrap text-sm text-main border-b border-border-light dark:border-border-dark;
            }
        }
    </style>
</head>

@extends('layouts.main_admin')

@section('admin_content')

    {{-- @dd($user) --}}
    {{-- @dd($reports) --}}
    {{-- @dd($dates) --}}
    <main class="sm:ml-64 flex-1 flex flex-col h-full relative overflow-hidden">
        <!-- Mobile Header -->
        <header
            class="lg:hidden flex items-center justify-between p-4 bg-surface-light dark:bg-surface-dark border-b border-border-light dark:border-border-dark z-20">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">favorite</span>
                <span class="font-bold text-main">LuvHub</span>
            </div>
            <button class="text-main">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </header>
        <div class="flex-1 overflow-y-auto p-4 md:p-8 scroll-smooth">
            <div class="max-w-7xl mx-auto space-y-6">
                <!-- Breadcrumbs & Heading -->
                <div class="space-y-4">
                    <nav class="flex text-sm font-medium text-sub">
                        <a href="{{ url()->previous() }}">
                            <button
                                class="flex items-center gap-2 px-4 py-2 rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark text-text-main-light dark:text-text-main-dark font-medium text-sm hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <span class="material-symbols-outlined text-base">arrow_back</span>
                                Back to List
                            </button>
                        </a>
                    </nav>
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-extrabold text-main tracking-tight">{{ $user->user_name }}</h1>
                            <p class="text-sub mt-1">Manage user profile, permissions, and view activity logs.</p>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="px-4 py-2 rounded-lg border border-border-light dark:border-border-dark text-main bg-surface-light dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-800 font-bold text-sm transition-colors">
                                Reset Password
                            </button>
                            <button
                            form="update_detail_user"
                            type="submit"
                                class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-primary-hover font-bold text-sm shadow-lg shadow-primary/30 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">save</span>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Top Grid: Profile & Stats -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Col 1: Profile Card (Left) -->
                    <div class="lg:col-span-4 space-y-6">
                        <div class="card p-6 flex flex-col items-center text-center relative overflow-hidden">
                            <div
                                class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-primary/10 to-pink-200/20 dark:to-pink-900/10 z-0">
                            </div>
                            <div class="relative z-10 size-32 rounded-full border-4 border-surface-light dark:border-surface-dark shadow-md bg-center bg-cover mb-4"
                                data-alt="User profile picture of Jane Doe"
                                style='background-image: url("{{ $user->user_image == null || $user->user_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}");'>
                            </div>
                            <h2 class="text-xl font-bold text-main">{{ $user->user_name }}</h2>
                            <p class="text-sm text-sub font-medium mb-4">ID: {{ $user->user_id }} •
                                {{ date('Y') - $user->year_of_birth }} Years Old
                            </p>
                            <div class="flex items-center justify-center gap-2 mb-6">
                                <span
                                    class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800 dark:bg-pink-900/30 dark:text-pink-300">
                                    @if ($user->user_gender == "Male")
                                        <span class="material-symbols-outlined text-[14px]">male</span> Nam
                                    @elseif($user->user_gender == "Female")
                                        <span class="material-symbols-outlined text-[14px]">female</span> Nữ
                                    @else
                                        <span class="material-symbols-outlined text-[14px]">none</span> Khác
                                    @endif
                                </span>
                                {{-- <span
                                    class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                    <span class="material-symbols-outlined text-[14px]">verified</span> Verified
                                </span> --}}
                            </div>
                            <div class="w-full space-y-4 border-t border-border-light dark:border-border-dark pt-5">
                                <div class="flex justify-between text-sm">
                                    <span class="text-sub">Nơi ở</span>
                                    <span
                                        class="text-main font-medium text-right max-w-[60%]">{{ $user->user_address }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-sub">Ngày tạo</span>
                                    <span class="text-main font-medium">{{ $user->create_at }}</span>
                                </div>
                                <div class="flex flex-col gap-1 text-left">
                                    <span class="text-sub text-xs uppercase font-bold tracking-wide">Bio</span>
                                    <p class="text-sm text-main italic">"{{ $user->slogan }}"</p>
                                </div>
                            </div>
                        </div>
                        <!-- Hobbies Card -->
                        <div class="card p-6">
                            <h3 class="text-lg font-bold text-main mb-4">Interests &amp; Sở thích</h3>
                            <div class="flex flex-wrap gap-2">
                                @if ($user->hobbies_name === "")
                                    <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium">Chưa cập
                                        nhật</span>
                                @else
                                    @foreach (explode(',', $user->hobbies_name) as $hobby)
                                        <span
                                            class="px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium">{{ $hobby }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Col 2: Management & Data (Right) -->
                    <div class="lg:col-span-8 space-y-6">
                        <!-- Control Panel -->
                        <div class="card p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-bold text-main">Account Status</h3>
                                <span class="text-xs text-sub">Last updated: {{ $user->update_at }}</span>
                            </div>
                            <form id="update_detail_user" action="{{ route('detail_user.post') }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-main">User Status</label>
                                    <div class="relative">
                                        <select name="status"
                                            class="block w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-main focus:border-primary focus:ring-primary sm:text-sm p-2.5">
                                            <option @if ($user->ban == 0) selected @endif value="active">Active</option>
                                            <option @if ($user->ban == 1) selected @endif value="banned">Banned</option>
                                        </select>
                                    </div>
                                    <p class="text-xs text-sub">Controls login access for this user.</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-main">User Role</label>
                                    <div class="relative">
                                        <select
                                            name="role_id"
                                            class="block w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-main focus:border-primary focus:ring-primary sm:text-sm p-2.5">
                                            @foreach ($roles as $role)
                                                <option @if ($user->role_id == $role->role_id) selected @endif
                                                    value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p class="text-xs text-sub">Defines permissions and feature access.</p>
                                </div>
                            </form>
                        </div>
                        <!-- Economy Stats -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="card p-6 flex items-center justify-between">
                                <div>
                                    <p class="text-sub text-sm font-medium mb-1">Connect hiện tại</p>
                                    <p class="text-3xl font-black text-main tracking-tight">{{ $user->connect_quantity }}
                                    </p>
                                    {{-- <p class="text-xs text-green-600 font-medium mt-1 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">trending_up</span> +12% this
                                        month
                                    </p> --}}
                                </div>
                                <div
                                    class="size-12 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 flex items-center justify-center">
                                    <span class="material-symbols-outlined">monetization_on</span>
                                </div>
                            </div>
                            <div class="card p-6 flex items-center justify-between">
                                <div>
                                    <p class="text-sub text-sm font-medium mb-1">Amount to Connect</p>
                                    <p class="text-3xl font-black text-main tracking-tight">
                                        {{ substr($user->amount_connect, 0, 2) }}
                                    </p>
                                    <p class="text-xs text-sub mt-1">Connect để người khác kết nối</p>
                                </div>
                                <div
                                    class="size-12 rounded-full bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined">handshake</span>
                                </div>
                            </div>
                        </div>
                        <!-- Data Tables Section -->
                        <div class="space-y-8">
                            <!-- Reports Section -->
                            <div class="card overflow-hidden">
                                <div
                                    class="px-6 py-4 border-b border-border-light dark:border-border-dark flex justify-between items-center bg-gray-50 dark:bg-white/5">
                                    <h3 class="font-bold text-main flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">flag</span>
                                        Reports History
                                    </h3>
                                    <div class="flex gap-2 text-xs">
                                        <span
                                            class="px-2 py-1 bg-red-100 text-red-700 rounded dark:bg-red-900/30 dark:text-red-300 font-bold">2
                                            Received</span>
                                        <span
                                            class="px-2 py-1 bg-gray-200 text-gray-700 rounded dark:bg-gray-700 dark:text-gray-300 font-medium">1
                                            Created</span>
                                    </div>
                                </div>
                                <!-- Reports Received Table -->
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                                        <thead class="bg-gray-50 dark:bg-white/5">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Report ID</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Type</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Reason</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Date</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="divide-y divide-border-light dark:divide-border-dark bg-surface-light dark:bg-surface-dark">
                                            @if ($reports != null && count($reports) > 0)
                                                @foreach ($reports as $report)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-main">
                                                            {{ $report->report_id }}
                                                        </td>
                                                        @if ($report->user_create_id == $user->user_id)
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500 font-bold">
                                                                Đã tạo</td>
                                                        @else
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500 font-bold">
                                                                Bị report</td>
                                                        @endif

                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-main">
                                                            {{ $report->report_name }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-sub">
                                                            {{ $report->create_at }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200">{{ $report->status }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Connections Table -->
                            <div class="card overflow-hidden">
                                <div
                                    class="px-6 py-4 border-b border-border-light dark:border-border-dark flex justify-between items-center bg-gray-50 dark:bg-white/5">
                                    <h3 class="font-bold text-main flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">diversity_1</span>
                                        Connection History
                                    </h3>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                                        <thead class="bg-gray-50 dark:bg-white/5">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Date</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">User Connected</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Direction</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="divide-y divide-border-light dark:divide-border-dark bg-surface-light dark:bg-surface-dark">
                                            @if ($dates != null && count($dates) > 0)
                                                @foreach ($dates as $date)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-sub">
                                                            {{ $date->connect_at }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                @php
                                                                    $avatar_image = "";
                                                                    $other_name = "";
                                                                    if ($user->user_id == $date->user1_id) {
                                                                        $avatar_image = $date->user2_image;
                                                                        $other_name = $date->user2_name;
                                                                    } else {
                                                                        $avatar_image = $date->user1_image;
                                                                        $other_name = $date->user1_name;
                                                                    }
                                                                @endphp
                                                                <div class="h-8 w-8 rounded-full bg-gray-200 bg-cover"
                                                                    data-alt="Avatar of John Smith"
                                                                    style='background-image: url("{{ $avatar_image == null || $avatar_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $avatar_image) }}");'>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <div class="text-sm font-medium text-main">{{ $other_name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @if ($user->user_id == $date->user1_id)
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-main">
                                                                <span class="flex items-center gap-1 text-green-600 font-medium">
                                                                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                                                                    Gửi
                                                                </span>
                                                            </td>
                                                        @else
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-main">
                                                                <span class="flex items-center gap-1 text-blue-500 font-medium">
                                                                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                                                                    Nhận
                                                                </span>
                                                            </td>
                                                        @endif
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-sub">Matched
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Transactions Table -->
                            <div class="card overflow-hidden">
                                <div
                                    class="px-6 py-4 border-b border-border-light dark:border-border-dark flex justify-between items-center bg-gray-50 dark:bg-white/5">
                                    <h3 class="font-bold text-main flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">receipt_long</span>
                                        Purchase Transactions
                                    </h3>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                                        <thead class="bg-gray-50 dark:bg-white/5">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Trans ID</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Date</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Amount (Connect)</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">(From → To)</th>
                                                <th class="px-6 py-3 text-left text-xs font-semibold text-sub uppercase tracking-wider"
                                                    scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="divide-y divide-border-light dark:divide-border-dark bg-surface-light dark:bg-surface-dark">
                                            @if ($transactions != null && count($transactions) > 0)
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-sub">
                                                            {{ $transaction->transaction_id }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-main">
                                                            {{ $transaction->create_at }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-main">
                                                            {{ substr($transaction->amount,0,2) }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-sub">
                                                            {{ $transaction->amount_from }} → {{ $transaction->amount_to }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200">Completed</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- End Data Tables Wrapper -->
                    </div> <!-- End Right Column -->
                </div> <!-- End Grid -->
            </div>
        </div>
    </main>

@endsection

</html>