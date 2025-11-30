<!DOCTYPE html>

<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
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
</head>

@extends('layouts.main')
{{-- child page here is extending their parent  --}}
@section('content')
    <div class="relative flex min-h-screen w-full flex-col">
        <main class="flex-grow">
            <!-- HeroSection Component -->
            <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20 ">
                <div class="relative @container">
                    <div class="flex min-h-[520px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-lg items-center justify-center p-4 text-center"
                        data-alt="A happy couple smiling and looking at each other, with a soft, warm background."
                        style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCkze_OovYqWiKVn6vEVFpSEtOVx_Eu0Un258Slfa8Ak0LIhGsHaFogYo3ykuKWhIT34OpDm16D2MDBoW_B7sgj35SAFW3GoSSVE6zdrM3rjapLGc2zye5islB3Gz7_BDnmZIl6asub5QwA-y0frc4vfNfAq0j1KA22uFXilhRE2URXeIFMbGnIkSBWbDG1LRCgiyl6dqFl2lxc79-JOg_h_8vmrtLMc7vWfszU_Ak-IBnVuSDr3KcuMLEIkCMcEToAjSm_IBiKF5gW");'>
                        <div class="flex flex-col gap-2">
                            <h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-6xl">
                                Kết nối những tâm hồn đồng điệu
                            </h1>
                            <h2
                                class="text-white/90 text-base font-normal leading-normal @[480px]:text-lg max-w-2xl mx-auto">
                                Tìm kiếm tình yêu đích thực của bạn trên nền tảng hẹn hò đáng tin cậy và hiện đại của
                                chúng tôi.
                            </h2>
                        </div>
                        <div class="w-full max-w-lg mt-4">
                            <form
                                class="flex w-full flex-1 items-stretch rounded-full h-14 bg-white/90 backdrop-blur-sm p-1.5 shadow-lg">
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full text-gray-800 focus:outline-0 focus:ring-0 border-0 bg-transparent h-full placeholder:text-gray-500 px-5 text-sm font-normal leading-normal @[480px]:text-base"
                                    placeholder="Nhập email của bạn" type="email" />
                                <button
                                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-full px-5 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base hover:bg-opacity-90 transition-colors"
                                    type="submit">
                                    <span class="truncate">Tham gia miễn phí</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Profile Showcase Grid Component -->
            <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
                <div class="text-center mb-8 ">
                    <h2
                        class="text-2xl font-bold leading-tight tracking-[-0.015em]  text-gray-900 dark:text-white sm:text-3xl">
                        Gặp
                        gỡ những thành viên tuyệt vời</h2>
                    <p class="mt-2 text-base text-gray-600 dark:text-gray-400 ">Khám phá cộng đồng đa dạng và sôi động
                        của chúng
                        tôi.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 place-items-center">
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <a href="{{ route('user.detail', [ $user->user_id ] ) }}">
                                <div class="group relative overflow-hidden rounded aspect-[3/4]">
                                    <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                        data-alt="{{ $user->user_name }}" src="{{ $user->user_image === null || $user->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <p class="text-white text-base font-bold leading-tight">{{ $user->user_name }},
                                            {{ date('Y') - $user->year_of_birth }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="group relative overflow-hidden rounded aspect-[3/4]">
                            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                data-alt="Profile picture of Minh"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDx5hoWowLZMyxk1NotSR6Y-6usZ3DgjftYttS3ZXLxlkJRlQuTIz7xp1ofSWqUYaTtnnzjVDBKIELCffmxtJ0oXd1hf5kS7y_ZH7z7Y08PhqYXh6Ss7Y0t5jlMNKs7rToqDCP41Vfs7PYmC7SIcukcr-y9DiL7ZUpQbavrqWLZ5qaTQDTeueb3zM1HAB1WY6kxhARVs614RbrY2rxdHRM7U5BRpzl0vX1xNYTEMusVxu-abiEfo0eSCym4_dmtoA1-5HzUKnRhNxZ" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <p class="text-white text-base font-bold leading-tight">Minh, 31</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden rounded aspect-[3/4]">
                            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                data-alt="Profile picture of Linh"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA32kkMEMuQaM8Tf9h2IbL_FfCTwlXENaPl2YZem0A9bOwPBLscHmrrMkLabT_YUv4Eq-GoDJEwuSIR1tYjbOPS_SnaHvcC2fPYG5tw6XnIX6fyphwlYHBFuAGvdXCFjsYe6esOJG-juUJqqMhQCW8Nfw77s0fuTlSrfSpMylmxahktrdeY2ud4ikdwrlce2KGmOBhssHhlhIXipERIQPwI5EDSTb1IgSt8PJ7MfxHqb2PTFmWOsDQuSBOkKTllwkGsUmZ0xkhFzHPN" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <p class="text-white text-base font-bold leading-tight">Linh, 25</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden rounded aspect-[3/4]">
                            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                data-alt="Profile picture of Tuan"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8c6dTRVlqD0wWYtIAq9pYMwf_eWa-lgbLmijKTRoshhIaNL8Mp3Yo7S_bmmKRR21ic5Wgj0E-NuCzgCSKgViM9jKtpJ2obVE0UNTGRmOSDcXRrJ1oM9hiu5kzP0g9CvAXNDNkgAy_DHzODIVJ9p0kkPWz1Us2NPLAx-plu22ldAg512h1DEAapq0NLZGiZlyxa2sDl4NOkV04jfgkjPG0pDxaTR2oMdSr-RRcOiML5PUlTRt_0jOg8kVNNlXTk-Lxbr4KJ2WwhlAJ" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <p class="text-white text-base font-bold leading-tight">Tuấn, 29</p>
                            </div>
                        </div>
                        <div class="group relative overflow-hidden rounded aspect-[3/4]">
                            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                data-alt="Profile picture of Huong"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2TnTT47iGRBQzBwLjXwXdbdseUrea4xX7YpvpxzCh3L9HCj4JAnulWLivgarFVTOOQGuak_1xMIsX5UwqKtp_GqZT0vWT0FAftrNeMp-Vbw7HIHvD1uhbKLvH15FXuMGifFd7jkxUGOh1O2liWRdW-5ktxrACp0nNO9_-kUbrhNTsjYG5-zWcemCAs16jGMr2QkKckV-j1RJmVbLigZMc38UF7PfywKuTKC1VQuwXAvGmv1wBuFIMGhR1WdBJKqsgCQgE-6OE2S6b" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <p class="text-white text-base font-bold leading-tight">Hương, 26</p>
                            </div>
                        </div>
                    @endif

                </div>
            </section>
            <!-- "How It Works" Section Component -->
            <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
                <div class="flex flex-col gap-10">
                    <div class="text-center">
                        <h2
                            class="text-2xl font-bold leading-tight tracking-[-0.015em] text-gray-900 dark:text-white sm:text-3xl">
                            Cách hoạt động</h2>
                        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Bắt đầu hành trình tìm kiếm tình yêu
                            của bạn
                            chỉ
                            với 3 bước đơn giản.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div
                            class="flex flex-1 gap-4 rounded border border-primary/20 bg-white dark:bg-background-dark/50 p-6 flex-col items-center text-center">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/20 text-primary">
                                <span class="material-symbols-outlined !text-3xl">person_add</span>
                            </div>
                            <div class="flex flex-col gap-1 mt-2">
                                <h3 class="text-lg font-bold">Tạo hồ sơ</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Hoàn thành hồ sơ của bạn trong vài
                                    phút với
                                    những
                                    thông tin và hình ảnh nổi bật nhất.</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-1 gap-4 rounded border border-primary/20 bg-white dark:bg-background-dark/50 p-6 flex-col items-center text-center">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/20 text-primary">
                                <span class="material-symbols-outlined !text-3xl">search</span>
                            </div>
                            <div class="flex flex-col gap-1 mt-2">
                                <h3 class="text-lg font-bold">Tìm kiếm thông minh</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Sử dụng bộ lọc nâng cao của chúng
                                    tôi để tìm
                                    kiếm
                                    những người phù hợp với bạn.</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-1 gap-4 rounded border border-primary/20 bg-white dark:bg-background-dark/50 p-6 flex-col items-center text-center">
                            <div class="flex items-center justify-center size-12 rounded-full bg-primary/20 text-primary">
                                <span class="material-symbols-outlined !text-3xl">favorite</span>
                            </div>
                            <div class="flex flex-col gap-1 mt-2">
                                <h3 class="text-lg font-bold">Bắt đầu kết nối</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Gửi tin nhắn, thể hiện sự quan tâm
                                    và bắt
                                    đầu những
                                    cuộc trò chuyện ý nghĩa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonials Section -->
            <section class="bg-primary/10 dark:bg-primary/20 py-10 sm:py-16">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-8">
                        <h2
                            class="text-2xl font-bold leading-tight tracking-[-0.015em] text-gray-900 dark:text-white sm:text-3xl">
                            Câu chuyện thành công</h2>
                        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Xem những gì người dùng của chúng
                            tôi nói về
                            trải
                            nghiệm của họ.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                        <div class="bg-white dark:bg-background-dark/50 rounded p-6 shadow-sm">
                            <div class="flex items-start gap-4">
                                <img class="size-14 rounded-full object-cover" data-alt="Photo of user Tuan Minh"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAk0wCG8rMhQ39m67A3ybC3MLSiPlFI1s3mLh9pvdgFJj_ytZenR0-njLbEqvaWeSL7ccpDrKiSMp3MvQVBxFTZ5XN1nh7kxd6cBswQPSeewuJLJiGsrhXqJ5q-JCiqLgWyuwOhxXvNlHQFXX20EtLcLxmr3ddVMF1se0AvDJMdMyey7jKrAzlnmWwJgD7PoxLcQpCBbyN9u2VQ2J98sVDgCLPavoGESsnck4UhQNcsExMtXBFt1hzPIcyvGUqNflv3hMKpT6qvTHSo" />
                                <div>
                                    <p class="italic text-gray-700 dark:text-gray-300">"Tôi đã tìm thấy người bạn đời
                                        của mình ở
                                        đây! Nền
                                        tảng rất dễ sử dụng và cộng đồng thực sự chất lượng. Cảm ơn "Kết nối hẹn hò" đã
                                        giúp
                                        chúng tôi tìm thấy
                                        nhau."</p>
                                    <p class="mt-4 font-bold text-gray-900 dark:text-white">- Tuấn Minh &amp; Lan Anh
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-background-dark/50 rounded p-6 shadow-sm">
                            <div class="flex items-start gap-4">
                                <img class="size-14 rounded-full object-cover" data-alt="Photo of user Mai Phuong"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5QzvjxOZqd5GtSRXOkPmXM-D6Fpuk_uYeIqL3kQ-2leLdakMeV-TsgWSr5Mt-xlPnzKR1EOTAHNxZq7--SPLUxSSb8-ppRf1WvAL4kkEa-q20ioAaM5cxx1SYREYLpPwsHPaORkeHreGHdHOVf2sb1AFOuoT0Kv1XeOJ3HaT_kY7H3TL0P4rgxoh4-VeqIiY1DEhJIc42pN5hJ6szLz1YkE2B_LnhWijuNBZ1MmDDAogtDMRRm3D5xTC0Evo80HZHBHw-tkRN56Qo" />
                                <div>
                                    <p class="italic text-gray-700 dark:text-gray-300">"Ban đầu tôi khá e ngại về hẹn
                                        hò trực
                                        tuyến, nhưng
                                        "Kết nối hẹn hò" đã thay đổi suy nghĩ của tôi. Tôi đã có những cuộc trò chuyện
                                        tuyệt vời
                                        và gặp được nhiều
                                        người thú vị."</p>
                                    <p class="mt-4 font-bold text-gray-900 dark:text-white">- Mai Phương</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection


</html>
