<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }} | APP NAME</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Markdown Editor --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200" data-scroll-x="0">
    {{-- LOGOUT VERIFICATION MODAL --}}
    <x-cms.modal-logout-verification />

    {{-- Confirmation Modal --}}
    <x-cms.modal-confirmation />

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>
            <div class="ml-5 pt-5">App Keren</div>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main class="mx-5">
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <div class="hidden-when-collapsed p-5 pt-3">
                <div class="flex gap-2">
                    <img src="{{ asset('assets/default-logo.svg') }}" alt="Default Logo" class="mt-1" width="30" />
                    <span class="font-bold text-3xl mr-3 bg-gradient-to-r from-purple-500 to-pink-300 bg-clip-text text-transparent">
                        {{ $settings->name }}
                    </span>
                </div>
            </div>

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-menu-separator />
                    @php
                        $user->photo = 'https://picsum.photos/200?x=1033936989';
                    @endphp
                    <x-mary-list-item :item="$user" value="name" avatar="photo" no-separator no-hover class="rounded">
                        <x-slot:actions>
                            <x-mary-dropdown>
                                <x-slot:trigger>
                                    <x-mary-button icon="o-cog" class="btn-circle btn-ghost" />
                                </x-slot:trigger>
                                <x-mary-menu-item title="Profile" icon="o-user" link="{{ route('profile.edit') }}" />
                                <x-mary-menu-item title="Logout" icon="o-power" no-wire-navigate onclick="logoutVerificationModal.showModal()" />
                            </x-mary-dropdown>
                        </x-slot:actions>
                    </x-mary-list-item>

                    <x-mary-menu-separator />
                @endif

                {{-- Navigation --}}
                <x-cms.navigation />
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            <!-- HEADER -->
            <x-mary-header title="{{ $settings->name }}" size="text-xl" separator progress-indicator>
                <x-slot:actions>
                    {{-- Theme --}}
                    <x-mary-theme-toggle />
                </x-slot:actions>
            </x-mary-header>

            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{-- Toast --}}
    <x-mary-toast />
    @livewireScripts
    <x-cms.javascripts />
</body>
