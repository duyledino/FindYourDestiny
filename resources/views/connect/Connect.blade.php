<!DOCTYPE html>

<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
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
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }

        :root {
            --radio-dot-svg: url('data:image/svg+xml,%3csvg viewBox=%270 0 16 16%27 fill=%27%23f42559%27 xmlns=%27http://www.w3.org/2000/svg%27%3e%3ccircle cx=%278%27 cy=%278%27 r=%274%27/%3e%3c/svg%3e');
        }
    </style>
</head>

@extends('layouts.main')

@section('content')
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">


            <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Filter Sidebar -->
                    <aside class="w-full lg:w-1/3 lg:max-w-xs shrink-0">
                        <div
                            class="sticky top-28 flex flex-col gap-6 bg-white dark:bg-background-dark/50 p-6 rounded-lg border border-primary/20 dark:border-primary/30">
                            <h3 class="text-zinc-900 dark:text-white text-xl font-bold">Bộ lọc</h3>
                            <!-- Age Slider -->
                            <div class="@container">
                                <div class="relative flex w-full flex-col items-start justify-between gap-3">
                                    <p
                                        class="text-zinc-900 dark:text-white text-base font-medium leading-normal w-full shrink-[3]">
                                        Độ tuổi</p>
                                    <div class="flex h-[38px] w-full pt-1.5">
                                        <div class="flex h-1.5 w-full rounded-full bg-primary/20 pl-[20%] pr-[35%]">
                                            <div class="relative">
                                                <div class="absolute -left-3 -top-2 flex flex-col items-center gap-1">
                                                    <div
                                                        class="size-5 rounded-full bg-primary border-2 border-white dark:border-background-dark">
                                                    </div>
                                                    <p
                                                        class="text-zinc-900 dark:text-white text-sm font-normal leading-normal">
                                                        22</p>
                                                </div>
                                            </div>
                                            <div class="h-1.5 flex-1 rounded-full bg-primary"></div>
                                            <div class="relative">
                                                <div class="absolute -left-3 -top-2 flex flex-col items-center gap-1">
                                                    <div
                                                        class="size-5 rounded-full bg-primary border-2 border-white dark:border-background-dark">
                                                    </div>
                                                    <p
                                                        class="text-zinc-900 dark:text-white text-sm font-normal leading-normal">
                                                        35</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Distance Slider -->
                            <div class="@container">
                                <div
                                    class="relative flex w-full flex-col items-start justify-between gap-3 @[480px]:items-center">
                                    <div class="flex w-full shrink-[3] items-center justify-between">
                                        <p class="text-zinc-900 dark:text-white text-base font-medium leading-normal">
                                            Khoảng cách (km)</p>
                                        <p class="text-zinc-900 dark:text-white text-sm font-normal leading-normal">50
                                        </p>
                                    </div>
                                    <div class="flex h-4 w-full items-center gap-4">
                                        <div class="flex h-1.5 flex-1 rounded-full bg-primary/20">
                                            <div class="h-full w-[50%] rounded-full bg-primary"></div>
                                            <div class="relative">
                                                <div
                                                    class="absolute -left-2.5 -top-1.5 size-5 rounded-full bg-primary border-2 border-white dark:border-background-dark">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Gender Radio -->
                            <div class="flex flex-col gap-3">
                                <p class="text-zinc-900 dark:text-white text-base font-medium leading-normal">Hiển thị
                                </p>
                                <div class="flex flex-col gap-2">
                                    <label
                                        class="flex items-center gap-3 rounded p-3 cursor-pointer hover:bg-primary/10 transition-colors">
                                        <input
                                            class="h-5 w-5 border-2 border-primary/40 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0"
                                            name="gender-filter" type="radio" />
                                        <p class="text-zinc-900 dark:text-white text-sm font-medium leading-normal">Nam
                                        </p>
                                    </label>
                                    <label
                                        class="flex items-center gap-3 rounded p-3 cursor-pointer hover:bg-primary/10 transition-colors">
                                        <input
                                            class="h-5 w-5 border-2 border-primary/40 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0"
                                            name="gender-filter" type="radio" />
                                        <p class="text-zinc-900 dark:text-white text-sm font-medium leading-normal">Nữ
                                        </p>
                                    </label>
                                    <label
                                        class="flex items-center gap-3 rounded p-3 cursor-pointer hover:bg-primary/10 transition-colors">
                                        <input checked=""
                                            class="h-5 w-5 border-2 border-primary/40 bg-transparent text-transparent checked:border-primary checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0"
                                            name="gender-filter" type="radio" />
                                        <p class="text-zinc-900 dark:text-white text-sm font-medium leading-normal">Tất
                                            cả</p>
                                    </label>
                                </div>
                            </div>
                            <!-- Interests Input -->
                            <div class="flex flex-col gap-3">
                                <label class="text-zinc-900 dark:text-white text-base font-medium leading-normal">Sở
                                    thích</label>
                                <div class="relative">
                                    <input
                                        class="w-full rounded border border-primary/40 bg-transparent px-4 py-2 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-primary focus:ring-primary/50"
                                        placeholder="Nhập sở thích, ví dụ: Âm nhạc" type="text" />
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="flex items-center gap-1.5 rounded-full bg-primary/20 px-3 py-1 text-sm font-medium text-primary">
                                        Đi du lịch
                                        <button class="text-primary/70 hover:text-primary"><span
                                                class="material-symbols-outlined !text-sm">close</span></button>
                                    </span>
                                    <span
                                        class="flex items-center gap-1.5 rounded-full bg-primary/20 px-3 py-1 text-sm font-medium text-primary">
                                        Chụp ảnh
                                        <button class="text-primary/70 hover:text-primary"><span
                                                class="material-symbols-outlined !text-sm">close</span></button>
                                    </span>
                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-3 pt-4 border-t border-primary/20 dark:border-primary/30">
                                <button
                                    class="w-full rounded-full bg-primary px-5 py-2.5 text-center text-sm font-bold text-white shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50">Áp
                                    dụng bộ lọc</button>
                                <button
                                    class="w-full rounded-full bg-primary/20 px-5 py-2.5 text-center text-sm font-bold text-primary hover:bg-primary/30 focus:outline-none focus:ring-2 focus:ring-primary/50">Đặt
                                    lại</button>
                            </div>
                        </div>
                    </aside>
                    <!-- Profile Grid Area -->
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-4 mb-6">
                            <div class="flex min-w-72 flex-col gap-2">
                                <p
                                    class="text-zinc-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                                    Khám phá</p>
                                <p class="text-zinc-500 dark:text-zinc-400 text-base font-normal leading-normal">Tìm
                                    kiếm người phù hợp với bạn</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                            <!-- Profile Card 1 -->
                            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                                <img class="h-full w-full object-cover aspect-[3/4] transition-transform duration-300 group-hover:scale-105"
                                    data-alt="Profile picture of an attractive woman"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxjr-_Dvkw9RPpt9IdWzEViNix55m_eWAbDNMIF3ouxaHmU8zR-4NCtcXIdKkOXbEqof1tZUuqeSduPcsWBjPezpyGTUiGvY5RQlRNwlUFnzUUfhLQGQjHTwE2-E-fynpECL4zLpXVGDNevO5QmJYE3e-Bpi8iKpkv0KZmwEMk5zTriITQAzct3-pH8Oe7_A8nNYhgBGgl7MwpPxrrlZhabTGvVgj6gvy4KYZaLW3eMvK0G1qrHCU8oVCJ-LK8J4CC752YVeD3URhd" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 w-full p-4">
                                    <h4 class="text-white text-xl font-bold">An Chi, 24</h4>
                                    <p class="text-white/80 text-sm">Hà Nội, Việt Nam</p>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Âm
                                            nhạc</span>
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Đi du
                                            lịch</span>
                                    </div>
                                </div>
                                <div
                                    class="absolute inset-0 flex items-center justify-center gap-4 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-red-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">favorite</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-zinc-600 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">close</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-blue-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">send</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Profile Card 2 -->
                            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                                <img class="h-full w-full object-cover aspect-[3/4] transition-transform duration-300 group-hover:scale-105"
                                    data-alt="Profile picture of a handsome man"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA46ZHc0VUShc0pY8c4MWSl__Atsx9vMj2iOskrV2zgzb9Bdw5bd2dsOiPGtE5PjsZ_M7DJgw6GRnJY9QT6IE8RPfuIh2JVIpfH4X9C-HrZ2mthWOhZfcG5bzK8MkJBqgxZZi7SifM9xXC2Ji2KAEAGNdadlUnTJ9vYuSu1WTbcmCNFuWhrd2F8K1FbY6vKJ95ZZSfZOCW0OLwCjUQdF0IOisM85b7k0v7voou4tam7XCtlfy_CW4sWn_KuqbvOJ1u29ldvEgR5W6NN" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 w-full p-4">
                                    <h4 class="text-white text-xl font-bold">Minh Quân, 27</h4>
                                    <p class="text-white/80 text-sm">TP. Hồ Chí Minh, Việt Nam</p>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Thể
                                            thao</span>
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Chụp
                                            ảnh</span>
                                    </div>
                                </div>
                                <div
                                    class="absolute inset-0 flex items-center justify-center gap-4 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-red-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">favorite</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-zinc-600 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">close</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-blue-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">send</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Profile Card 3 -->
                            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                                <img class="h-full w-full object-cover aspect-[3/4] transition-transform duration-300 group-hover:scale-105"
                                    data-alt="Profile picture of an attractive woman smiling"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCeOG3miTwRyYADOI0C98qsEf_WSavxtS00sfcR9zH6bvjnQMZElFOsk4qFTjtC_oyn5lMvgfg5LuHfVEooTsj-KVy5hwUUiQItWmfYj3BcYddYsL6QlClvCusVYZk_JfB3zBvRoKLmjSNfNd9pPVobvqM-XJDl0O2OyuF6jB1fdY0mVDdBwPkgK6s7OwpHAHXaLUJyvYQQvr65OzXWw9y6Qw8D2oUxK4kyW2HMJRAKBB-Ea_QvFKkj22UXnqYgEs_K1crTlRk_0vdQ" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 w-full p-4">
                                    <h4 class="text-white text-xl font-bold">Linh Đan, 25</h4>
                                    <p class="text-white/80 text-sm">Đà Nẵng, Việt Nam</p>
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Nấu
                                            ăn</span>
                                        <span class="rounded-full bg-white/20 px-2.5 py-0.5 text-xs text-white">Yoga</span>
                                    </div>
                                </div>
                                <div
                                    class="absolute inset-0 flex items-center justify-center gap-4 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-red-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">favorite</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-zinc-600 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">close</span>
                                    </button>
                                    <button
                                        class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm text-white hover:bg-blue-500 transition-colors">
                                        <span class="material-symbols-outlined !text-4xl">send</span>
                                    </button>
                                </div>
                            </div>
                            <!-- More cards would be loaded dynamically here -->
                        </div>
                        <!-- Empty State -->
                        <div
                            class="hidden flex-col items-center justify-center text-center mt-12 p-8 bg-white dark:bg-background-dark/50 rounded-lg border border-dashed border-primary/30">
                            <span class="material-symbols-outlined text-6xl text-primary/50">sentiment_dissatisfied</span>
                            <p class="mt-4 text-xl font-bold text-zinc-900 dark:text-white">Không tìm thấy hồ sơ nào phù
                                hợp</p>
                            <p class="mt-2 text-zinc-500 dark:text-zinc-400">Hãy thử nới lỏng bộ lọc của bạn để xem thêm
                                nhiều người hơn!</p>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
@endsection

</html>