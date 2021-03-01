<x-app-layout>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold mb-4">Avalanche Calculator</h2>
        <div class="flex flex-col space-y-2">
            <p>The Avalanche method of paying off debt is seen as the absolute most efficient method possible, and can be found in many professionally created Debt Management Plans.</p>
            <p>The purpose of the Avalanche Calculation is to minimize interest paid, and pay off high interest accounts first to eliminate future interest being accrued, opposed to the <a href="{{ route('calculator.snowball.show') }}">Snowball Method</a> - paying off the lowest balances first.</p>
            <p>Sometimes, when you have a lot of debt spread across multiple accounts, you won't see the benefits of the avalanche method until nearer the end of your payments timeline, though the benefit is surely there and is a dynamically increasing factor throughout the entire procedure.</p>
            <p>Because of the nature of the Avalanche Calculator, paying off the highest interest debts first, you may see the payment order of your debts change throughout the timeline - account charges are taken into calculation, and are converted into their APR equivalent, which is then compared to help decide the order.</p>
        </div>
    </div>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm w-full" x-show="open">
        <h2 class="flex-1 text-lg font-semibold">Calculation Wizard</h2>
        <div class="w-full mt-4 flex flex-col space-y-4">
            <livewire:calculation-debts-section :calculation="$calculation" />
            <div class="w-full">
                <a href="{{ route('calculator.results.avalanche.show') }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
                    Calculate
                </a>
            </div>
        </div>
    </div>
    <livewire:calculation-debt-modal :calculation="$calculation"/>
    <livewire:calculation-delete-debt-modal />
</x-app-layout>
