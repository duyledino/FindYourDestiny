<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    @include('layouts.header')

    {{-- this parent layout and children page when extend it --}}
    @yield('content') {{-- child content will be injected here --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @include('toast.toast-script')
    
    @include('layouts.footer')
</body>
