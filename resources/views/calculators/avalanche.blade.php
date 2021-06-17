<x-app-layout>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold">Avalanche Calculator</h2>
        <div class="w-full mt-4 flex flex-col space-y-2">
            <p>The Avalanche method of paying off debt is seen as the absolute most efficient method possible, and can be found in many professionally created Debt Management Plans.</p>
            <p>The purpose of the Avalanche Calculation is to minimize interest paid, and pay off high interest accounts first to eliminate future interest being accrued, opposed to the <a href="{{ route('calculator.snowball.show') }}">Snowball Method</a> - paying off the lowest balances first.</p>
            <p>Sometimes, when you have a lot of debt spread across multiple accounts, you won't see the benefits of the avalanche method until nearer the end of your payments timeline, though the benefit is surely there and is a dynamically increasing factor throughout the entire procedure.</p>
            <p>Because of the nature of the Avalanche Calculator, paying off the highest interest debts first, you may see the payment order of your debts change throughout the timeline - account charges are taken into calculation, and are converted into their APR equivalent, which is then compared to help decide the order.</p>
        </div>
    </div>
    @auth
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm w-full">
        <h2 class="flex-1 text-lg font-semibold">Saved Calculations</h2>
        <div class="w-full mt-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Detail
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total / Count
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Budget
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Load
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(Auth::user()->calculations()->with(CalculationDebts::class)->get() as $savedCalculation)
                                <livewire:saved-calculation-row :calculation="$savedCalculation"/>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm w-full" x-show="open">
        <h2 class="flex-1 text-lg font-semibold">Calculation Wizard</h2>
        <div class="w-full mt-4 flex flex-col space-y-4">
            <livewire:start-over-button />
            <livewire:calculation-debts-section :calculation="$calculation" />
        </div>
    </div>
    <livewire:calculation-debt-modal :calculation="$calculation"/>
    <livewire:calculation-delete-debt-modal />
</x-app-layout>
