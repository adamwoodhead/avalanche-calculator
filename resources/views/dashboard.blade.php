<x-app-layout>
    <x-slot name="title">
        Avalanche Calculator
    </x-slot>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold">Rebuilt from Scratch</h2>
        <p class="mt-3">Over the last year our user base has been growing and growing at an exponential rate, we've made some changes.</p>
        <p class="mt-3">Due to the unexpected growth, we've taken the initiative to update our site to use the latest web frameworks available, use the latest forms of security and encryption, and can hopefully provide an generally improved user experience.</p>
        <p class="mt-3">Thanks again for using <a href="/">Avalanche Calulator</a>, we'll forever be free and wish you the best.</p>
        <p class="mt-3">You can loosely follow our development on our <a class="underline" href="{{ route('about.show') }}">About</a> page, each individual development update is summarized.</p>
    </div>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold">Debt Calculators</h2>
        <p class="mt-3">Let's get straight to the point, here are the two calculators you're here for...</p>
        <div class="flex flex-col sm:flex-row mt-3 space-y-4 sm:space-x-4 sm:space-y-0">
            <div class="flex-1">
                <div class="bg-green-600 text-white border border-solid border-gray-200 hover:bg-green-700 p-6 shadow-sm">
                    <a href="{{ route('calculator.avalanche.show') }}">
                        <div class="flex flex-col gap-y-3 text-center">
                            <h3 class="text-lg font-bold">Avalanche Calculator</h3>
                            <p class="font-semibold">Perceived as the most efficient way to tackle debt.</p>
                            <ul class="list-disc list-inside text-left mx-auto">
                                <li>Highly Efficient</li>
                                <li>Pay Less Overall</li>
                                <li>Difficulty: Moderate</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-green-600 text-white border border-solid border-gray-200 hover:bg-green-700 p-6 shadow-sm">
                    <a href="{{ route('calculator.snowball.show') }}">
                        <div class="flex flex-col gap-y-3 text-center">
                            <h3 class="text-lg font-bold">Snowball Calculator</h3>
                            <p class="font-semibold">The most popular method of tackling personal debt.</p>
                            <ul class="list-disc list-inside text-left mx-auto">
                                <li>Highly Motivating</li>
                                <li>Mentally Rewarding</li>
                                <li>Difficulty: Easy</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>