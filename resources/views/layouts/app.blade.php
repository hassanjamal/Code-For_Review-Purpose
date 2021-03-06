<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QuickerNotes') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    @livewireStyles
</head>
<body>
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
    <!-- Off-canvas menu for mobile -->
    @include('shared.menus.main-mobile')

    <!-- Static sidebar for desktop -->
    @include('shared.menus.main')

    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                    <!-- Todo: Add this when client search site wide is possible after removal of inertia.js -->
                    {{--                    <div class="w-full flex md:ml-0">--}}
{{--                        <label for="search_field" class="sr-only">Search Clients...</label>--}}
{{--                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">--}}
{{--                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">--}}
{{--                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                            <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 sm:text-sm" placeholder="Search Clients" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <button class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline">
                                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-brand-light">
                                  <span class="text-md font-medium leading-none text-white">{{auth()->user()->initials}}</span>
                                </span>
                            </button>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <a href="{{route('settings')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Settings</a>
                                <a href="#" onclick="document.getElementById('logout').submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">Sign out</a>
                                <form class="hidden" id="logout" action="{{route('logout')}}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0" x-data x-init="$el.focus()">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <h1 class="text-2xl font-semibold text-gray-900">{{$title ?? ''}}</h1>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <!-- Replace with your content -->
                <div class="py-4">
                    <div>
                        @yield('content')
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>
</div>
    @livewireScripts
</body>
</html>
