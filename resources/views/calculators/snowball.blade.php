<x-app-layout>
    <div class="bg-white p-4 shadow-md rounded-md">
        <h2 class="text-lg font-semibold mb-4">Contacting US</h2>
        <div class="flex flex-col space-y-2">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices finibus quam, quis fringilla velit sollicitudin non. Morbi auctor elit a ex suscipit pellentesque. Etiam eu libero sagittis, fermentum erat nec, hendrerit lectus. Donec lobortis elementum porttitor. Aenean vitae leo ac augue pretium eleifend id vel ligula.</p>
        </div>
    </div>
    <div class="w-full bg-white rounded-md p-4 shadow-md" x-show="open">
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
