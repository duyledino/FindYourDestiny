<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Purchase Connects</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 20
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#fcf8f9",
                        "background-dark": "#221014",
                        "content-light": "#1c0d11",
                        "content-dark": "#f4e7ea",
                        "subtle-light": "#9c495e",
                        "subtle-dark": "#e8ced5",
                        "border-light": "#f4e7ea",
                        "border-dark": "#3a1c25"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "1rem", "lg": "1.5rem", "xl": "2rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

@extends('layouts.main')

@section('content')
    <div
        class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">

                    <main class="flex-grow">
                        <div class="flex flex-wrap justify-between gap-3 p-4 py-8 md:py-12">
                            <div class="flex w-full flex-col gap-3 text-center">
                                <p
                                    class="text-content-light dark:text-content-dark text-4xl font-black leading-tight tracking-[-0.033em]">
                                    Purchase Connects</p>
                                <p
                                    class="text-subtle-light dark:text-subtle-dark text-base font-normal leading-normal max-w-lg mx-auto">
                                    Get more connects to enhance your experience and meet new people.</p>
                            </div>
                        </div>
                        <form action="{{ route('checkout.post') }}" class="px-4" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                            <input type="hidden" id="inputConnect" name="connect" value="70">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 py-3">
                                <label
                                    class="relative flex flex-1 flex-col gap-4 rounded-lg border-2 border-solid border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark p-6 cursor-pointer has-[:checked]:border-primary has-[:checked]:ring-4 has-[:checked]:ring-primary/20 transition-all duration-200">
                                    <input class="sr-only" name="amount" type="radio" value="20000" />
                                    <div class="flex flex-col gap-1">
                                        <h1
                                            class="text-content-light dark:text-content-dark text-base font-bold leading-tight">
                                            Starter Pack</h1>
                                        <p class="flex items-baseline gap-1 text-content-light dark:text-content-dark">
                                            <span
                                                class="text-4xl font-black leading-tight tracking-[-0.033em]">20,000</span>
                                            <span class="text-base font-bold leading-tight">VND</span>
                                        </p>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 text-[13px] font-normal leading-normal text-content-light dark:text-content-dark">
                                        <span class="material-symbols-outlined text-primary text-xl">bolt</span>
                                        25 Connects
                                    </div>
                                </label>
                                <label
                                    class="relative flex flex-1 flex-col gap-4 rounded-lg border-2 border-solid border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark p-6 cursor-pointer has-[:checked]:border-primary has-[:checked]:ring-4 has-[:checked]:ring-primary/20 transition-all duration-200">
                                    <input checked="" class="sr-only" name="amount" type="radio" value="50000" />
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center justify-between">
                                            <h1
                                                class="text-content-light dark:text-content-dark text-base font-bold leading-tight">
                                                Plus Pack</h1>
                                            <p
                                                class="text-white text-xs font-medium leading-normal tracking-[0.015em] rounded-full bg-primary px-3 py-[3px] text-center">
                                                Popular</p>
                                        </div>
                                        <p class="flex items-baseline gap-1 text-content-light dark:text-content-dark">
                                            <span
                                                class="text-4xl font-black leading-tight tracking-[-0.033em]">50,000</span>
                                            <span class="text-base font-bold leading-tight">VND</span>
                                        </p>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 text-[13px] font-normal leading-normal text-content-light dark:text-content-dark">
                                        <span class="material-symbols-outlined text-primary text-xl">bolt</span>
                                        70 Connects
                                    </div>
                                </label>
                                <label
                                    class="relative flex flex-1 flex-col gap-4 rounded-lg border-2 border-solid border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark p-6 cursor-pointer has-[:checked]:border-primary has-[:checked]:ring-4 has-[:checked]:ring-primary/20 transition-all duration-200 sm:col-span-2 lg:col-span-1">
                                    <input class="sr-only" name="amount" type="radio" value="100000" />
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center justify-between">
                                            <h1
                                                class="text-content-light dark:text-content-dark text-base font-bold leading-tight">
                                                Super Pack</h1>
                                            <p
                                                class="text-white text-xs font-medium leading-normal tracking-[0.015em] rounded-full bg-primary px-3 py-[3px] text-center">
                                                Best Value</p>
                                        </div>
                                        <p class="flex items-baseline gap-1 text-content-light dark:text-content-dark">
                                            <span
                                                class="text-4xl font-black leading-tight tracking-[-0.033em]">100,000</span>
                                            <span class="text-base font-bold leading-tight">VND</span>
                                        </p>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 text-[13px] font-normal leading-normal text-content-light dark:text-content-dark">
                                        <span class="material-symbols-outlined text-primary text-xl">bolt</span>
                                        150 Connects
                                    </div>
                                </label>
                            </div>
                            <div class="flex px-4 py-8 justify-center">
                                <button
                                    class="flex w-full sm:w-auto min-w-[200px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                                    <span class="truncate">Nạp ngay</span>
                                </button>
                            </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
    <script defer>
        const connectGet = (value) => {
            switch (Number(value)) {
                case 20000: return 25;
                case 50000: return 70;
                case 100000: return 150;
                default: return 0;
            }
        };

        const inputConnect = document.querySelector('#inputConnect');
        const cash = document.querySelectorAll(".sr-only");
        console.log(cash);
        //convert nodeList[] to array[] so I can use Array method .... 
        let checkedCash = [...cash].find(item => item.checked === true);
        if (checkedCash) {
            inputConnect.value = connectGet(checkedCash.value);
        }
        cash.forEach(item => {
            item.addEventListener('click', () => {
                checkedCash = item;
                inputConnect.value = connectGet(item.value);
                console.log("Selected:", inputConnect.value);
            });
        });

    </script>
@endsection

</html>