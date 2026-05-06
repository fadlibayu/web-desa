<nav x-data="{ open: false }" class="admin-header fixed w-full z-50 top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <img src="{{ asset('logo-dusun.png') }}" alt="Logo Dusun Gatak" class="w-8 h-8 rounded-full bg-[#F8F3E1] shadow-sm">
                        <span class="font-semibold tracking-tight text-[#41431B]">Dusun Gatak</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('dashboard') ? 'text-[#41431B]' : 'text-[#AEB784] hover:text-[#41431B]' }}">Dashboard</a>
                    <a href="{{ route('admin.berita.index') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('admin.berita.*') ? 'text-[#41431B]' : 'text-[#AEB784] hover:text-[#41431B]' }}">Berita</a>
                    <a href="{{ route('admin.album.index') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('admin.album.*') ? 'text-[#41431B]' : 'text-[#AEB784] hover:text-[#41431B]' }}">Album</a>
                    <a href="{{ route('admin.demografi.index') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('admin.demografi.*') ? 'text-[#41431B]' : 'text-[#AEB784] hover:text-[#41431B]' }}">Demografi</a>
                    <a href="{{ route('admin.profil.index') }}" class="text-sm font-medium transition-colors {{ request()->routeIs('admin.profil.*') ? 'text-[#41431B]' : 'text-[#AEB784] hover:text-[#41431B]' }}">Profil & Statistik</a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#41431B] bg-[#E3DBBB] hover:bg-[#E3DBBB] focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 hover:bg-red-50">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#AEB784] hover:text-[#AEB784] hover:bg-[#E3DBBB] focus:outline-none focus:bg-[#E3DBBB] focus:text-[#AEB784] transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-[#E3DBBB]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-[#E3DBBB]">
            <div class="px-4">
                <div class="font-medium text-base text-[#41431B]">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[#AEB784]">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
