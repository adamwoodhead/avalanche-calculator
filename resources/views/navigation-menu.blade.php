<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="md:pl-72 w-full mx-auto border-b border-solid border-gray">
        <div class="flex justify-between h-16">
            <div class="flex">
                <header class="mx-auto flex flex-row">
                    <img src='/img/snowball.png' alt='avalanche-calculator' class="sm:hidden p-2 h-auto">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight px-6 py-5">
                        {{ ucwords(str_replace('.', ' - ', str_replace('-', ' ', str_replace('.show', '', Route::currentRouteName())))) }}
                    </h2>
                </header>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @auth
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            @endauth
                            @guest
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        Account

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endguest
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            @auth
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                            @else
                            <x-jet-dropdown-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-jet-dropdown-link>
                            
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                {{ __('login') }}
                            </x-jet-dropdown-link>
                            @endauth
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard.show') }}" :active="request()->routeIs('dashboard.show')">
                Dashboard
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('debts.show') }}" :active="request()->routeIs('debts.show')">
                 Debts
            </x-jet-responsive-nav-link>
            
            <span class="block px-4 py-2 text-base font-bold text-gray-600">Calculators</span>

            <div class="ml-4">
                <x-jet-responsive-nav-link href="{{ route('calculate.avalanche.show') }}" :active="request()->routeIs('calculate.avalanche.show')">
                    {{ __('Avalanche') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('calculate.snowball.show') }}" :active="request()->routeIs('calculate.snowball.show')">
                    {{ __('Snowball') }}
                </x-jet-responsive-nav-link>
            </div>
            
            <span class="block px-4 py-2 text-base font-bold text-gray-600">How To</span>
            
            <div class="ml-4">
                <x-jet-responsive-nav-link href="{{ route('how-to.avalanche.show') }}" :active="request()->routeIs('how-to.avalanche.show')">
                    {{ __('Avalanche') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('how-to.snowball.show') }}" :active="request()->routeIs('how-to.snowball.show')">
                    {{ __('Snowball') }}
                </x-jet-responsive-nav-link>
            </div>

            <x-jet-responsive-nav-link href="{{ route('contact.show') }}" :active="request()->routeIs('contact.show')">
                {{ __('Contact') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('about.show') }}" :active="request()->routeIs('about.show')">
                {{ __('About') }}
            </x-jet-responsive-nav-link>
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="flex items-center px-4">
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            @endauth

            <div class="mt-3 space-y-1">
                @auth
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
                @else
                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('login') }}
                </x-jet-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>