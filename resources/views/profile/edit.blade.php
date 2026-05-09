<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> -->

    <div class="min-h-screen bg-[#a0c8e0]">
        <div class="w-full bg-[#1b2e3e] px-5 py-4 flex items-center gap-3 shadow-md">

                        <span
                            onclick="window.location.href='{{ route('posts.index') }}';"
                            class="text-[15px] text-[#90b8cc] font-medium cursor-pointer hover:text-white transition">
                            ← Beranda
                        </span>

                        <span class="text-[#4a7a9a] text-[15px]">|</span>

                        <span class="text-[#cce4f0] text-[15px] font-semibold">
                            Profil
                        </span>

                    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-6">
            <div class="p-4 sm:p-8 bg-[#1e3448] text-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#1e3448] text-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#1e3448] text-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
