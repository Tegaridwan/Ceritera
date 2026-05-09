<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceritamu - Ceritara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#a0c8e0] h-full flex flex-col">
    <div class="bg-[#1b2e3e] px-5 py-4 flex items-center gap-3 shadow-md">

        <span
            onclick="window.location.href='{{ route('posts.index') }}';"
            class="text-[15px] text-[#90b8cc] font-medium cursor-pointer hover:text-white transition">
            ← Beranda
        </span>

        <span class="text-[#4a7a9a] text-[15px]">|</span>

        <span class="text-[#cce4f0] text-[15px] font-semibold">
            Ceritamu
        </span>
    </div>
    <div class="max-w-2xl mx-auto mt-8 bg-white rounded-3xl shadow-xl p-10 text-center transition-all duration-300 hover:shadow-2xl">

        <!-- ICON -->
        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-blue-100 flex items-center justify-center">

        <button onclick="window.location.href='{{ route('posts.create') }}';" class="w-full h-full flex items-center justify-center rounded-full hover:bg-blue-600 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-10 h-10 text-blue-600">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
         </button>
        </button>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-3">
            Tambah Cerita Baru
        </h2>
    </div>
</body>

</html>