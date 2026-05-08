<!DOCTYPE html>
<html class="h-full">
<head>
    <title>App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#a0c8e0] h-full flex flex-col">

@include('layouts.navigation')

<div class="p-6 flex-1">
    @yield('content')
</div>

<footer class="bg-[#1b2e3e] p-4 border-t border-gray-200 w-full mt-auto">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="text-[#cce4f0] text-xl font-bold">Ceritera</a>
        </div>
        <div class="text-gray-600 px-4 py-2">
            &copy; 2026 Ceritera. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>