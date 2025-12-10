<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Connect Users</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#fcf8f9",
                        "background-dark": "#221014",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2a1419",
                        "text-light": "#1c0d11",
                        "text-dark": "#fcf8f9",
                        "subtle-light": "#9c495e",
                        "subtle-dark": "#a17885",
                        "border-light": "#f4e7ea",
                        "border-dark": "#442129"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "1.5rem",
                        "xl": "2rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }
    </style>
</head>

@extends('layouts.main')

@section('content')
    {{-- @dd($users) --}}
    <div class="relative flex h-auto min-h-screen w-full flex-col">
        <main class="flex-grow container mx-auto px-10 py-8">
            <div class="lg:mb-0 mb-3 flex flex-1 items-center justify-end gap-4">
                <label class="flex flex-col min-w-40 !h-10 w-full max-w-sm">
                    <div class="flex w-full flex-1 items-stretch rounded-full h-full">
                        <div
                            class="text-subtle-light dark:text-subtle-dark flex border-none bg-border-light dark:bg-border-dark items-center justify-center pl-4 rounded-l-full border-r-0">
                            <span class="material-symbols-outlined !text-2xl">search</span>
                        </div>
                        <input
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full text-text-light dark:text-text-dark focus:outline-0 focus:ring-0 border-none bg-border-light dark:bg-border-dark focus:border-none h-full placeholder:text-subtle-light dark:placeholder:text-subtle-dark px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                            placeholder="Search by name..." value="" />
                    </div>
                </label>
            </div>
            <div class="grid grid-cols-12 gap-8">
                <!-- Left Sidebar: Filters -->
                <aside class="col-span-12 lg:col-span-3">
                    <div class="sticky top-28">
                        <form action="{{ route('filter.post') }}" method="POST"
                            class="flex flex-col gap-6 rounded-lg bg-surface-light dark:bg-surface-dark p-6 border border-border-light dark:border-border-dark">
                            @csrf
                            <input type="hidden" name="page" value="1">
                            <h3 class="text-xl font-bold text-text-light dark:text-text-dark">Filters</h3>
                            <!-- Age Slider -->
                            <div class="flex w-full flex-col items-start justify-between gap-3">
                                <p class="text-text-light dark:text-text-dark text-base font-medium leading-normal w-full">
                                    Age</p>
                                <div class="flex h-[38px] w-full pt-1.5">
                                    <input type="hidden" id="age_from" name="age_from" value="{{ $age_from ?? 18 }}">
                                    <input type="hidden" id="age_to" name="age_to" value="{{ $age_to ?? 35 }}">
                                    <div class="w-full max-w-lg">

                                        <div class="relative w-full h-2 rounded-full bg-gray-200 dark:bg-gray-700 z-20">

                                            <div id="activeTrack" class="absolute z-0 h-full rounded-full bg-[#f42559]">
                                            </div>

                                            <input type="range" id="rangeMin" min="18" max="60" value="{{ $age_from ?? 18 }}" step="1"
                                                class="absolute w-full h-full appearance-none bg-transparent cursor-pointer pointer-events-none  z-21
                                                                                                    [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full 
                                                                                                    [&::-webkit-slider-thumb]:bg-primary [&::-webkit-slider-thumb]:appearance-none 
                                                                                                    [&::-webkit-slider-thumb]:shadow-[0_0_0_2px_white] [&::-webkit-slider-thumb]:pointer-events-auto [&::-webkit-slider-thumb]:dark:shadow-[0_0_0_2px_gray]">

                                            <input type="range" id="rangeMax" min="18" max="60" value="{{ $age_to ?? 35 }}" step="1"
                                                class="absolute w-full h-full appearance-none bg-transparent cursor-pointer pointer-events-none z-21
                                                                                                    [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:rounded-full 
                                                                                                    [&::-webkit-slider-thumb]:bg-primary [&::-webkit-slider-thumb]:appearance-none 
                                                                                                    [&::-webkit-slider-thumb]:shadow-[0_0_0_2px_white] [&::-webkit-slider-thumb]:pointer-events-auto [&::-webkit-slider-thumb]:dark:shadow-[0_0_0_2px_gray]">
                                            <span id="rangeNumberMin"
                                                class="absolute top-3.5 -translate-x-1/2 text-[17px] font-bold text-primary">{{ $age_from ?? 18 }}</span>
                                            <span id="rangeNumberMax"
                                                class="absolute top-3.5 -translate-x-1/2 text-[17px] font-bold text-primary">{{ $age_to ?? 35 }}</span>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <!-- Gender Radio List -->
                            <div>
                                <p class="text-text-light dark:text-text-dark text-base font-medium leading-normal pb-2">
                                    Gender</p>
                                <div class="flex flex-wrap gap-3">
                                    <input type="hidden" id="user_gender" name="user_gender" value="{{ $user_gender ?? "All" }}">
                                    <label
                                        class="labelGender text-sm font-medium leading-normal flex items-center justify-center rounded-full border border-border-light dark:border-border-dark px-4 h-11  dark:text-text-dark relative cursor-pointer">Nam<input
                                            class="gender-filter invisible absolute" type="radio" value="Male" /></label>
                                    <label
                                        class="labelGender text-sm font-medium leading-normal flex items-center justify-center rounded-full border border-border-light dark:border-border-dark px-4 h-11  dark:text-text-dark relative cursor-pointer">Nữ<input
                                            class="gender-filter invisible absolute" type="radio"  value="Female"/>
                                        </label>
                                    <label
                                        class="labelGender text-sm font-medium leading-normal flex items-center justify-center rounded-full border border-border-light dark:border-border-dark px-4 h-11  dark:text-text-dark relative cursor-pointer">Tất
                                        cả<input class="gender-filter invisible absolute" type="radio" value="All"/></label>
                                </div>
                            </div>
                            <!-- Hobbies Text Field -->
                            <label class="flex flex-col gap-2 min-w-40 flex-1">
                                <input type="hidden" name="hobbies" id="inputHobbies" value="{{ $hobbies ?? "" }}">
                                <p class="text-text-light dark:text-text-dark text-base font-medium leading-normal">
                                    Hobbies</p>
                                <div class="flex gap-2">
                                    <input id="inputInsertHobby"
                                        class="form-input min-w-0 flex-1 resize-none overflow-hidden rounded-full text-text-light dark:text-text-dark focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark focus:border-primary/50 h-11 placeholder:text-subtle-light dark:placeholder:text-subtle-dark px-4 text-base font-normal leading-normal"
                                        placeholder="Enter a hobby..." value="" />
                                    <button id="buttonInsertHobby"
                                        class="rounded-lg bg-pink-100 dark:bg-gray-800 p-2 text-primary dark:text-pink-300 shadow-sm hover:bg-pink-200 dark:hover:bg-gray-700 transition-colors"
                                        type="button">
                                        <span class="material-icons-outlined text-2xl font-bold">add</span>
                                    </button>
                                </div>
                                <div id="hobbiesContainer" class="w-full flex-wrap flex gap-3">
                                </div>
                            </label>
                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-3 pt-4">
                                <button
                                    class="w-full h-12 flex items-center justify-center rounded-full bg-primary text-white font-bold text-sm"
                                    type="submit">Áp dụng bộ lọc</button>
                                <button
                                    class="w-full h-12 flex items-center justify-center rounded-full bg-transparent text-primary font-bold text-sm border-2 border-primary"
                                    type="reset">Đặt lại</button>
                            </div>
                        </form>
                    </div>
                </aside>
                <!-- Main Content: User Profiles -->
                <section class="col-span-12 lg:col-span-9">
                    <div class="flex flex-col gap-8">
                        <h1 class="text-text-light dark:text-text-dark tracking-light text-[32px] font-bold leading-tight">
                            Find Your Connection</h1>
                        @if ($users !== null)
                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                                <!-- User Card 1 -->
                                @foreach ($users as $user)
                                    <a href="{{ route('user.detail',["user_id"=>$user->user_id]) }}">
                                        <div
                                        class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                        <div class="w-full h-96 bg-cover bg-center" data-alt="Profile photo of Adrian"
                                            style="background-image: url('{{ $user->user_image === null || $user->user_image === "" ? asset('upload/Default_profile.png') : asset('storage/' . $user->user_image) }}')">
                                        </div>
                                        <div class="p-4 flex flex-col gap-3">
                                            <div class="flex justify-between items-baseline">
                                                <h4 class="text-lg font-bold text-text-light dark:text-text-dark">{{ $user->user_name }}, {{ date('Y')-$user->year_of_birth }}
                                                </h4>
                                            </div>
                                            <div class="flex flex-wrap gap-2">
                                                @if ($user->hobbies_name !== "")
                                                    @foreach (explode(',', $user->hobbies_name) as $hobby)
                                                        <span
                                                            class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">{{ $hobby }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Chưa cập nhật</span>
                                                @endif                                        
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                                <!-- User Card 1 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Adrian"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCMblkXYVeCtI2jqIydTvrlseBIpRqa3vosugQrVOiYzuV3_4nl2BdmP6e8d93l4yGfpQ4PqjZFR9_4O5EBLkzoK8hQjymJj-6Z-NOT7SmhDuTwVrqxBqXBOaPLZmfnxIcUGPjrOItCEgvZbhudsKUDMXvOCBmHfsm43yJp8rfIlzSitRj3Z2KZuxKxbAUDf8UfES0B7ct_3FTUOe-ey1s25kn2oZe7ENbhHn-OLM6FyWMTKHtws9GElUp6Wy4LXdWPoHDC5_ZUdR8')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Adrian, 28
                                            </h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Photography</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Hiking</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Cooking</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Card 2 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Bella"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCX8QyxWnbKIWi04DzQOx4lXDpK4qkNB18ISUIKN3SO4Zjf5bql5qWs0H9m26Inrtw2aXe3kK1cB5hKopAfWSXuim27fG0SLxfl7ucDvDiy6qIzPC1cseuuMoxYTcUCr44xDtYR-dpWZqYB8i6RmIYZmTwG4wHWXR3hIpRN6e_BXvq9TuDy0Rk0ii_vHYhFYQiBaPmFgjJcuewkPbRnswmcmo3tcyhpXnugBfzs4awLJQyN6qLWB6AXHvkBI1ZLbKDzzQ0RXhYPzXw')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Bella, 25</h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Yoga</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Art</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Traveling</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Card 3 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Charles"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDJtqPhbUdP1KZtgVw_nhsVi0OYFvSeJS2zQ0bh81UM2eAwqAQquPvPR8TPlgNTHWCOvm4R2xN20YCBwG49yvsUCcxhLBL5oDLoiR_tOK2kH_tTYelI8RpUUzpZx2KJabFPsKaT7JA-qjlz7simL0L_0rZt5tPsokMd1zPt9M8ikpeiY91y9m_D8jLdRLKKoQm1ex-NfNz5C9D6Z4yKPy3n1KH6srqg7d7YjvZaf7vurbGgs9rxxnvZLoKMAl_Bj3n1ZEJWi9Cpa8Q')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Charles, 31
                                            </h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Music</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Reading</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Coffee</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Card 4 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Diana"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBBkQTuFTxufadvpoOP09DFXn9AMkrA5ke95a8_0iIMgScZO06JhBBkE0Ae2VXKPbzTpiz8Ci0RuKu1Kk-B6VZaG0tpDfIRC3Q5gW3WDYaYXA8YsRuF7NwRWD59mV2gBkw4j5Ii12_v3sY85XsKGNEdmIaFCTC-62smwhSkqmVl-189cAFLdpgq1qYvUb3PioDaehSMRrcFvQWCfqJAXOX9G6Zb9dGLViLmVqjccFpZr3Tr3SfkphCLHCOP9vPPlG8zVKbkoDIPYOA')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Diana, 29</h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Fashion</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Blogging</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Card 5 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Ethan"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB7JKuRJMytqrfE3Du5Oz663FE-MFiKnzfcuvjJxkEobfBkoyVgOVCKSuMIdkO5slVmP7UPvPOxImN-yQQztm6BKUynZiHCzin5wZw3bkFF9jcjXYPr4clD0HNr7Vt4JTZPkWdJitB4b1LLtJH1BIZpphFIBmM0NQ5pi-DSM-9um4VsK2XAbbAAo4vpTNJy1bk2uTWBs0rwIGaXIYhPRjeoS622YpfOUYBXnPJccK4i6XBJgG7nd4tEdvuyY0ibGlskNDSCa0vriik')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Ethan, 33</h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Fitness</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Tech</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Gaming</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Card 6 -->
                                <div
                                    class="flex flex-col rounded-lg bg-surface-light dark:bg-surface-dark overflow-hidden border border-border-light dark:border-border-dark transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
                                    <div class="w-full h-64 bg-cover bg-center" data-alt="Profile photo of Fiona"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAzmmuMfZIOrtsw7TpldKG-L9iGaRrH5KMM8qKrrlPUgXwsLb6U0PsYkpOfhBvsc9F-JWaiLWT_9C6l7y_j8yxZAup7ZbeeN0zyDjJdJeq5U2KQXggCteBpYaOghaizQn3hXT3T8miOTRHHTvnE17yCxo5MdDTIm3T3l3N40RK1oZaq4k2C8cpG4rtqan0CDQj4fsmiuX4_m60EBPXOnlvU2jn13wMMy1N0_hW3jolq7lvCFxSNX1eNGFQhT2iv_tCb2BXoWQVtw1w')">
                                    </div>
                                    <div class="p-4 flex flex-col gap-3">
                                        <div class="flex justify-between items-baseline">
                                            <h4 class="text-lg font-bold text-text-light dark:text-text-dark">Fiona, 26</h4>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Animals</span>
                                            <span
                                                class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Volunteering</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Pagination -->
                        <nav class="flex items-center justify-center pt-8">
                            <!-- I added id="pagination-list" here -->
                            <ul id="pagination-list" class="flex items-center gap-2">
                                <!-- Content will be injected by JavaScript -->
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script defer>
        //Manipulate gender
        const user_gender = document.querySelector("#user_gender");
        const genderFilter = document.querySelectorAll(".gender-filter");
        const labelGender = document.querySelectorAll(".labelGender");
        console.log(labelGender);
        labelGender[2].classList.add('border-2', 'px-[15px]', 'border-primary', 'text-primary');
        // user_gender.value = "All";
        console.log(user_gender);
        genderFilter.forEach((item, i) => {
            item.addEventListener('click', () => {
                genderFilter.forEach((child, index) => {
                    labelGender[index].classList.remove(
                        'border-2', 'px-[15px]', 'border-primary', 'text-primary'
                    );
                    labelGender[index].classList.add('text-text-light');
                });
                user_gender.value = item.value;
                console.log(item.value);
                console.log(user_gender);
                labelGender[i].classList.remove('text-text-light', 'border-border-light');
                labelGender[i].classList.add('transition-all', 'border-2', 'px-[15px]', 'border-primary', 'text-primary');
            })
        })

        // Manipulate hobbies
        const buttonInsertHobby = document.querySelector("#buttonInsertHobby");
        const inputInsertHobby = document.querySelector("#inputInsertHobby");
        const hobbiesContainer = document.querySelector("#hobbiesContainer");
        const inputHobbies = document.querySelector("#inputHobbies");
        let hobbiesArray = [];
        buttonInsertHobby.addEventListener('click', () => {
            console.log("click");
            if (inputInsertHobby.value !== "") {
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

        // age process bar
        const rangeMax = document.querySelector("#rangeMax");
        const rangeMin = document.querySelector("#rangeMin");
        const rangeNumberMin = document.querySelector("#rangeNumberMin");
        const rangeNumberMax = document.querySelector("#rangeNumberMax");
        const activeTrack = document.querySelector("#activeTrack");
        const age_from = document.querySelector("#age_from");
        const age_to = document.querySelector("#age_to");
        const updateProcess = () => {
            rangeNumberMax.textContent = rangeMax.value;
            rangeNumberMin.textContent = rangeMin.value;
            age_from.value = rangeMin.value;
            age_to.value = rangeMax.value;
            trackLength = rangeMax.value - rangeMin.value;
            const range = rangeMax.max - rangeMin.min;
            const minOffset = ((rangeMin.value - rangeMin.min) / range) * 100; // get currentMin.value excepts currentMin.min will be got from 0 to currentMin.value
            const maxOffset = ((rangeMax.value - rangeMax.min) / range) * 100;
            activeTrack.style.width = `${(trackLength / range) * 100}%`;
            activeTrack.style.left = `${minOffset}%`
            rangeNumberMin.style.left = `calc(${minOffset}% + (${8 - minOffset * 0.15}px)`;
            rangeNumberMax.style.left = `calc(${maxOffset}% + (${8 - maxOffset * 0.15}px))`;
        }
        rangeMax.addEventListener('input', () => {
            if (rangeMax.value <= rangeMin.value) {
                rangeMin.value = rangeMax.value;
            }
            updateProcess();
        })
        rangeMin.addEventListener('input', () => {
            if (rangeMin.value >= rangeMax.value) {
                rangeMax.value = rangeMin.value;
            }
            updateProcess();
        })
        updateProcess();

        //pagination

        const TOTAL_PAGES = {{ $total_page }};
    let currentPage = {{ $current_page }}; // Start at page 1

    // Your Exact Tailwind Classes
    const STYLES = {
        // The container for the numbers
        list: "flex items-center gap-2",
        
        // <a href> styles
        baseLink: "flex items-center justify-center size-10 rounded-full text-sm font-bold transition-colors cursor-pointer select-none",
        
        // Active page (Solid Primary)
        active: "bg-primary text-white",
        
        // Inactive page (Hover effect)
        inactive: "text-text-light dark:text-text-dark hover:bg-primary/10 hover:text-primary",
        
        // Disabled Arrow (Opacity reduced)
        disabled: "opacity-30 cursor-not-allowed pointer-events-none text-subtle-light dark:text-subtle-dark",
        
        // Active Arrow (Clickable)
        arrow: "text-subtle-light dark:text-subtle-dark hover:bg-primary/10 hover:text-primary",
        
        // The "..." dots
        dots: "flex items-center justify-center size-10 text-sm font-bold text-subtle-light dark:text-subtle-dark"
    };

    const container = document.getElementById('pagination-list');

    // 1. Core Logic to determine which numbers to show (Ant Design Algorithm)
    function getPaginationRange(current, total) {
        // If total pages are small (<= 7), show all
        if (total <= 7) {
            return Array.from({ length: total }, (_, i) => i + 1);
        }

        // Logic for "..." ellipses
        // We always show the first page, last page, current page, and one sibling on each side.
        const siblingCount = 1; 
        const totalPageNumbers = siblingCount + 5; // sibling + current + first + last + 2*dots

        /* Case 1: Close to the beginning (1 2 3 4 5 ... 100) */
        if (current <= 4) {
            return [1, 2, 3, 4, 5, '...', total];
        }

        /* Case 2: Close to the end (1 ... 96 97 98 99 100) */
        if (current >= total - 3) {
            return [1, '...', total - 4, total - 3, total - 2, total - 1, total];
        }

        /* Case 3: In the Middle (1 ... 49 50 51 ... 100) */
        return [1, '...', current - 1, current, current + 1, '...', total];
    }
    function renderPagination() {
        const range = getPaginationRange(currentPage, TOTAL_PAGES);
        let html = '';

        // --- Previous Button ---
        const prevDisabled = currentPage === 1;
        html += `
            <li>
                <a href="/connect?current_page=${prevDisabled?1:currentPage -1}" 
                   class="${STYLES.baseLink} ${prevDisabled ? STYLES.disabled : STYLES.arrow}">
                    <span class="material-symbols-outlined !text-xl">chevron_left</span>
                </a>
            </li>
        `;

        // --- Page Numbers & Dots ---
        range.forEach(item => {
            if (item === '...') {
                html += `<li><span class="${STYLES.dots}">...</span></li>`;
            } else {
                const isActive = item === currentPage;
                const styleClass = isActive ? STYLES.active : STYLES.inactive;
                
                html += `
                    <li>
                        <a href="/connect?current_page=${item}" 
                           class="${STYLES.baseLink} ${styleClass}">
                            ${item}
                        </a>
                    </li>
                `;
            }
        });

        // --- Next Button ---
        const nextDisabled = currentPage === TOTAL_PAGES;
        html += `
            <li>
                <a href="/connect?current_page=${nextDisabled ? currentPage : currentPage+1 }"
                   class="${STYLES.baseLink} ${nextDisabled ? STYLES.disabled : STYLES.arrow}">
                    <span class="material-symbols-outlined !text-xl">chevron_right</span>
                </a>
            </li>
        `;

        container.innerHTML = html;
    }
    // Initial Render
    renderPagination();
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