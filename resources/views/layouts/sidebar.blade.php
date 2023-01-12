<!-- Sidebar Menu -->
<div :class="{ '!translate-x-0': open }"
     class="fixed top-0 left-0 z-20 w-9/12 h-screen bg-blue-100 overflow-y-auto transition duration-300 ease-in-out transform -translate-x-full bg-white shadow-2xl sm:w-56 md:translate-x-0">
    <!-- Sidebar Header -->
    <div class="flex items-center h-20">
        <div class="inline-flex items-center justify-center w-full md:justify-center">
            <!-- Hamburger -->
            <a href="#" @click="open = !open"
               class="absolute right-0 top-0 mr-1.5 mt-1.5 inline-flex p-1 items-center justify-center rounded-md hover:bg-blue-100 md:hidden">
                <i class="fas fa-home"></i>
            </a>
            <!-- Logo -->
            <a href="#">
                <x-application-logo class="block h-24 w-auto fill-current text-gray-600"/>
            </a>
        </div>
    </div>
    <!-- Navigation Links -->
    <div class="flex flex-col mb-0 ml-0">
        <x-sidebar-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </x-slot>
            {{ __('Dashboard') }}
        </x-sidebar-nav-link>

        <x-sidebar-nav-link :href="route('purchases.index')" :active="request()->routeIs('purchases.index')">
            <x-slot name="icon">
                <i class="fa fa-edit mr-3"></i>
            </x-slot>
            {{ __('Egresos') }}
        </x-sidebar-nav-link>
        <x-sidebar-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
            <x-slot name="icon">
                <i class="fas fa-cash-register mr-3"></i>
            </x-slot>
            {{ __('Ventas') }}
        </x-sidebar-nav-link>
        <x-sidebar-nav-link :href="route('report.order')" :active="request()->routeIs('report.order')">
            <x-slot name="icon">
                <i class="fas fa-list mr-3"></i>
            </x-slot>
            {{ __('Reportes Ventas') }}
        </x-sidebar-nav-link>
        <x-sidebar-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
            <x-slot name="icon">
                <i class="fas fa-list mr-3"></i>
            </x-slot>
            {{ __('Reportes Compras') }}
        </x-sidebar-nav-link>

        {{--        <form method="POST" action="{{ route('logout') }}">--}}
        {{--            @csrf--}}
        {{--            <x-sidebar-nav-link onclick="event.preventDefault();this.closest('form').submit();">--}}
        {{--                <x-slot name="icon">--}}
        {{--                    <i class="fas fa-sign-out-alt mr-3  "></i>--}}
        {{--                </x-slot>--}}
        {{--                {{ __('Log Out') }}--}}
        {{--            </x-sidebar-nav-link>--}}
        {{--        </form>--}}
    </div>
</div>
<div :class="{ '!inline': open }"
     class="z-10 fixed top-0 left-0 w-screen h-screen bg-gray-900 bg-opacity-30 hidden md:!hidden transition ease-in-out duration-300"></div>
