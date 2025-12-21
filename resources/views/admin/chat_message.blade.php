<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - Chat Conversation</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "surface-dark": "#2d151a", // Slightly lighter than background-dark for cards
                        "surface-highlight": "#49222c", // Used for active states/subtle buttons
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #221014;
        }

        ::-webkit-scrollbar-thumb {
            background: #49222c;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #f42559;
        }
    </style>
</head>

@extends('layouts.main_admin')

@section('admin_content')
    {{-- @dd($chats) --}}
    {{-- @dd($messages) --}}
    <main
        class="flex-1  flex flex-col sm:ml-64 min-h-screen transition-all duration-300 p-5 fade-in min-w-0 bg-background-light dark:bg-background-dark relative">
        <header class="flex-shrink-0 bg-[#231015] border-b border-[#49222c] z-10 shadow-lg">
            <div class="flex justify-between px-6 py-4 border-b border-[#49222c]/50">
                <a href="{{ url()->previous() }}">
                    <button
                        class="flex-1 md:flex-none h-10 px-6 rounded-lg bg-primary/50 hover:bg-primary text-white text-sm font-bold shadow-lg shadow-red-900/20 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[15px]">arrow_back</span>
                        Back
                    </button>
                </a>
                <div class="flex flex-wrap items-center gap-2 text-sm">
                    <span class="text-white font-medium bg-[#49222c] px-2 py-0.5 rounded text-xs tracking-wider">ID:
                        {{ $chats->chat_id }}</span>
                </div>
            </div>
            <!-- Conversation Participants Header -->
            @php
                $isUser1Left = $user_id_view === null || $chats->user1_id == $user_id_view;

                $user_left_id = $isUser1Left ? $chats->user1_id : $chats->user2_id;
                $user_left_name = $isUser1Left ? $chats->user1_name : $chats->user2_name;
                $user_left_image = $isUser1Left ? $chats->user1_image : $chats->user2_image;

                $user_right_id = $isUser1Left ? $chats->user2_id : $chats->user1_id;
                $user_right_name = $isUser1Left ? $chats->user2_name : $chats->user1_name;
                $user_right_image = $isUser1Left ? $chats->user2_image : $chats->user1_image;

            @endphp
            <div class="px-6 py-5">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <!-- Left: User A -->
                    <div class="flex items-center gap-4 flex-1 w-full md:w-auto">
                        <div class="relative">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-14 border-2 border-[#49222c]"
                                data-alt="Portrait of Sarah Jenkins smiling in natural light"
                                style='background-image: url("{{ $user_left_image == null || $user_left_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user_left_image) }}");'>
                            </div>
                            <div
                                class="absolute bottom-0 right-0 size-3 bg-green-500 rounded-full border-2 border-[#231015]">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h2 class="text-white text-lg font-bold">{{ $user_left_name }}</h2>
                                <span
                                    class="px-2 py-0.5 rounded bg-[#49222c] text-white/70 text-[10px] font-bold uppercase">{{ $user_left_id }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Center: Connection Info -->
                    <div
                        class="flex flex-col items-center justify-center px-6 border-x border-[#49222c]/50 min-w-[140px] hidden md:flex">
                        <span class="text-[#cb909f] text-xs font-semibold tracking-widest uppercase mb-1">Connect</span>
                        <span class="text-white font-mono text-sm">{{ $chats->create_at }}</span>
                        <div class="w-full h-px bg-[#49222c] my-2"></div>
                        <span class="text-[#f42559] text-xs font-bold">{{ $total_message }} tin nhắn</span>
                    </div>
                    <!-- Right: User B -->
                    <div class="flex items-center justify-end gap-4 flex-1 w-full md:w-auto text-right">
                        <div>
                            <div class="flex items-center justify-end gap-2">
                                <span
                                    class="px-2 py-0.5 rounded bg-primary/20 text-primary text-[10px] font-bold uppercase">{{ $user_right_id }}</span>
                                <h2 class="text-white text-lg font-bold">{{ $user_right_name }}</h2>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-14 border-2 border-primary/50"
                                data-alt="Portrait of Mike Ross looking professional in a suit"
                                style='background-image: url("{{ $user_right_image == null || $user_right_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user_right_image) }}");'>
                            </div>
                            <div
                                class="absolute bottom-0 right-0 size-3 bg-gray-400 rounded-full border-2 border-[#231015]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contextual Actions Bar -->
            <div class="px-6 py-2 bg-[#1a0c10] border-t border-[#49222c] flex items-center justify-between">
                <div class="flex gap-2">
                    <a
                        href="{{ route('chat_message.get', ["chat_id" => $chats->chat_id]) }}?user_id_view={{ $user_left_id }}">
                        <button
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-[#49222c] hover:bg-[#5e2c39] text-white text-xs font-bold transition-colors">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            View User {{ $user_left_name }}
                        </button>
                    </a>
                    <a
                        href="{{ route('chat_message.get', ["chat_id" => $chats->chat_id]) }}?user_id_view={{ $user_right_id }}">
                        <button
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded bg-[#49222c] hover:bg-[#5e2c39] text-white text-xs font-bold transition-colors">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            View User {{ $user_right_name }}
                        </button>
                    </a>
                </div>
            </div>
        </header>
        <!-- Chat Stream Area -->
        <div class="flex-1 overflow-y-auto max-h-[450px] p-6 bg-[#1a0c10] relative">
            <div class="max-w-4xl  mx-auto flex flex-col gap-6 pb-20">
                <!-- Message Group: User A (Left) -->
                @if ($messages != null && count($messages) > 0)
                    @foreach ($messages as $message)
                        @if ($message->user_id == $user_left_id)
                            <div class="flex flex-col gap-1 items-start w-full max-w-[85%] self-start group">
                                <div class="flex items-end gap-3">
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mb-1 opacity-50 group-hover:opacity-100 transition-opacity"
                                        data-alt="Small thumbnail of Sarah Jenkins"
                                        style='background-image: url("{{ $user_left_image == null || $user_left_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user_left_image) }}");'>
                                    </div>
                                    <div class="flex flex-col gap-1 max-w-full">
                                        <div
                                            class="bg-[#2d151a] p-4 rounded-2xl rounded-bl-sm text-white text-sm leading-relaxed shadow-sm border border-[#49222c]/30">
                                            {{ $message->content }}
                                        </div>
                                        <span class="text-[#cb909f]/60 text-[10px] pl-1">{{ $message->create_at }}</span>
                                    </div>
                                </div>
                            </div>
                        @elseif($message->user_id == $user_right_id)
                            <div class="flex flex-col gap-1 items-end w-full max-w-[85%] self-end group">
                                <div class="flex flex-row-reverse items-end gap-3">
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mb-1 opacity-50 group-hover:opacity-100 transition-opacity"
                                        data-alt="Small thumbnail of Mike Ross"
                                        style='background-image: url("{{ $user_right_image == null || $user_right_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $user_right_image) }}");'>
                                    </div>
                                    <div class="flex flex-col gap-1 items-end max-w-full">
                                        <div
                                            class="bg-primary p-4 rounded-2xl rounded-br-sm text-white text-sm leading-relaxed shadow-md">
                                            {{ $message->content }}
                                        </div>
                                        <span class="text-[#cb909f]/60 text-[10px] pr-1">{{ $message->create_at }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                <div class="scrollBottom"></div>
            </div>
        </div>
        <!-- Sticky Footer for Actions (Instead of Input) -->
        <div
            class="bg-[#231015] border-t border-[#49222c] p-4 flex flex-col md:flex-row items-center justify-between gap-4 z-20">
            <div class="flex items-center gap-2">
                <span class="text-white text-sm font-semibold">Lần chat cuối:</span>
                <span
                    class="text-[#cb909f] text-sm">{{ $messages != null && count($messages) > 0 ? $messages[count($messages) - 1]->create_at : "Chưa có tin nhắn nào"  }}</span>
            </div>
            <div class="flex items-center gap-3 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none h-10 px-4 rounded-lg bg-red-900/30 text-white hover:bg-red-900/50 border border-red-500/30 text-sm font-bold transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[20px] text-primary">flag</span>
                    Flag Conversation
                </button>
            </div>
        </div>
    </main>
    <script defer>
        document.querySelector(".scrollBottom").scrollIntoView({ behavior: 'smooth' });
        document.querySelector(".scrollBottom").classList.remove('scrollBottom');
    </script>
@endsection

</html>