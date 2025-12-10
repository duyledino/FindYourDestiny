<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-3xl shadow-xl w-full max-w-md p-8 text-center">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-50 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="h-10 w-10 text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment Failed</h2>
        <p class="text-gray-500 mb-6">
            We couldn't process your payment. Your card has not been charged.
        </p>

        <div class="bg-red-50 rounded-lg p-3 mb-8 border border-red-100 inline-block">
            <p class="text-xs text-red-600 font-mono">Error: Insufficient Funds (Code 4002)</p>
        </div>

        <div class="space-y-3">
            <a href="{{ route('checkout.get') }}"
                class="block w-full rounded-full bg-[#f42559] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-[#f42559]/30 transition-all hover:bg-[#d91d4a] focus:ring-2 focus:ring-[#f42559] focus:ring-offset-2">
                Try Payment Again
            </a>

            <a href="/contact" class="block text-sm text-gray-400 hover:text-gray-600 mt-4 transition-colors">
                Contact Support
            </a>
        </div>
    </div>

</body>
