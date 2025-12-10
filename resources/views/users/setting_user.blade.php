<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Settings - Theme Mode</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "text-light-primary": "#1c0d11",
                        "text-light-secondary": "#9c495e",
                        "text-dark-primary": "#f8f5f6",
                        "text-dark-secondary": "#b4a9ad",
                        "border-light": "#e8ced5",
                        "border-dark": "#442d34",
                        "surface-light": "#fcf8f9",
                        "surface-dark": "#2b161a",
                        "interactive-light": "#f4e7ea",
                        "interactive-dark": "#3c2328"
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
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>

@extends('layouts.main')

@section('content')
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center py-5 px-4 sm:px-8 md:px-12 lg:px-20">
                <div class="layout-content-container flex w-full max-w-6xl flex-1 gap-8">

                    <!-- Main Content -->
                    <main class="flex flex-1 flex-col gap-6 p-2 md:p-6">
                        <!-- PageHeading -->
                        <header class="flex flex-wrap justify-between gap-3">
                            <div class="flex min-w-72 flex-col gap-2">
                                <h1
                                    class="text-text-light-primary dark:text-text-dark-primary text-4xl font-black leading-tight tracking-tighter">
                                    Theme Mode</h1>
                                <p
                                    class="text-text-light-secondary dark:text-text-dark-secondary text-base font-normal leading-normal">
                                    Choose how the application looks. Your choice will be saved for this device.</p>
                            </div>
                        </header>
                        <!-- ActionPanel -->
                        <section class="p-0 @container">
                            <div
                                class="flex flex-1 flex-col items-start justify-between gap-4 rounded-xl border border-border-light bg-surface-light p-5 dark:border-border-dark dark:bg-surface-dark @[480px]:flex-row @[480px]:items-center">
                                <div class="flex flex-col gap-1">
                                    <p
                                        class="text-text-light-primary dark:text-text-dark-primary text-base font-bold leading-tight">
                                        Appearance</p>
                                    <p
                                        class="text-text-light-secondary dark:text-text-dark-secondary text-base font-normal leading-normal">
                                        Toggle between light and dark mode.</p>
                                </div>
                                <label
                                    class="relative flex h-[31px] w-[51px] cursor-pointer items-center rounded-full border-none bg-interactive-light p-0.5 has-[:checked]:justify-end has-[:checked]:bg-primary dark:bg-interactive-dark">
                                    <div class="h-full w-[27px] rounded-full bg-white"
                                        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px, rgba(0, 0, 0, 0.06) 0px 3px 1px;">
                                    </div>
                                    <input id="checkox_theme" class="invisible absolute" onchange="changeTheme()"
                                        type="checkbox" />
                                </label>
                            </div>
                        </section>
                        <!-- Theme Options -->
                        <section class="grid grid-cols-1 gap-4 @container sm:grid-cols-2">
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-primary bg-primary/10 p-5 dark:bg-primary/20">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-primary"
                                        style="font-variation-settings: 'FILL' 1;">light_mode</span>
                                    <h3 class="text-base font-bold text-primary">Light Mode</h3>
                                </div>
                                <p class="text-text-light-secondary dark:text-text-dark-secondary text-sm">A bright,
                                    clean interface that's easy on the eyes in well-lit environments.</p>
                            </div>
                            <div
                                class="flex flex-col gap-4 rounded-xl border border-border-light bg-surface-light p-5 dark:border-border-dark dark:bg-surface-dark">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="material-symbols-outlined text-text-light-primary dark:text-text-dark-primary">dark_mode</span>
                                    <h3 class="text-text-light-primary dark:text-text-dark-primary text-base font-bold">
                                        Dark Mode</h3>
                                </div>
                                <p class="text-text-light-secondary dark:text-text-dark-secondary text-sm">A darker,
                                    more cinematic look that's perfect for low-light conditions.</p>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script>
        let theme = JSON.parse(localStorage.getItem('theme'));
        if (theme === null) {
            localStorage.setItem('theme', JSON.stringify('light'));
        } else if (theme !== null && theme === "light") {
        } else if (theme !== null && theme === 'dark') {
            document.querySelector("#checkox_theme").checked = true;
            document.querySelector('html').classList.add('dark');
        }
        const changeTheme = () => {
            theme = JSON.parse(localStorage.getItem('theme'));
            document.documentElement.classList.toggle('dark');
            console.log(theme);
            if (theme === null) {
                localStorage.setItem('theme', JSON.stringify('light'));
            } else if (theme !== null && theme === "light") {
                localStorage.setItem('theme', JSON.stringify('dark'));
                document.querySelector('html').classList.add('dark');
            } else if (theme !== null && theme === 'dark') {
                document.querySelector('html').classList.remove('dark');
                localStorage.setItem('theme', JSON.stringify('light'));
            }
        }
    </script>
@endsection

</html>