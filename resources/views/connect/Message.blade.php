<!DOCTYPE html>

<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/8.3.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                    borderRadius: { "DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

@extends('layouts.main')

@section('content')
    <div class="relative flex h-[90%] w-full flex-col group/design-root overflow-hidden">
        <main class="flex flex-1 relative  overflow-hidden">
            <!-- Conversation List Panel (Cột trái) -->
            <aside
                class="md:w-full sm:flex hidden w-[250px] max-w-sm  shrink-0 border-r border-solid border-black/10 dark:border-white/10  flex-col bg-white dark:bg-background-dark/50">
                <div class="p-4 border-b border-solid border-black/10 dark:border-white/10">
                    <h1 class="text-2xl font-bold text-[#181113] dark:text-white">Tin nhắn</h1>
                    <div class="pt-3">
                        <label class="flex flex-col min-w-40 h-12 w-full">
                            <div class="flex w-full flex-1 items-stretch rounded-full h-full">
                                <div
                                    class="text-[#8a606b] dark:text-white/50 flex border-none bg-background-light dark:bg-black/20 items-center justify-center pl-4 rounded-l-full border-r-0">
                                    <span class="material-symbols-outlined text-xl">search</span>
                                </div>
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full text-[#181113] dark:text-white/90 focus:outline-0 focus:ring-0 border-none bg-background-light dark:bg-black/20 focus:border-none h-full placeholder:text-[#8a606b] dark:placeholder:text-white/50 px-4 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal"
                                    placeholder="Tìm kiếm cuộc trò chuyện" value="" />
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto">
                    {{-- @dd($chats) --}}
                    {{-- @dd(request()->query('current_chat')) --}}
                    @if ($chats !== null)
                        @foreach ($chats as $c)
                            <a href="?chat_id={{ $c->chat_id }}">
                                <div
                                class="flex items-center gap-4 
                                {{ ( request()->query('chat_id') !==null &&  $c->chat_id === request()->query('chat_id'))  ? "bg-primary/20 dark:bg-primary/30 border-l-4 border-primary" : "bg-white dark:bg-transparent hover:bg-black/5 dark:hover:bg-white/5" }}
                                px-4 min-h-[72px] py-3 justify-between cursor-pointer ">
                                <div class="flex items-center gap-4 overflow-hidden">
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 shrink-0"
                                        data-alt="Profile picture of {{$c->user2_name}}"
                                        style='background-image: url("{{ $c->user2_image === null || $c->user2_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . $c->user2_image) }}");'>
                                    </div>
                                    <div class="flex flex-col justify-center overflow-hidden">
                                        <p class="text-[#181113] dark:text-white text-base font-bold leading-normal line-clamp-1">
                                            {{ $c->user2_name }}</p>
                                        <p
                                            class="{{ $c->user_id_send !== auth()->user()->user_id && $c->message_status === 'unseen' ? 'text-primary dark:text-primary/90' : 'text-gray-400' }} text-sm font-medium leading-normal line-clamp-1">
                                            {{ $c->content === null ? "" : $c->content }}</p>
                                    </div>
                                </div>
                                @if ($c->user_id_send !== auth()->user()->user_id && $c->message_status !== null && $c->message_status === "unseen")
                                    <div class="shrink-0 flex flex-col items-end gap-1.5">
                                        <p class="text-primary dark:text-primary/90 text-xs font-semibold leading-normal">{{ $c->message_create_at }}
                                        </p>
                                        <div class="flex size-6 items-center justify-center rounded-full bg-primary"><span
                                                class="text-xs font-bold text-white"></span></div>
                                    </div>                                    
                                @endif
                            </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </aside>
            <aside
                id="my_aside"
                class="sm:hidden transition-all absolute inset-0 z-10 flex w-full left-0 shrink-0 border-r border-solid border-black/10 dark:border-white/10  flex-col bg-white dark:bg-background-dark/50">
                <div class="p-4 border-b border-solid border-black/10 dark:border-white/10">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold text-[#181113] dark:text-white">Tin nhắn</h1>
                        <h1 class="text-primary font-bold">
                            <span id="close_aside" class="material-symbols-outlined text-2xl cursor-pointer">close</span>
                        </h1>
                    </div>
                    <div class="pt-3">
                        <label class="flex flex-col min-w-40 h-12 w-full">
                            <div class="flex w-full flex-1 items-stretch rounded-full h-full">
                                <div
                                    class="text-[#8a606b] dark:text-white/50 flex border-none bg-background-light dark:bg-black/20 items-center justify-center pl-4 rounded-l-full border-r-0">
                                    <span class="material-symbols-outlined text-xl">search</span>
                                </div>
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full text-[#181113] dark:text-white/90 focus:outline-0 focus:ring-0 border-none bg-background-light dark:bg-black/20 focus:border-none h-full placeholder:text-[#8a606b] dark:placeholder:text-white/50 px-4 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal"
                                    placeholder="Tìm kiếm cuộc trò chuyện" value="" />
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto">
                    {{-- @dd($chats) --}}
                    {{-- @dd(request()->query('current_chat')) --}}
                    @if ($chats !== null)
                        @foreach ($chats as $c)
                            <a href="?chat_id={{ $c->chat_id }}">
                                <div
                                class="flex items-center gap-4 
                                {{ ( request()->query('chat_id') !==null &&  $c->chat_id === request()->query('chat_id'))  ? "bg-primary/20 dark:bg-primary/30 border-l-4 border-primary" : "bg-white dark:bg-transparent hover:bg-black/5 dark:hover:bg-white/5" }}
                                px-4 min-h-[72px] py-3 justify-between cursor-pointer ">
                                <div class="flex items-center gap-4 overflow-hidden">
                                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 shrink-0"
                                        data-alt="Profile picture of {{$c->user2_name}}"
                                        style='background-image: url("{{ $c->user2_image === null || $c->user2_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . $c->user2_image) }}");'>
                                    </div>
                                    <div class="flex flex-col justify-center overflow-hidden">
                                        <p class="text-[#181113] dark:text-white text-base font-bold leading-normal line-clamp-1">
                                            {{ $c->user2_name }}</p>
                                        <p
                                            class="{{ $c->user_id_send !== auth()->user()->user_id && $c->message_status === 'unseen' ? 'text-primary dark:text-primary/90' : 'text-gray-400' }} text-sm font-medium leading-normal line-clamp-1">
                                            {{ $c->content === null ? "" : $c->content }}</p>
                                    </div>
                                </div>
                                @if ($c->user_id_send !== auth()->user()->user_id && $c->message_status !== null && $c->message_status === "unseen")
                                    <div class="shrink-0 flex flex-col items-end gap-1.5">
                                        <p class="text-primary dark:text-primary/90 text-xs font-semibold leading-normal">{{ $c->message_create_at }}
                                        </p>
                                        <div class="flex size-6 items-center justify-center rounded-full bg-primary"><span
                                                class="text-xs font-bold text-white"></span></div>
                                    </div>                                    
                                @endif
                            </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </aside>
            <!-- Chat Window Panel (Cột phải) -->
            @if ($current_chat !== null && request()->query('chat_id') !== null && $current_chat['chat_id'] === request()->query('chat_id'))
            @php
                $current_chat_id = request()->query('chat_id');
                // dd($chats);
                // dd($current_chat_id);
                $filtered_array = array_filter($chats ?? [], function($c) use ($current_chat_id) {
                    return $c->chat_id == $current_chat_id; // có use mới dùng trong này được !!
                });
                $current_chat_item = array_values($filtered_array);
                if ($current_chat_item) {
                    // dd($current_chat);
                    // dd($current_chat_item);
                    $current_chat['user2_id'] = $current_chat_item[0]->user2_id ?? null;
                    $current_chat['user2_image'] = $current_chat_item[0]->user2_image ?? null;
                    $current_chat['user2_name'] = $current_chat_item[0]->user2_name ?? null;
                }
                    // dd($current_chat);
            @endphp
            {{-- @dd($current_chat) --}}
            <section class="flex-1 flex flex-col bg-background-light dark:bg-background-dark relative">
                <h1 class=" absolute left-3 top-3 text-primary font-bold sm:hidden block">
                            <span id="open_aside" class="material-symbols-outlined text-2xl cursor-pointer">menu</span>
                </h1>
                <!-- Chat Header -->
                <div
                    class="shrink-0 flex items-center justify-between p-1 px-4 border-b border-solid border-black/10 dark:border-white/10">
                    <div class="flex items-center gap-4">
                        <div class="bg-center sm:ml-0 ml-8 bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12"
                            data-alt="Profile picture of Ngọc Anh"
                            style='background-image: url("{{ $current_chat['user2_image'] === null || $current_chat['user2_image'] === "" ? asset('upload/Default_profile.png') : asset('storage/' . $current_chat['user2_image']) }}");'>
                        </div>
                        <div>
                            <p class="text-[#181113] dark:text-white text-lg font-bold">{{ $current_chat['user2_name'] }}</p>
                            <p class="text-green-600 dark:text-green-400 text-sm font-medium">Đang hoạt động</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 relative">
                        {{-- @dd($current_chat) --}}
                        <a href="{{ route('user.detail',["user_id"=>$current_chat['user2_id']]) }}">
                            <button
                            class="flex items-center justify-center size-10 rounded-full hover:bg-black/5 dark:hover:bg-white/10 text-[#181113] dark:text-white/90">
                                <span class="material-symbols-outlined text-2xl">person</span>
                            </button>
                        </a>
                        <button
                            id="threeDots"
                            class="flex relative items-center justify-center size-10 rounded-full hover:bg-black/5 dark:hover:bg-white/10 text-[#181113] dark:text-white/90">
                            <span class="material-symbols-outlined text-2xl">more_vert</span>
                        </button>
                        <div id="reportContainer" class="bg-white p-1 hidden rounded-[10px] absolute -bottom-14 right-2 transition-all">
                            <button
                                type="button"
                                id="reportBtn1"
                                class="items-center inline-flex gap-2 px-4 text-[12px] py-2 rounded-[10px] bg-red-600 hover:bg-red-700 text-white font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-red-300"
                                aria-label="Report this user"
                                >
                                <span class="material-symbols-outlined text-2xl">flag</span>
                                Report
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Message History Area -->
                <div id="chat_container" class="flex-1 overflow-y-auto p-6 space-y-6">
                    <div class="text-center my-4">
                        <span
                            class="text-xs text-[#8a606b] dark:text-white/60 bg-white dark:bg-black/20 px-3 py-1 rounded-full">Hôm
                            nay</span>
                    </div>
                    @foreach ($current_chat as $key=>$c)
                        @if(is_numeric($key)===true)

                        <div class="flex items-start gap-3 {{ $c['user_id'] === auth()->user()->user_id ? 'flex-row-reverse' : '' }}">
                            @if ($c['user_id'] !== auth()->user()->user_id)
                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 shrink-0"
                                    data-alt="Profile picture of {{ $current_chat['user2_name'] }}"
                                    style='background-image: url("{{ $current_chat['user2_image'] === null || $current_chat['user2_image'] === "" ? asset('upload/Default_profile.png') : asset('storage/' . $current_chat['user2_image']) }}");'>
                                </div>
                            @endif
                            <div class="flex flex-col items-start max-w-lg">
                                <div class="{{ $c['user_id'] === auth()->user()->user_id ? 'bg-primary text-white' :'bg-white dark:bg-background-dark/80'}} rounded-r-lg rounded-bl-lg p-3">
                                    <p class="text-sm leading-relaxed {{ $c['user_id'] === auth()->user()->user_id ? 'text-white' : 'text-[#181113]' }}  dark:text-white/90">{{ $c['content'] }}</p>
                                </div>
                                <span class="text-xs {{$c['user_id'] === auth()->user()->user_id ?'self-end':'' }} text-[#8a606b] dark:text-white/60 mt-1.5">{{ explode(' ',$c['create_at'])[1] }}</span>
                                @if ($c['user_id'] === auth()->user()->user_id && $c['status'] === 'seen')
                                    <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5 flex items-center self-end gap-1">Đã
                                xem <span class="material-symbols-outlined text-base text-primary">done_all</span></span>
                                @endif
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @if ($current_chat!==null)
                        <div id="scrollBottom"></div>
                    @endif
                </div>

                <!-- Message Input Form -->
                <form id="input_form"
                    class="shrink-0 p-4 bg-white dark:bg-background-dark/50 border-t border-solid border-black/10 dark:border-white/10">
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center justify-center size-10 rounded-full hover:bg-primary/20 dark:hover:bg-primary/30 text-primary flex-shrink-0">
                            <span class="material-symbols-outlined text-2xl">add_circle</span>
                        </button>
                        <div class="relative flex-1">
                        <input
                            id="input_message"
                                class="form-input w-full h-12 px-4 pr-24 rounded-full bg-background-light dark:bg-black/20 border-none focus:ring-2 focus:ring-primary text-sm text-[#181113] dark:text-white/90 placeholder:text-[#8a606b] dark:placeholder:text-white/50"
                                placeholder="Nhập tin nhắn của bạn..." type="text" />
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1">
                                <button
                                    class="flex items-center justify-center size-9 rounded-full hover:bg-black/10 dark:hover:bg-white/20 text-[#181113] dark:text-white/90">
                                    <span class="material-symbols-outlined text-2xl">sentiment_satisfied</span>
                                </button>
                                <button
                                    class="flex items-center justify-center size-9 rounded-full hover:bg-black/10 dark:hover:bg-white/20 text-[#181113] dark:text-white/90">
                                    <span class="material-symbols-outlined text-2xl">gif_box</span>
                                </button>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="flex items-center justify-center size-12 rounded-full bg-primary hover:bg-primary/90 text-white shrink-0">
                            <span class="material-symbols-outlined text-2xl">send</span>
                        </button>
                    </div>
                </form>
            </section>
            @else
            <section class="flex-1 flex flex-col bg-background-light dark:bg-background-dark">
            </section>
            @endif
        </main>
    </div>
    {{-- Report modal --}}
    @if ($current_chat !== null)
        <div id="reportModal" 
     class="fixed z-[99] inset-0 bg-black bg-opacity-80 hidden items-center justify-center">
    
    <!-- Modal Box -->
            <form action="{{ route('report.post') }}" id="reportForm" class="bg-white sm:w-[70%] w-96 rounded-xl shadow-lg p-6 flex md:flex-row flex-col gap-2" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex-1">
                    <h2 class="text-xl dark:text-black font-bold mb-4">Report User</h2>
    
                    <!-- Fields -->
                    <div class="space-y-3">
                        <div>
                            <label class="dark:text-black font-semibold">Report Name</label>
                            <input id="report_name" 
                                class="w-full border rounded p-2 dark:bg-background-dark" 
                                name="report_name"
                                type="text" placeholder="Quấy rối, Spam, etc.">
                                @error('report_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                        </div>
    
                        <div>
                            <label class="dark:text-black font-semibold">User ID</label>
                            <input id="user_id" 
                            name="user_been_reported_id"
                                class="w-full dark:bg-background-dark border rounded p-2 bg-gray-100" 
                                type="text" readonly 
                                value="{{ $current_chat['user2_id'] }}"
                                >
                                @error('user_been_reported_id')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                        </div>
    
                        <div>
                            <label class="dark:text-black font-semibold">User Name</label>
                            <input id="user_name" 
                            name="user_been_reported_name"
                                class="w-full dark:bg-background-dark border rounded p-2 bg-gray-100" 
                                type="text" readonly
                                value="{{ $current_chat['user2_name'] }}"
                                >
                                @error('user_been_reported_name')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                        </div>
    
                        <div>
                            <label class="dark:text-black font-semibold">Content</label>
                            <textarea id="content" 
                                name="content"
                                    class="w-full dark:bg-background-dark border rounded p-2 h-20"></textarea>
                            @error('content')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div>
                            <label class="dark:text-black font-semibold">Created At</label>
                            <input id="create_at" 
                            name="create_at"
                                class="w-full dark:bg-background-dark border rounded p-2 bg-gray-100" 
                                type="text" readonly
                                value="{{ now() }}"
                                >
                            @error('create_at')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
    
                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 mt-5">
                        <button 
                        type="button"
                            onclick="closeReportModal()" 
                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                            Cancel
                        </button>
    
                        <button 
                        type="submit"
                            {{-- onclick="submitReport()"  --}}
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Report
                        </button>
                    </div>
                </div>
                <div class="flex-1">
                        <h1 class="font-semibold dark:text-black">Hình report</h1>

                        <label 
                        id="report_image_display"
                            for="report_image"
                            class="w-full md:h-[95%] h-32 border-2 border-dashed border-gray-300 rounded-xl
                                flex flex-col items-center justify-center
                                cursor-pointer hover:border-red-500 hover:bg-red-50
                                transition"
                        >
                            <span class="icon_upload material-symbols-outlined text-4xl text-gray-400">
                                upload
                            </span>
                            <span class="icon_upload text-sm text-gray-500 mt-2">
                                Click to upload image
                            </span>

                            <input id="report_image" name="report_image" type="file" hidden accept=".png, .jpg, .jpeg, .webp">
                        </label>
                    </div>
            </form>
    </div>
    @endif
    <script defer>
        let theme = JSON.parse(localStorage.getItem('theme'));
        if (theme === null) {
            localStorage.setItem('theme', JSON.stringify('light'));
        } else if (theme !== null && theme === "light") {
        } else if (theme !== null && theme === 'dark') {
            document.querySelector('html').classList.add('dark');
        }
        // scroll to view here
        @if ($current_chat!==null)
            document.getElementById("scrollBottom").scrollIntoView({ behavior: "smooth" });
            const chat_container = document.getElementById("chat_container");
            chat_container.lastElementChild.remove();
            const input_form = document.querySelector("#input_form");
            input_form.addEventListener('submit',async function sendMessage(e) {
                e.preventDefault();
                const msg = document.getElementById("input_message").value;            
                if (!msg.trim()) return;
                await axios.post('/connect/message', {
                    chat_id: chatId,
                    content: msg
                });
                addMessage(userId,msg,'{{ now() }}'.split(' ')[1]);
                document.getElementById("input_message").value = "";
            })
            // report button here
                const reportContainer = document.querySelector("#reportContainer");
                const reportBtn1 = document.querySelector("#reportBtn1");
                const threeDots = document.querySelector("#threeDots");
                const reportModal = document.querySelector("#reportModal");
                threeDots.addEventListener('click',()=>{
                    // console.log(reportContainer);
                    reportContainer.classList.toggle("hidden");
                })
                reportBtn1.addEventListener('click',()=>{
                    reportModal.classList.add('flex')
                    reportModal.classList.remove('hidden');
                });
                const closeReportModal = ()=>{
                    reportModal.classList.add('hidden');
                    reportModal.classList.remove('flex');
                }
                // const submitReport = ()=>{
                //     document.querySelector("#reportForm").submit();
                // }
                const report_image = document.querySelector("#report_image");
                const report_image_display = document.querySelector("#report_image_display");
                const icon_upload = document.querySelectorAll(".icon_upload");
                report_image.addEventListener('change',e=>{
                    console.log(e.target.files);
                    const file = e.target.files;
                    const imageUrl = URL.createObjectURL(file[0]);
                    report_image_display.style.backgroundImage = `url('${imageUrl}')`;
                    report_image_display.style.backgroundSize = `cover`;
                    icon_upload.forEach((e)=>{
                        e.style.display = 'none';
                    })
                });
                // paste image
                document.querySelector("html").addEventListener("paste", (e) => {
                    const items = e.clipboardData.items;
                    // console.log(e);
                    for (const item of items) {
                        if (item.type.startsWith("image/")) {
                        const file = item.getAsFile();
                        const imageUrl = URL.createObjectURL(file);
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        report_image.files=dataTransfer.files;
                        report_image_display.style.backgroundImage = `url('${imageUrl}')`;
                        report_image_display.style.backgroundSize = `cover`;
                        icon_upload.forEach((e)=>{
                        e.style.display = 'none';
                            })
                        }
                    }
                });
        @endif
        const open_aside = document.querySelector("#open_aside");
        const close_aside = document.querySelector("#close_aside");
        const my_aside = document.querySelector("#my_aside");
        const chatId = document.location.search.slice(9);
        const userId = '{{ auth()->user()->user_id }}';
        console.log(chatId);
        open_aside.addEventListener('click',()=>{
            console.log('open');
            console.log(my_aside);
            my_aside.classList.add('left-0');
            my_aside.classList.remove("-left-full");
        });
        close_aside.addEventListener('click',(e)=>{
            console.log(e);
            my_aside.classList.remove('left-0');
            my_aside.classList.add("-left-full");

        });
        // 1. Cấu hình Pusher

        const pusher = new Pusher("0055932795ba120fba8b", {
            cluster: "ap1",
        });
        // 2. Subscribe to private chat channel
        const channel = pusher.subscribe("chat." + chatId);
        //Nhận dữ liệu từ bên kia gửi
        channel.bind('my-event',(data)=>{
            if (data.user_id == userId) {
                return;
            }
            console.log("other sent: ",data.create_at.split('T')[1].slice(0,8));
            addMessage(data.user_id,data.content,data.create_at.split('T')[1].slice(0,8));
        })

        function addMessage(user_id,text,time) {
            @if($current_chat!==null)
                const isMine = userId === user_id;
                
                const profileUrl = "{{  $current_chat['user2_image'] === null || $current_chat['user2_image'] === '' ? asset('upload/Default_profile.png') : asset('storage/' . $current_chat['user2_image']) }}";
                let html = `
                    <div class="scrollBottom flex items-start gap-3 ${isMine ? 'flex-row-reverse' : ''}">
                        ${!isMine ? `
                            <div class=" bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 shrink-0"
                                style="background-image: url(${profileUrl})">
                            </div>
                        ` : ''}
                        
                        <div class="flex flex-col items-start max-w-lg">
                            <div class="${isMine ? 'bg-primary text-white' : 'bg-white dark:bg-background-dark/80'} rounded-r-lg rounded-bl-lg p-3">
                                <p class="text-sm leading-relaxed ${isMine ? 'text-white' : 'text-[#181113]'} dark:text-white/90">
                                    ${text}
                                </p>
                            </div>

                            <span class="text-xs ${isMine ? 'self-end':''} text-[#8a606b] dark:text-white/60 mt-1.5">
                                ${time}
                            </span>
                        </div>
                    </div>
                `;
                            // FIXME:
                            // ${isMine && seen === 'seen' ? `
                            //     <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5 flex items-center self-end gap-1">
                            //         Đã xem 
                            //         <span class="material-symbols-outlined text-base text-primary">done_all</span>
                            //     </span>
                            // ` : ''}
                chat_container.innerHTML += html;
                document.querySelector(".scrollBottom").scrollIntoView({behavior:'smooth'});
                document.querySelector(".scrollBottom").classList.remove('scrollBottom');
            @endif
        }
        
        
    </script>
@endsection

</html>