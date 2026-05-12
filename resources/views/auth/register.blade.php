<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Ceritera</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-b from-[#C4B5FD] from-[16%] to-[#DDD6FE] to-[92%] bg-fixed bg-no-repeat flex flex-col">
    <!-- <nav class="bg-white shadow-sm px-8 py-5">
        <a href="#" class="text-2xl text-[#3a6fc4]">Ceritera</a>
    </nav> -->
    <div class="flex flex-1 items-center justify-center px-4">
        <div class="w-96 p-8 shadow-lg bg-white rounded-2xl">
            <h1 class="text-3xl block text-center font-semibold">Create Account</h1>
            <p class="text-sm text-gray-400 text-center mb-6">Join our community of readers and writers today.</p>
            <hr class="mt-3">
            <form action="{{ route('register') }}" method="post" class="space-y-4">
                @csrf
                <div class="mt-3">
                    <label for="name" class="block text-base mb-2">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"  class="border w-full  rounded-lg text-base px-2 py-1 focus:outline-none focus:ring-2 focus:border-gray-600" placeholder="Masukan Nama...." />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="border w-full  rounded-lg text-base px-2 py-1 focus:outline-none focus:ring-2 focus:border-gray-600" placeholder="Masukan Email...." />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="border w-full  rounded-lg text-base px-2 py-1 focus:outline-none focus:ring-2 focus:border-gray-600" placeholder="Masukan Password...." />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password_confirmation" class="block text-base mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="border w-full rounded-lg text-base px-2 py-1 focus:outline-none focus:ring-2 focus:border-gray-600" placeholder="Masukan Password...." />
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit" class="w-full bg-[#402988] hover:bg-[#321f6a] text-white font-semibold py-2 rounded-lg transition duration-200">Create Account</button>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-[#402988] hover:underline">Login here</a></p>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
