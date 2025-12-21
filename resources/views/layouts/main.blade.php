<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #221014;
        }

        ::-webkit-scrollbar-thumb {
            background: #49222c;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #f42559;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display h-screen text-gray-800 dark:text-gray-200">
    @include('layouts.header')

    {{-- this parent layout and children page when extend it --}}
    @yield('content') {{-- child content will be injected here --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('toast.toast-script')

    {{-- @dd(url()->current()); --}}
    @if (str_contains(url()->current(), 'message') === false)
        @include('layouts.footer')
    @endif
</body>