<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LuvHub Admin - Report Management</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24
        }

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

        /* Active state style */
        .nav-item.active {
            background-color: rgba(244, 37, 89, 0.1);
            color: #f42559;
            border-right: 3px solid #f42559;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f42559",
                        "primary-hover": "#d61c4b",
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
</head>

@extends('layouts.main_admin')
@section('admin_content')
    {{-- @dd($reports) --}}
    <main class="sm:ml-64 min-h-screen transition-all duration-300">
        <div class="p-6 lg:p-10">
            <!-- SECTION: REPORT MANAGEMENT CONTENT -->
            <div id="view-reports" class="w-full max-w-7xl mx-auto fade-in">
                <header class="flex flex-wrap items-center justify-between gap-3 mb-8">
                    <div>
                        <h1 class="text-gray-900 dark:text-gray-50 text-4xl font-black leading-tight tracking-[-0.033em]">
                            Report Center</h1>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Review flagged content and user reports.</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2.5 rounded-full font-bold text-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">history</span>
                            History
                        </button>
                    </div>
                </header>

                <!-- Report Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-yellow-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Pending Review</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white"> {{ $total_pending }}</h3>
                        <p class="text-xs text-yellow-600 font-medium mt-1">Requires attention</p>
                    </div>
                    <div
                        class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-primary shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Reject</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $total_reject }}</h3>
                        <p class="text-xs text-primary font-medium mt-1">Nonsense report</p>
                    </div>
                    <div
                        class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-green-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Resolved Today</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $total_done }}</h3>
                        <p class="text-xs text-green-600 font-medium mt-1">+{{ $total_done_today }} in today</p>
                    </div>
                    <div
                        class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-gray-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Total Reports</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">{{ $total_report }}</h3>
                        <p class="text-xs text-gray-400 font-medium mt-1">All time</p>
                    </div>
                </div>

                <!-- Report Table -->
                <div
                    class="card bg-white dark:bg-[#1a0c10] rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-900/50">
                                <tr>
                                    <th class="px-6 py-4 font-bold">Reported User</th>
                                    <th class="px-6 py-4 font-bold">Reason</th>
                                    <th class="px-6 py-4 font-bold">Reporter</th>
                                    <th class="px-6 py-4 font-bold">Date</th>
                                    <th class="px-6 py-4 font-bold text-center">Status</th>
                                    <th class="px-6 py-4 font-bold text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                <!-- Item 1 -->
                                @if ($reports !== null || count($reports) > 0)
                                    @foreach ($reports as $report)
                                        <tr
                                            class="bg-white dark:bg-[#1a0c10] hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <img class="w-8 h-8 rounded-full"
                                                        src="{{ $report->user_image == null || $report->user_image == "" ? asset('upload/Default_profile.png') : asset('storage/' . $report->user_image) }}"
                                                        alt="Target">
                                                    <div>
                                                        <div class="font-bold text-gray-900 dark:text-white">
                                                            {{ $report->user_been_reported_name }}
                                                        </div>
                                                        <div class="text-xs text-gray-500">ID:
                                                            {{ substr($report->user_id, 0, 8) }}...
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2 text-red-500 font-medium">
                                                    <span class="material-symbols-outlined text-[16px]">warning</span>
                                                    {{ $report->report_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-gray-500">{{ $report->user_created_name }}</td>
                                            <td class="px-6 py-4">{{ $report->date_report }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @if ($report->status == "pending")
                                                    <span
                                                        class="px-2 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800">Pending</span>
                                                @elseif($report->status == "done")
                                                    <span
                                                        class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">Done</span>
                                                @else
                                                    <span
                                                        class="px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">Reject</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="{{ route('review_report.get', ["report_id" => $report->report_id]) }}">
                                                    <button
                                                        class="text-primary hover:text-primary-hover font-bold text-xs uppercase border border-primary px-3 py-1 rounded hover:bg-primary hover:text-white transition-all">Review</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center justify-between">
                        <span class="text-sm text-gray-500">Page {{ $page }} of {{ $total_page ==0 ? 1 : $total_page }}</span>
                        <div class="flex gap-2">
                            @if ($page > 1)
                                <a href="{{ route('dashboard.get') }}?page={{ $page - 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Prev</button>
                                </a>
                            @endif
                            @if ($page < $total_page)
                                <a href="{{ route('dashboard.get') }}?page={{ $page + 1 }}">
                                    <button
                                        class="px-3 py-1 text-sm border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Next</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

</html>