<x-app-layout>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold mb-4">Snowball Method</h2>
        <div class="flex flex-col space-y-2">
            <p>The Snowball method of paying off debt, is the most known method world-wide.</p>
            <p>The purpose of the snowball is to eliminate lowest balance debts first, and work your way up to the highest balance debts <span class="font-semibold">linearly</span>. You typically <span class="font-semibold">do pay more interest</span> by using the snowball method, opposed to the <a href="{{ route('calculator.avalanche.show') }}">avalanche method</a>.</p>
            <p>Whilst conquering your debt via the snowball method, you will <span class="font-semibold">feel</span> a quick relief after seeing your smaller debts disappear fast, which seriously helps with motivation to continue on.</p>
        </div>
    </div>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm w-full" x-show="open">
        <h2 class="flex-1 text-lg font-semibold">Calculation Wizard</h2>
        <div class="w-full mt-4 flex flex-col space-y-4">
            <livewire:calculation-debts-section :calculation="$calculation" />
            <div class="w-full">
                <a href="{{ route('calculator.results.snowball.show') }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                    Calculate
                </a>
            </div>
        </div>
    </div>
    <livewire:calculation-debt-modal :calculation="$calculation"/>
    <livewire:calculation-delete-debt-modal />
</x-app-layout>
