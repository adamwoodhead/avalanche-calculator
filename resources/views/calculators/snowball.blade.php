<x-app-layout>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold">Snowball Calculator</h2>
        <div class="w-full mt-4 flex flex-col space-y-2">
            <p>The Snowball method of paying off debt, is the most known method world-wide.</p>
            <p>The purpose of the snowball is to eliminate lowest balance debts first, and work your way up to the highest balance debts <span class="font-semibold">linearly</span>. You typically <span class="font-semibold">do pay more interest</span> by using the snowball method, opposed to the <a href="{{ route('calculator.avalanche.show') }}">avalanche method</a>.</p>
            <p>Whilst conquering your debt via the snowball method, you will <span class="font-semibold">feel</span> a quick relief after seeing your smaller debts disappear fast, which seriously helps with motivation to continue on.</p>
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
            <livewire:calculation-debts-section :calculation="$calculation" method="snowball"/>
        </div>
    </div>
    <livewire:calculation-debt-modal :calculation="$calculation"/>
    <livewire:calculation-delete-debt-modal />
</x-app-layout>
