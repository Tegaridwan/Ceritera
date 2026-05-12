<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Ceritera</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-b from-[#C4B5FD] from-[16%] to-[#DDD6FE] to-[92%] bg-fixed bg-no-repeat flex flex-col">

    <!-- Navbar -->
    <nav class="bg-[#402988] shadow-sm px-8 py-5">
        <a href="/" class="text-2xl text-white font-bold">
            Ceritera
        </a>
    </nav>

    <!-- Login Box -->
    <div class="flex flex-1 items-center justify-center px-4">

        <div class="w-full max-w-md p-8 shadow-lg bg-white rounded-2xl">

            <h1 class="text-3xl text-center font-semibold">
                Welcome Back
            </h1>

            <p class="text-sm text-gray-400 text-center mb-6">
                Please enter your details to sign in to your account.
            </p>

            <hr class="mt-3 mb-5">

            <!-- Session Status -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">

                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-base mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        class="border w-full text-base px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a6fc4]"
                        placeholder="Masukkan Email...">

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-base mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="border w-full text-base px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a6fc4]"
                        placeholder="Masukkan Password...">

                    <!-- <button type="button" data-toggle-password='{ "target": "#password" }' class="block cursor-pointer" aria-label="password toggle">
                        <span class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-5 shrink-0"></span>
                        <span class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-5 shrink-0"></span>
                    </button> -->

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-[#3a6fc4] shadow-sm focus:ring-[#3a6fc4]">

                        <span class="text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-[#3a6fc4] hover:underline">
                        Forgot Password?
                    </a>
                    @endif

                </div>

                <!-- Button -->
                <div class="mt-5">
                    <button
                        type="submit"
                        class="w-full bg-[#402988] hover:bg-[#321f6a] text-white font-semibold py-2 rounded-lg transition duration-200">
                        Sign In
                    </button>
                </div>

                <!-- <div class="input max-w-sm ">
                    <input id="toggle-password" type="password" placeholder="Enter password" value="Pwd_1242@mA1" />
                    <button type="button" data-toggle-password='{ "target": "#toggle-password" }' class="block cursor-pointer" aria-label="password toggle">
                        <span class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-5 shrink-0"></span>
                        <span class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-5 shrink-0"></span>
                    </button>
                </div> -->

            </form>

            <!-- Register -->
            <p class="text-sm text-center mt-5">
                Don't have an account?

                <a
                    href="{{ route('register') }}"
                    class="text-[#402988] hover:underline">
                    Create an account
                </a>
            </p>

        </div>

    </div>

</body>

</html>