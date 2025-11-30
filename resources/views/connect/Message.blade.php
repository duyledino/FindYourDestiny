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

<body class="bg-background-light dark:bg-background-dark font-display text-[#181113] dark:text-white/90">
    <div class="relative flex h-screen w-full flex-col group/design-root overflow-hidden">
<header
  class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm border-b border-primary/20">
  <nav class="container mx-auto flex items-center justify-between whitespace-nowrap px-4 sm:px-6 lg:px-8 py-3">
    <div class="flex items-center gap-4 text-gray-900 dark:text-white">
      <div class="size-8 text-primary">
        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
            fill="currentColor"></path>
        </svg>
      </div>
      <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">LuvHub</h2>
    </div>

    <div class="hidden md:flex items-center gap-9">
      <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Khám Phá</a>
      <a class="text-primary text-sm font-bold leading-normal border-b-2 border-primary pb-1" href="#">Tin Nhắn</a>
      <a class="text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Hồ Sơ</a>
    </div>


                <div class="flex items-center gap-2">
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
                </div>
            </nav>

        </header>
        <main class="flex flex-1 overflow-hidden">
            <!-- Conversation List Panel (Cột trái) -->
            <aside
                class="w-full max-w-sm flex-shrink-0 border-r border-solid border-black/10 dark:border-white/10 flex flex-col bg-white dark:bg-background-dark/50">
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
                    <div
                        class="flex items-center gap-4 bg-primary/20 dark:bg-primary/30 px-4 min-h-[72px] py-3 justify-between cursor-pointer border-l-4 border-primary">
                        <div class="flex items-center gap-4 overflow-hidden">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 flex-shrink-0"
                                data-alt="Profile picture of Ngọc Anh"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZm4fUaCGk_piZxCQG9jee6liV1vUn9IkpwhTQsWloJnliBt452mOOEj8CsnnErUHLVB4g_49TA2HIIsv172gKQNyAlR313P0bPQvHsX6ho0qFMjHSUiHjmmDSJOvrr8Fquj6wng4Mfn_5OznIa22isLAA1oFAmoapG-9Hagw8SiBPPec-v3dfCBV6bJF8WiexFrhAPMvfhNIcpVzlGj-qhz-CfPnoUZ9FGbYfoiFpyZ_c6lB1ANYO7sCJO2ZmBvy650CeW6q3ZDV0");'>
                            </div>
                            <div class="flex flex-col justify-center overflow-hidden">
                                <p
                                    class="text-[#181113] dark:text-white text-base font-bold leading-normal line-clamp-1">
                                    Ngọc Anh</p>
                                <p
                                    class="text-primary dark:text-primary/90 text-sm font-medium leading-normal line-clamp-1">
                                    Cho mình cái địa chỉ!</p>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col items-end gap-1.5">
                            <p class="text-primary dark:text-primary/90 text-xs font-semibold leading-normal">10:42 AM
                            </p>
                            <div class="flex size-6 items-center justify-center rounded-full bg-primary"><span
                                    class="text-xs font-bold text-white">1</span></div>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-transparent hover:bg-black/5 dark:hover:bg-white/5 px-4 min-h-[72px] py-3 justify-between cursor-pointer border-l-4 border-transparent">
                        <div class="flex items-center gap-4 overflow-hidden">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 flex-shrink-0"
                                data-alt="Profile picture of Minh Tuấn"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBuxRdbFmcLrrWG2rIbGk1z9u62olJgHlTA9cGFZDqMwyicOHNpXKUoDJkaE_ToXXCJvUWWUnjB0vm09AQdok0V9dH3K4M71ltKJveFSBPGkINJxEnrBpNZGUjSWn0fEI5jp9dM3MmQKc2bs_iocsXHB3RB8DoBkjVkJsYXOL3u2Pfyq7PFuEv8uYdj_7QlcYVSRpqBhvihzn4cLfQgF-m4yfaJmqwNyspU7SJzKms7DFny5Q8L1JImEx5QS5JHgcnmCqpRUXogiIsE");'>
                            </div>
                            <div class="flex flex-col justify-center overflow-hidden">
                                <p
                                    class="text-[#181113] dark:text-white text-base font-medium leading-normal line-clamp-1">
                                    Minh Tuấn</p>
                                <p
                                    class="text-[#8a606b] dark:text-white/60 text-sm font-normal leading-normal line-clamp-1">
                                    Bạn có rảnh vào cuối tuần này không?</p>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col items-end gap-1.5">
                            <p class="text-[#8a606b] dark:text-white/60 text-xs font-normal leading-normal">9:15 AM</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-transparent hover:bg-black/5 dark:hover:bg-white/5 px-4 min-h-[72px] py-3 justify-between cursor-pointer border-l-4 border-transparent">
                        <div class="flex items-center gap-4 overflow-hidden">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 flex-shrink-0"
                                data-alt="Profile picture of Hà Trang"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCsxMKEdjlAeLPUeymxRBumrUgmmXNdhT_hLvj711j1e3F-nMGmHGF6AKhnoWoRV47lyc6KUrBM9ZUJaBVOpahSOhlWrTzkWcBEO6UDnShByaUrhla7YQLpamLBnjbG5M5PkjnDSHN9R28cTOymGiE2RrHqxDf_ez0lpkJn0PXtZ57xdzTkhp3lVlgT-ZJBAnMQI-ER80SyRUBADj8lKMXrJw3wv9SVEHTH3Fm5rNv_WWeDcX8LT2Y-d_pbWZ1pDFoqfcjCWkAgengz");'>
                            </div>
                            <div class="flex flex-col justify-center overflow-hidden">
                                <p
                                    class="text-[#181113] dark:text-white text-base font-medium leading-normal line-clamp-1">
                                    Hà Trang</p>
                                <p
                                    class="text-[#8a606b] dark:text-white/60 text-sm font-normal leading-normal line-clamp-1">
                                    Mình cũng thích đọc sách lắm.</p>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col items-end gap-1.5">
                            <p class="text-[#8a606b] dark:text-white/60 text-xs font-normal leading-normal">Hôm qua</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-white dark:bg-transparent hover:bg-black/5 dark:hover:bg-white/5 px-4 min-h-[72px] py-3 justify-between cursor-pointer border-l-4 border-transparent">
                        <div class="flex items-center gap-4 overflow-hidden">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-14 w-14 flex-shrink-0"
                                data-alt="Profile picture of Anh Khôi"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB96cbUslHN2soyxUpInQ4XJrBhqZUBqFipg2i-WPjRbOKqdOWez8JoI1izMhHZY3GU1lM6YxHUTYfybXsOy7wh9cA1f7vuNwmfflLM0f-l1FyKlZ_3Duo80_8-77FS0UcDQMj-k0bw4oS4-4ngnui5x3MdxiCiPJNkl9LLHKx2fiibDSBdOGFXHatDr_Q--64CfW4NuoSPUtkgS2M8l1F3hDjCXz2CSuSlpZB8jMkHweTNSGRnlCpu_EPhhExx-NjJl6Tn52RQFMYb");'>
                            </div>
                            <div class="flex flex-col justify-center overflow-hidden">
                                <p
                                    class="text-[#181113] dark:text-white text-base font-medium leading-normal line-clamp-1">
                                    Anh Khôi</p>
                                <p
                                    class="text-[#8a606b] dark:text-white/60 text-sm font-normal leading-normal line-clamp-1">
                                    Tuyệt vời! Hẹn gặp bạn nhé.</p>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col items-end gap-1.5">
                            <p class="text-[#8a606b] dark:text-white/60 text-xs font-normal leading-normal">Thứ 3</p>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Chat Window Panel (Cột phải) -->
            <section class="flex-1 flex flex-col bg-background-light dark:bg-background-dark">
                <!-- Chat Header -->
                <div
                    class="flex-shrink-0 flex items-center justify-between p-4 border-b border-solid border-black/10 dark:border-white/10">
                    <div class="flex items-center gap-4">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12"
                            data-alt="Profile picture of Ngọc Anh"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZm4fUaCGk_piZxCQG9jee6liV1vUn9IkpwhTQsWloJnliBt452mOOEj8CsnnErUHLVB4g_49TA2HIIsv172gKQNyAlR313P0bPQvHsX6ho0qFMjHSUiHjmmDSJOvrr8Fquj6wng4Mfn_5OznIa22isLAA1oFAmoapG-9Hagw8SiBPPec-v3dfCBV6bJF8WiexFrhAPMvfhNIcpVzlGj-qhz-CfPnoUZ9FGbYfoiFpyZ_c6lB1ANYO7sCJO2ZmBvy650CeW6q3ZDV0");'>
                        </div>
                        <div>
                            <p class="text-[#181113] dark:text-white text-lg font-bold">Ngọc Anh</p>
                            <p class="text-green-600 dark:text-green-400 text-sm font-medium">Đang hoạt động</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            class="flex items-center justify-center size-10 rounded-full hover:bg-black/5 dark:hover:bg-white/10 text-[#181113] dark:text-white/90">
                            <span class="material-symbols-outlined text-2xl">person</span>
                        </button>
                        <button
                            class="flex items-center justify-center size-10 rounded-full hover:bg-black/5 dark:hover:bg-white/10 text-[#181113] dark:text-white/90">
                            <span class="material-symbols-outlined text-2xl">more_vert</span>
                        </button>
                    </div>
                </div>
                <!-- Message History Area -->
                <div class="flex-1 overflow-y-auto p-6 space-y-6">
                    <div class="text-center my-4">
                        <span
                            class="text-xs text-[#8a606b] dark:text-white/60 bg-white dark:bg-black/20 px-3 py-1 rounded-full">Hôm
                            nay</span>
                    </div>
                    <!-- Message from other user -->
                    <div class="flex items-start gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex-shrink-0"
                            data-alt="Profile picture of Ngọc Anh"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZm4fUaCGk_piZxCQG9jee6liV1vUn9IkpwhTQsWloJnliBt452mOOEj8CsnnErUHLVB4g_49TA2HIIsv172gKQNyAlR313P0bPQvHsX6ho0qFMjHSUiHjmmDSJOvrr8Fquj6wng4Mfn_5OznIa22isLAA1oFAmoapG-9Hagw8SiBPPec-v3dfCBV6bJF8WiexFrhAPMvfhNIcpVzlGj-qhz-CfPnoUZ9FGbYfoiFpyZ_c6lB1ANYO7sCJO2ZmBvy650CeW6q3ZDV0");'>
                        </div>
                        <div class="flex flex-col items-start max-w-lg">
                            <div class="bg-white dark:bg-background-dark/80 rounded-r-lg rounded-bl-lg p-3">
                                <p class="text-sm leading-relaxed text-[#181113] dark:text-white/90">Chào bạn, mình thấy
                                    hồ sơ của bạn rất thú vị. Rất vui được làm quen!</p>
                            </div>
                            <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5">10:40 AM</span>
                        </div>
                    </div>
                    <!-- Message from current user -->
                    <div class="flex items-start gap-3 flex-row-reverse">
                        <div class="flex flex-col items-end max-w-lg">
                            <div class="bg-primary text-white rounded-l-lg rounded-br-lg p-3">
                                <p class="text-sm leading-relaxed">Chào Ngọc Anh! Mình cũng rất vui khi được bạn chú ý.
                                    Bạn có thích đi xem phim không?</p>
                            </div>
                            <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5 flex items-center gap-1">Đã
                                xem <span
                                    class="material-symbols-outlined text-base text-primary">done_all</span></span>
                        </div>
                    </div>
                    <!-- Message from other user -->
                    <div class="flex items-start gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex-shrink-0"
                            data-alt="Profile picture of Ngọc Anh"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZm4fUaCGk_piZxCQG9jee6liV1vUn9IkpwhTQsWloJnliBt452mOOEj8CsnnErUHLVB4g_49TA2HIIsv172gKQNyAlR313P0bPQvHsX6ho0qFMjHSUiHjmmDSJOvrr8Fquj6wng4Mfn_5OznIa22isLAA1oFAmoapG-9Hagw8SiBPPec-v3dfCBV6bJF8WiexFrhAPMvfhNIcpVzlGj-qhz-CfPnoUZ9FGbYfoiFpyZ_c6lB1ANYO7sCJO2ZmBvy650CeW6q3ZDV0");'>
                        </div>
                        <div class="flex flex-col items-start max-w-lg">
                            <div class="bg-white dark:bg-background-dark/80 rounded-r-lg rounded-bl-lg p-3">
                                <p class="text-sm leading-relaxed text-[#181113] dark:text-white/90">Ồ, mình rất thích
                                    xem phim, đặc biệt là phim hài lãng mạn. :)</p>
                            </div>
                            <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5">10:41 AM</span>
                        </div>
                    </div>
                    <!-- Message from current user -->
                    <div class="flex items-start gap-3 flex-row-reverse">
                        <div class="flex flex-col items-end max-w-lg">
                            <div class="bg-primary text-white rounded-l-lg rounded-br-lg p-3">
                                <p class="text-sm leading-relaxed">Vậy cuối tuần này có một phim mới ra rạp hay lắm, bạn
                                    có muốn đi xem cùng mình không?</p>
                            </div>
                            <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5 flex items-center gap-1">Đã
                                xem <span
                                    class="material-symbols-outlined text-base text-primary">done_all</span></span>
                        </div>
                    </div>
                    <!-- Message from other user (last message) -->
                    <div class="flex items-start gap-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex-shrink-0"
                            data-alt="Profile picture of Ngọc Anh"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCZm4fUaCGk_piZxCQG9jee6liV1vUn9IkpwhTQsWloJnliBt452mOOEj8CsnnErUHLVB4g_49TA2HIIsv172gKQNyAlR313P0bPQvHsX6ho0qFMjHSUiHjmmDSJOvrr8Fquj6wng4Mfn_5OznIa22isLAA1oFAmoapG-9Hagw8SiBPPec-v3dfCBV6bJF8WiexFrhAPMvfhNIcpVzlGj-qhz-CfPnoUZ9FGbYfoiFpyZ_c6lB1ANYO7sCJO2ZmBvy650CeW6q3ZDV0");'>
                        </div>
                        <div class="flex flex-col items-start max-w-lg">
                            <div class="bg-white dark:bg-background-dark/80 rounded-r-lg rounded-bl-lg p-3">
                                <p class="text-sm leading-relaxed text-[#181113] dark:text-white/90">Cho mình cái địa chỉ!</p>
                            </div>
                            <span class="text-xs text-[#8a606b] dark:text-white/60 mt-1.5">10:42 AM</span>
                        </div>
                    </div>
                </div>
                <!-- Message Input Form -->
                <div
                    class="flex-shrink-0 p-4 bg-white dark:bg-background-dark/50 border-t border-solid border-black/10 dark:border-white/10">
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center justify-center size-10 rounded-full hover:bg-primary/20 dark:hover:bg-primary/30 text-primary flex-shrink-0">
                            <span class="material-symbols-outlined text-2xl">add_circle</span>
                        </button>
                        <div class="relative flex-1">
                            <input
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
                            class="flex items-center justify-center size-12 rounded-full bg-primary hover:bg-primary/90 text-white flex-shrink-0">
                            <span class="material-symbols-outlined text-2xl">send</span>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>