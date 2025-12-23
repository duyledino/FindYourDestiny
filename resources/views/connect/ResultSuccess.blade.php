<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div
        class="bg-white rounded-3xl shadow-xl w-full max-w-md overflow-hidden transform transition-all hover:scale-[1.01] duration-300">

        <div class="h-2 w-full bg-[#f42559]"></div>

        <div class="p-8 text-center">
            <div
                class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#f42559]/10 mb-6 animate-bounce-slow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="h-10 w-10 text-[#f42559]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful!</h2>
            <p class="text-gray-500 mb-8">Thank you! Your connects have been added to your account.</p>
            @php
                $cost = request()->query("vnp_Amount") / 100;
            @endphp
            <div class="bg-gray-50 rounded-xl p-4 mb-8 border border-gray-100">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500">Amount Paid</span>
                    <span class="font-bold text-gray-800 text-lg">{{ $cost . " VND" ?? "N/A"}}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-500">Connects Added</span>
                    @if($cost == 20000)
                        <span class="font-bold text-[#f42559]">+25 Connect</span>
                    @elseif($cost == 50000)
                        <span class="font-bold text-[#f42559]">+70 Connect</span>
                    @else
                        <span class="font-bold text-[#f42559]">+150 Connect</span>
                    @endif
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">Transaction ID</span>
                    <span class="text-xs font-mono text-gray-400">#TRX-8859201</span>
                </div>
            </div>
            <div class="space-y-3">
                <a href="{{ route('checkout.get') }}"
                    class="block w-full rounded-full bg-[#f42559] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-[#f42559]/30 transition-all hover:bg-[#d91d4a] hover:shadow-[#f42559]/50 focus:outline-none focus:ring-2 focus:ring-[#f42559] focus:ring-offset-2">
                    Continue to LuvHub
                </a>

            </div>
        </div>
    </div>

</body>

</html>