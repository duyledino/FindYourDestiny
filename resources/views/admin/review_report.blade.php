<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Review User Report - Admin Panel</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "primary-dark": "#d91e4b",
                        "background-light": "#f8f5f6",
                        "background-dark": "#221014",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d1b20",
                        "text-main-light": "#1c0d11",
                        "text-main-dark": "#f8f5f6",
                        "text-secondary-light": "#9c495e",
                        "text-secondary-dark": "#d4aab7",
                        "border-light": "#e8ced5",
                        "border-dark": "#4a2d36",
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
        body {
            font-family: 'Manrope', sans-serif;
        }

        /* Hide scrollbar for clean UI */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #e8ced5;
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #4a2d36;
        }
    </style>
</head>

@extends('layouts.main_admin')

@section('admin_content')
    {{-- @dd($report) --}}
    <form id="update_report" action="{{ route('review_report.post') }}" method="post"
        class="sm:ml-64 flex-1 flex flex-col h-screen overflow-y-auto relative">
        @csrf
        <input type="hidden" name="report_id" value="{{ $report->report_id }}">
        <div
            class="lg:hidden flex items-center justify-between p-4 border-b border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark sticky top-0 z-20">
            <h1 class="font-bold text-lg">Review Report</h1>
            {{-- <button class="p-2 text-text-main-light dark:text-text-main-dark">
                <span class="material-symbols-outlined">menu</span>
            </button> --}}
        </div>
        <div class="flex-1 max-w-7xl mx-auto w-full p-4 md:p-8 lg:p-12 pb-32">
            <!-- Breadcrumbs & Actions -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2
                        class="text-3xl md:text-4xl font-black tracking-tight text-text-main-light dark:text-text-main-dark">
                        Review User Report
                    </h2>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('reports.get') }}">
                        <button type="button"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-surface-dark text-text-main-light dark:text-text-main-dark font-medium text-sm hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <span class="material-symbols-outlined text-base">arrow_back</span>
                            Back to List
                        </button>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Left Column: Report Content (8 cols) -->
                <div class="lg:col-span-8 flex flex-col gap-6">
                    <!-- Main Report Details Card -->
                    <div
                        class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark overflow-hidden">
                        <div
                            class="p-6 border-b border-border-light dark:border-border-dark flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-text-main-light dark:text-text-main-dark mb-1">
                                    {{ $report->report_name }}
                                </h3>
                                <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark">
                                    Report ID: <span
                                        class="font-mono text-text-main-light dark:text-text-main-dark">{{ $report->report_id }}</span>
                                    <br>
                                    Created: <span
                                        class="font-medium text-text-main-light dark:text-text-main-dark">{{ $report->date_report }}</span>
                                </p>
                            </div>
                            <div
                                class="px-3 py-1 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs font-bold uppercase tracking-wide border border-yellow-200 dark:border-yellow-800">
                                {{ $report->status }}
                            </div>
                        </div>
                        <div class="p-6">
                            <label
                                class="block text-xs font-bold text-text-secondary-light dark:text-text-secondary-dark uppercase tracking-wider mb-2">Nội
                                dung report</label>
                            <p class="text-base leading-relaxed text-text-main-light dark:text-text-main-dark mb-6">
                                {{ $report->content }}
                            </p>
                            <label
                                class="block text-xs font-bold text-text-secondary-light dark:text-text-secondary-dark uppercase tracking-wider mb-3">Attached
                                Evidence</label>
                            <div
                                class="relative group overflow-hidden border border-border-light dark:border-border-dark bg-gray-100 dark:bg-black/20">
                                <!-- Blurred Image Overlay -->
                                <div
                                    class="absolute inset-0 backdrop-blur-md bg-white/30 dark:bg-black/30 flex flex-col items-center justify-center z-10 transition-opacity duration-300 opacity-100 group-hover:opacity-0 pointer-events-none">
                                    <span
                                        class="material-symbols-outlined text-4xl text-text-main-light dark:text-text-main-dark mb-2">visibility_off</span>
                                    <p
                                        class="text-sm font-bold text-text-main-light dark:text-text-main-dark bg-white/80 dark:bg-black/60 px-3 py-1 rounded-full backdrop-blur-sm">
                                        Sensitive Content</p>
                                </div>
                                <!-- Actual Image -->
                                <img alt="Evidence screenshot showing chat interface on a mobile device"
                                    class="w-full h-full object-contain max-h-[500px]"
                                    data-alt="Blurred screenshot of a chat conversation showing potentially inappropriate content"
                                    src="{{ $report->report_image == null || $report->report_image == "" ? asset("upload/Pictures_Not_Yet_Available.png") : asset("storage/" . $report->report_image) }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column: People & Actions (4 cols) -->
                <div class="lg:col-span-4 flex flex-col gap-6">
                    <!-- Action Card (Sticky on desktop) -->
                    <div
                        class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6 sticky top-6 z-10">
                        <h4 class="text-lg font-bold mb-4">Resolution</h4>
                        <div class="flex flex-col gap-4">
                            <div>
                                <label
                                    class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Update
                                    Status</label>
                                <div class="relative">
                                    <select name="status"
                                        class="w-full h-12 pl-4 pr-10 rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main-light dark:text-text-main-dark focus:ring-2 focus:ring-primary focus:border-transparent appearance-none cursor-pointer font-medium">
                                        <option @if ($report->status == "pending") selected @endif value="pending">Pending
                                        </option>
                                        <option @if ($report->status == "reject") selected @endif value="reject">Reject Report
                                            (No Violation)</option>
                                        <option @if ($report->status == "done") selected @endif value="done">Done (User
                                            Ban/Warn)</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-text-secondary-light dark:text-text-secondary-dark">
                                        <span class="material-symbols-outlined">expand_more</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Note
                                    của admin (Optional)</label>
                                <textarea name="note"
                                    class="w-full p-3 rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-text-main-light dark:text-text-main-dark focus:ring-2 focus:ring-primary focus:border-transparent text-sm min-h-[100px]"
                                    placeholder="Add context for this decision...">{{ $report->note }}</textarea>
                            </div>
                            <button type="submit" form="update_report"
                                class="w-full h-12 flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-primary-dark text-white font-bold transition-colors shadow-lg shadow-primary/20 mt-2">
                                <span class="material-symbols-outlined text-xl">check</span>
                                Save Changes
                            </button>
                        </div>
                    </div>
                    <div
                        class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-primary/20 dark:border-primary/20 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-1 h-full bg-primary"></div> <!-- Indicator strip -->
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-4">
                                <h4
                                    class="text-sm font-bold uppercase tracking-wider text-text-secondary-light dark:text-text-secondary-dark">
                                    Reported User</h4>
                                <span class="material-symbols-outlined text-primary" title="Accused">warning</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <div class="w-24 h-24 rounded-full bg-cover bg-center mb-3 ring-4 ring-primary/10"
                                    data-alt="Portrait of the reported user, a young man smiling"
                                    style="background-image: url('{{ $report->user_image == null || $report->user_image == "" ? asset("upload/Default_profile.png") : asset("storage/" . $report->user_image) }}');">
                                </div>
                                <h3 class="text-lg font-bold text-text-main-light dark:text-text-main-dark">
                                    {{ $report->user_name }}
                                </h3>
                                <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark mb-4">
                                    ID:{{ $report->user_id }}</p>
                                <div class="grid grid-cols-2 gap-2 w-full mb-4">
                                    <div class="bg-background-light dark:bg-background-dark p-2 rounded text-center">
                                        <span
                                            class="block text-xs text-text-secondary-light dark:text-text-secondary-dark">Số
                                            lần bị report</span>
                                        <span class="font-bold text-sm text-primary">{{ $report->report_time }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1.5 w-full">
                                    <button type="submit" form="ban_user_form"
                                        class="w-full h-12 flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-primary-dark text-white font-bold transition-colors shadow-lg shadow-primary/20 mt-2">
                                        <span class="material-symbols-outlined text-xl">check</span>
                                        Ban {{ $report->user_name }}
                                    </button>

                                    <button type="button"
                                        class="w-full py-2 rounded-lg bg-background-light dark:bg-background-dark hover:bg-border-light dark:hover:bg-border-dark text-text-main-light dark:text-text-main-dark text-sm font-bold transition-colors">
                                        View Full Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reporter (Whistleblower) -->
                    <div
                        class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark overflow-hidden">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-4">
                                <h4
                                    class="text-sm font-bold uppercase tracking-wider text-text-secondary-light dark:text-text-secondary-dark">
                                    Reporter</h4>
                                <span class="material-symbols-outlined text-blue-500" title="Reporter">info</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-cover bg-center shrink-0"
                                    data-alt="Portrait of the reporter, a young woman"
                                    style="background-image: url('{{ $report->user_created_image == null || $report->user_created_image == "" ? asset("upload/Default_profile.png") : asset("storage/" . $report->user_created_image) }}');">
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <h3 class="text-base font-bold text-text-main-light dark:text-text-main-dark truncate">
                                        {{ $report->user_created_name }}
                                    </h3>
                                    <p class="text-xs text-text-secondary-light dark:text-text-secondary-dark">
                                        ID:{{ $report->user_created_id }}</p>
                                </div>
                                <button
                                    class="ml-auto p-2 rounded-full hover:bg-background-light dark:hover:bg-background-dark text-text-secondary-light dark:text-text-secondary-dark transition-colors">
                                    <span class="material-symbols-outlined text-xl">open_in_new</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- trick to submit 2 individual forms --}}
    <form id="ban_user_form" action="{{ route('ban_user.post') }}" method="post" hidden>
        @csrf
        <input name="user_id" value="{{ $report->user_id }}">
        <input name="report_id" value="{{ $report->report_id }}">
    </form>
@endsection

</html>