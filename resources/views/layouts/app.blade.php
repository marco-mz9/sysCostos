<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    @yield('scripts-head')
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 md:pl-56">

    <header class="flex items-center h-20 md:h-auto" x-data="{ open: false }">
        <nav class="relative flex items-center w-full px-4">
            <!-- Mobile Header -->
            <div class="inline-flex items-center justify-center w-full md:hidden">
                <a href="#" @click="open = true" @click.away="open = false" class="absolute left-0 pl-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 stroke-blue-600" fill="currentColor"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"/>
                    </svg>
                </a>
            </div>

            @include('layouts.sidebar')

        </nav>
    </header>

    <!-- Page Heading -->
    <div class="h-18 py-3.5 bg-blue-100">
        <div class="w-full px-3.5 mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="flex-[0_0_100%] max-w-full w-full relative px-3.5">
                    <!-- Breadcrumbs -->
                    <nav class="float-right items-center">
                        <div class="hidden sm:flex sm:items-center sm:ml-6 right-0.5">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <main class="container min-h-[200px] pt-4 w-full px-4 mx-auto">
        {{ $slot }}
    </main>

</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
@yield('scripts')
</body>
</html>
