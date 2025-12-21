<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Chat Management - Admin Panel</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
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
    </style>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d151a",
                        "border-light": "#f4e7ea",
                        "border-dark": "#4a232b",
                        "text-main": "#1c0d11",
                        "text-sub": "#9c495e",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

@extends('layouts.main_admin')

@section('admin_content')
    {{-- @dd($users) --}}
    {{-- @dd($chats) --}}
    <main class="sm:ml-64 min-h-screen transition-all duration-300 p-5 fade-in">

        <!-- Page Heading -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 pb-8">
            <div class="flex flex-col gap-2">
                <h1
                    class="text-text-main dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">
                    Chat Management</h1>
                <p class="text-text-sub dark:text-gray-400 text-base font-normal leading-normal max-w-2xl">Monitor user
                    conversations, review history, and manage active chat sessions.</p>
            </div>
            <button
                class="bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-6 rounded-lg shadow-lg shadow-primary/30 flex items-center gap-2 transition-all">
                <span class="material-symbols-outlined text-[20px]">download</span>
                <span>Export Logs</span>
            </button>
        </div>
        <!-- Filters & Search Toolbar -->
        <div
            class="bg-surface-light dark:bg-surface-dark rounded-xl p-4 mb-6 shadow-sm border border-border-light dark:border-border-dark flex flex-col lg:flex-row gap-4 justify-between items-center">
            <!-- Search -->
            <div class="w-full lg:w-96">
                <label
                    class="flex w-full items-center gap-2 rounded-lg bg-background-light dark:bg-background-dark px-3 py-2.5 border border-transparent focus-within:border-primary transition-colors">
                    <span class="material-symbols-outlined text-text-sub text-[22px]">search</span>
                    <input
                        class="w-full bg-transparent text-text-main dark:text-white placeholder:text-text-sub focus:outline-none text-sm font-medium"
                        placeholder="Search by Email..." />
                </label>
            </div>
        </div>
        <!-- Main Data Table Container -->
        <div
            class="bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-background-light dark:bg-[#381a20]">
                        <tr>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-text-sub dark:text-gray-400">
                                User Profile</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-text-sub dark:text-gray-400">
                                User ID</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-text-sub dark:text-gray-400">
                                Email</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-text-sub dark:text-gray-400">
                                Joined Date</th>
                            <th colspan="2"
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-text-sub dark:text-gray-400 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-light dark:divide-border-dark text-sm">
                        <!-- Row 1: Active & Expanded -->
                        @if ($users !== null && count($users) > 0)
                            @foreach ($users as $user)
                                <tr onclick="window.location='{{ route('chats.get') }}?page={{ $page == null ? 1 : $page }}&user_id={{ $user->user_id }}'"
                                    class="group bg-surface-light dark:bg-surface-dark hover:bg-background-light dark:hover:bg-background-dark transition-colors cursor-pointer @if($user_id!==null && $user_id == $user->user_id) border-l-4 border-l-[#f42559] @endif">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="relative">
                                                <div class="size-10 rounded-full bg-cover bg-center bg-gray-200"
                                                    data-alt="User Avatar Sarah"
                                                    style='background-image: url("{{ $user->user_image == null || $user->user_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}");'>
                                                </div>
                                                @if ($user->ban == 1)
                                                    <span
                                                        class="absolute -bottom-2 -right-2 text-[8px] rounded-full text-red-500 material-symbols-outlined">block</span>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-bold text-text-main dark:text-white">{{ $user->user_name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-mono text-text-sub dark:text-gray-400">
                                        {{ substr($user->user_id, 0, 8) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-text-main dark:text-gray-300">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-text-main dark:text-gray-300">{{ $user->create_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right" colspan="2">
                                        <button
                                            class="rounded-full p-1 hover:bg-background-light dark:hover:bg-border-dark text-primary transition-colors">
                                            <span
                                                class="material-symbols-outlined">@if ($user_id !== null && $user_id == $user->user_id)
                                                 keyboard_arrow_down @else expand_less @endif</span>
                                        </button>
                                    </td>
                                </tr>
                                @if ($user_id != null && $user->user_id == $user_id)
                                        <tr class="bg-background-light dark:bg-[#1a0c0f]">
                                            <td class="p-0" colspan="6">
                                                <div class="p-6 border-y border-border-light dark:border-border-dark shadow-inner">
                                                    <div class="flex items-center justify-between mb-4">
                                                        <h3
                                                            class="text-sm font-bold uppercase tracking-wide text-text-sub dark:text-gray-400 flex items-center gap-2">
                                                            <span class="material-symbols-outlined text-[18px]">forum</span>
                                                            Recent Chat History
                                                        </h3>
                                                    </div>
                                                    <!-- Nested Table -->
                                                    <div
                                                        class="overflow-hidden rounded-lg border border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark shadow-sm">
                                                        <table class="w-full text-left">
                                                            <thead
                                                                class="bg-gray-50 dark:bg-[#2d151a] border-b border-border-light dark:border-border-dark">
                                                                <tr>
                                                                    <th
                                                                        class="px-4 py-3 text-xs font-semibold text-text-sub dark:text-gray-400 w-24">
                                                                        Chat ID</th>
                                                                    <th
                                                                        class="px-4 py-3 text-xs font-semibold text-text-sub dark:text-gray-400">
                                                                        Chat With</th>
                                                                    <th
                                                                        class="px-4 py-3 text-xs font-semibold text-text-sub dark:text-gray-400">
                                                                        Started</th>
                                                                    <th
                                                                        class="px-4 py-3 text-xs font-semibold text-text-sub dark:text-gray-400 text-right">
                                                                        Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-border-light dark:divide-border-dark text-sm">
                                                                @foreach ($chats as $chat)
                                                                @php
                                                                    $user_other_id = $user_id !== $chat->user1_id ? $chat->user1_id : $chat->user2_id;
                                                                    $user_other_name = $user_id !== $chat->user1_id ? $chat->user1_name : $chat->user2_name;
                                                                    $user_other_image = $user_id !== $chat->user1_id ? $chat->user1_image : $chat->user2_image;

                                                                @endphp
                                                                <tr
                                                                    class="hover:bg-gray-50 dark:hover:bg-background-dark transition-colors">
                                                                    <td
                                                                        class="px-4 py-3 font-mono text-xs text-text-sub dark:text-gray-500">
                                                                        {{ substr($chat->chat_id,0,8) }}</td>
                                                                    <td class="px-4 py-3">
                                                                        <div class="flex items-center gap-2">
                                                                            <div class="size-8 rounded-full bg-cover bg-center bg-gray-200"
                                                                                data-alt="Chat Partner Michael"
                                                                                style='background-image: url("{{ $user_other_image == null || $user_other_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user_other_image) }}");'>
                                                                            </div>
                                                                            <div class="flex flex-col">
                                                                                <span
                                                                                    class="font-medium text-text-main dark:text-white">{{ $user_other_name }}</span>
                                                                                <span
                                                                                    class="text-[10px] text-text-sub dark:text-gray-500">ID:{{ $user_other_id }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-4 py-3 text-text-main dark:text-gray-300">{{ $chat->create_at }}</td>
                                                                    <td class="px-4 py-3 text-right">
                                                                        <a href="{{ route("chat_message.get",["chat_id"=>$chat->chat_id]) }}">
                                                                            <button
                                                                                class="inline-flex items-center justify-center rounded-md bg-primary/10 px-2.5 py-1.5 text-xs font-bold text-primary hover:bg-primary hover:text-white transition-all">
                                                                                View Transcript
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                @endif
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
                                <a href="{{ route('chats.get') }}?page={{ $page - 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Prev</button>
                                </a>
                            @endif
                            @if ($page < $total_page)
                                <a href="{{ route('chats.get') }}?page={{ $page + 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Next</button>
                                </a>
                            @endif
                        </div>
                    </div>
        </div>
    </main>
@endsection

</html>