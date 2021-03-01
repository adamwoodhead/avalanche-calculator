<div class="min-h-full" x-data="{ open: @entangle('show_form') }">
    <div class="flex items-center">
        <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm w-full" x-show="open">
            <h2 class="flex-1 text-lg font-semibold">Contact Us</h2>
            <form class="w-full mt-4 flex flex-col space-y-4" wire:submit.prevent="submit">
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                    <div class="flex-1">
                        <label class="block text-gray-700 font-semibold">
                            First Name
                        </label>
                        <input wire:model="first_name" class="block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 focus:outline-none focus:bg-white" type="text" placeholder="Jane" autocomplete="given-name">
                        @error('first_name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 font-semibold">
                            Last Name
                        </label>
                        <input wire:model="last_name" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Doe" autocomplete="family-name">
                        @error('last_name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold">
                        E-mail
                    </label>
                    <input wire:model="email" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="email" autocomplete="email">
                    @error('email') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    <p class="text-gray-600 text-xs italic">Double check, as we'll reply to this address!</p>
                </div>
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold">
                        Subject
                    </label>
                    <input wire:model="subject" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="How do I ...?">
                    @error('subject') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    <p class="text-gray-600 text-xs italic">What's the general reason for your message?</p>
                </div>
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold">
                        Message
                    </label>
                    <textarea wire:model="message" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"></textarea>
                    @error('message') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                </div>
                <div class="w-full">
                    <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-black font-semibold py-2 px-4 rounded" type="submit">
                        Send
                    </button>
                </div>
              </form>
        </div>
    </div>
    <div class="flex flex-col md:mt-64 sm:justify-center items-center" x-show="!open">
        <div class="w-full sm:w-96 flex flex-col bg-white sm:rounded-md p-4">
            <p class="h-full text-lg text-gray-700">Thanks {{ $first_name }}!</p>
            <p class="text-base text-gray-500">We'll get back to you as soon as possible!</p>
            <div class="mt-8 text-gray-500">
                <div class="flex flex-col">
                    @auth
                        @if(Auth::user()->debts()->count() == 0)
                            <p>In the mean time why don't you try setting up some debts?</p>
                            <a href="{{ route('debts.show') }}" class="flex-1 mt-4 text-center bg-green-500 rounded-md shadow-md py-2 px-4 text-white border border-solid border-gray-500 hover:bg-green-600">View My Debts</a>
                        @else
                            <p>In the mean time why don't you try out one of our calculators?</p>
                            <div class="flex flex-row flex-grow mt-4 space-x-4">
                                <a href="{{ route('calculator.avalanche.show') }}" class="flex-1 text-center bg-green-500 rounded-md shadow-md py-2 px-4 text-white border border-solid border-gray-500 hover:bg-green-600">Avalanche<br/>Calculator</a>
                                <a href="{{ route('calculator.snowball.show') }}" class="flex-1 text-center bg-green-500 rounded-md shadow-md py-2 px-4 text-white border border-solid border-gray-500 hover:bg-green-600">Snowball<br/>Calculator</a>
                            </div>
                        @endif
                    @else
                        <p>In the mean time, why don't you register an account? That way, you can save all your debts in one place and can visit previous calculations!</p>
                        <div class="flex flex-row flex-grow mt-4 space-x-4">
                            <a href="{{ route('register') }}" class="flex-1 text-center bg-green-500 rounded-md shadow-md py-2 px-4 text-white border border-solid border-gray-500 hover:bg-green-600">Register</a>
                            <a href="{{ route('login') }}" class="flex-1 text-center bg-green-500 rounded-md shadow-md py-2 px-4 text-white border border-solid border-gray-500 hover:bg-green-600">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
