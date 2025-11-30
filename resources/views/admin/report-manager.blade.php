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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200 overflow-x-hidden">

    <!-- Sidebar Navigation -->
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white dark:bg-[#1a0c10] border-r border-gray-200 dark:border-gray-800">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <!-- Logo Area -->
            <div class="flex items-center gap-3 mb-10 px-4">
                <div class="size-8 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-gray-900 dark:text-white tracking-tight">LuvHub<span class="text-primary text-xs ml-1 font-medium">Admin</span></h2>
            </div>

            <!-- Navigation Links -->
            <ul class="space-y-2 font-medium">
                <li>
                    <!-- Link tới trang User -->
                    <a href="{{ route('admin.dashboard') }}" class="nav-item flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">group</span>
                        <span class="ml-3">User Management</span>
                    </a>
                </li>
                <li>
                    <!-- Link tới trang hiện tại (Report) -->
                    <a href="report_manager.php" class="nav-item active flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">flag</span>
                        <span class="ml-3">Reports</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-auto text-sm font-medium text-white bg-primary rounded-full">3</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#" class="nav-item flex w-full items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 group transition-all">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="ml-3">Settings</span>
                    </a>
                </li> -->
            </ul>

            <!-- Bottom Action -->
            <div class="absolute bottom-0 left-0 w-full p-4 border-t border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?img=68" alt="Admin Avatar">
                    <div>
                        <div class="text-sm font-bold text-gray-900 dark:text-white">Duy Le</div>
                        <div class="text-xs text-gray-500">duyle@luvhub.com</div>
                    </div>
                    <button class="ml-auto text-gray-400 hover:text-primary">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="sm:ml-64 min-h-screen transition-all duration-300">
        <div class="p-6 lg:p-10">
            
            <!-- SECTION: REPORT MANAGEMENT CONTENT -->
            <div id="view-reports" class="w-full max-w-7xl mx-auto fade-in">
                <header class="flex flex-wrap items-center justify-between gap-3 mb-8">
                    <div>
                        <h1 class="text-gray-900 dark:text-gray-50 text-4xl font-black leading-tight tracking-[-0.033em]">Report Center</h1>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Review flagged content and user reports.</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2.5 rounded-full font-bold text-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">history</span>
                            History
                        </button>
                    </div>
                </header>

                <!-- Report Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-yellow-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Pending Review</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">24</h3>
                        <p class="text-xs text-yellow-600 font-medium mt-1">Requires attention</p>
                    </div>
                    <div class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-primary shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">High Priority</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">5</h3>
                        <p class="text-xs text-primary font-medium mt-1">Harassment/Scam</p>
                    </div>
                    <div class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-green-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Resolved Today</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">12</h3>
                        <p class="text-xs text-green-600 font-medium mt-1">+4 from yesterday</p>
                    </div>
                    <div class="card p-6 rounded-xl bg-white dark:bg-[#1a0c10] border border-gray-200 dark:border-gray-800 border-l-4 border-l-gray-500 shadow-sm">
                        <p class="text-gray-500 text-xs font-bold uppercase mb-1">Total Reports</p>
                        <h3 class="text-3xl font-black text-gray-900 dark:text-white">892</h3>
                        <p class="text-xs text-gray-400 font-medium mt-1">All time</p>
                    </div>
                </div>

                <!-- Report Table -->
                <div class="card bg-white dark:bg-[#1a0c10] rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-900/50">
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
                                <tr class="bg-white dark:bg-[#1a0c10] hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/150?img=4" alt="Target">
                                            <div>
                                                <div class="font-bold text-gray-900 dark:text-white">John Doe</div>
                                                <div class="text-xs text-gray-500">ID: #8823</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-red-500 font-medium">
                                            <span class="material-symbols-outlined text-[16px]">warning</span>
                                            Harassment
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">Sarah Smith</td>
                                    <td class="px-6 py-4">Just now</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">Critical</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-primary hover:text-primary-hover font-bold text-xs uppercase border border-primary px-3 py-1 rounded hover:bg-primary hover:text-white transition-all">Review</button>
                                    </td>
                                </tr>
                                <!-- Item 2 -->
                                <tr class="bg-white dark:bg-[#1a0c10] hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/150?img=52" alt="Target">
                                            <div>
                                                <div class="font-bold text-gray-900 dark:text-white">Mike Ross</div>
                                                <div class="text-xs text-gray-500">ID: #9120</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-gray-700 dark:text-gray-300">
                                            <span class="material-symbols-outlined text-[16px]">block</span>
                                            Fake Profile
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">Anonymous</td>
                                    <td class="px-6 py-4">2 hrs ago</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-500 hover:text-gray-900 dark:hover:text-white font-bold text-xs uppercase border border-gray-300 dark:border-gray-700 px-3 py-1 rounded hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">View</button>
                                    </td>
                                </tr>
                                <!-- Item 3 -->
                                <tr class="bg-white dark:bg-[#1a0c10] hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors opacity-60">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <img class="w-8 h-8 rounded-full grayscale" src="https://i.pravatar.cc/150?img=12" alt="Target">
                                            <div>
                                                <div class="font-bold text-gray-900 dark:text-white">Alex Wong</div>
                                                <div class="text-xs text-gray-500">ID: #1122</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 text-gray-500">
                                            <span class="material-symbols-outlined text-[16px]">money_off</span>
                                            Scam Attempt
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">System</td>
                                    <td class="px-6 py-4">Yesterday</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">Resolved</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="text-xs text-green-600 font-bold">BANNED</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>