<div class="hidden md:block sm:min-h-screen fixed border-r border-gray border-solid">
    <div class="flex flex-col w-full sm:w-72 text-gray-700 bg-white min-h-screen relative">
        <a href="{{ route('dashboard.show') }}">
            <div class="flex-shrink-0 px-8 py-4 flex flex-col items-center justify-between">
                <img src="/img/snowball.png" width="100%" alt="Avalanche Calculator"/>
                <span class="text-lg mt-4 text-center font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Avalanche Calculator</span>
            </div>
        </a>
        <nav :class="{'block': open_1, 'hidden': !open_1, 'block': open_2, 'hidden': !open_2}" class="block px-4 pb-4 md:pb-0 md:overflow-y-auto space-y-2 relative">
            @guest
            <a class="block px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-md" href="{{ route('register') }}"><span class="animate-pulse">Register</span></a>
            <hr>
            @endguest
            <livewire:sidebar-link title="Dashboard" route="dashboard.show"/>
            <livewire:sidebar-link title="Debts" route="debts.show"/>
            <div @click.away="open_1 = {{ $contains_calculate ? 'true' : 'false' }}" class="relative" x-data="{ open_1: {{ $contains_calculate ? 'true' : 'false' }} }">
                <button @click="open_1 = !open_1" class="flex flex-row items-center w-full px-4 py-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Calculators</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open_1, 'rotate-0': !open_1}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open_1" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                    <div class="px-2 py-2 bg-white rounded-md shadow grid gap-y-2">
                        <livewire:sidebar-link title="Avalanche Calculator" route="calculator.avalanche.show"/>
                        <livewire:sidebar-link title="Snowball Calculator" route="calculator.snowball.show"/>
                    </div>
                </div>
            </div>
            <div @click.away="open_2 = {{ $contains_how_to ? 'true' : 'false' }}" class="relative" x-data="{ open_2: {{ $contains_how_to ? 'true' : 'false' }} }">
                <button @click="open_2 = !open_2" class="flex flex-row items-center w-full px-4 py-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>How To</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open_2, 'rotate-0': !open_2}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open_2" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                    <div class="px-2 py-2 bg-white rounded-md shadow grid gap-y-2">
                        <livewire:sidebar-link title="How To Avalanche" route="how-to.avalanche.show"/>
                        <livewire:sidebar-link title="How To Snowball" route="how-to.snowball.show"/>
                    </div>
                </div>
            </div>
            <livewire:sidebar-link title="Contact" route="contact.show"/>
            <livewire:sidebar-link title="About" route="about.show"/>
        </nav>
    </div>
</div>