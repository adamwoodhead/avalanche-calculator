<div class="border border-solid border-gray-300 p-4 rounded-md shadow-sm">
    <div class="flex flex-row justify-between">
        <div class="flex flex-col">
            <h4 class="text-lg">{{ $collection->name }}</h4>
            <p class="text-gray-700">{{ $collection->description }}</p>
        </div>
        <div class="flex flex-col items-end">
            <div class="flex flex-row-reverse space-x-2">
                <div class="ml-2 rounded-full h-8 w-8 flex items-center justify-center font-semibold border-2 border-solid border-gray-500">
                    <span>{{ count($collection->debts) }}</span>
                </div>
                <div class="rounded-full h-8 px-2 flex items-center justify-center font-semibold border-2 border-solid border-gray-500">
                    <span>£{{ number_format($collection->debts->sum('opening_balance'), 2) }}</span>
                </div>
            </div>
            <span class="pt-1">Created: {{ $collection->created_at->format('d/m/Y') }}</span>
        </div>
    </div>

    <table class="w-full text-left table-fixed mt-2 border border-solid border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="w-1/3">Name</th>
                <th class="w-1/4">Type</th>
                <th class="w-1/4">Balance</th>
                <th class="w-1/4">APR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($collection->debts as $debt)
            <tr class="hover:bg-gray-100 border border-solid border-gray-200">
                <td class="truncate">{{ $debt->name }}</td>
                <td>{{ $debt->debt_type_text }}</td>
                <td>£{{ number_format($debt->opening_balance, 2) }}</td>
                <td>{{ str_pad(number_format($debt->interest_rate, 2), 5, '0', STR_PAD_LEFT) }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex flex-row-reverse mt-4">
        <div class="items-center">
            <button wire:click="delete" class="bg-red-600 hover:bg-red-700 w-48 text-white rounded-md py-1 px-2">Delete Collection</button>
        </div>
    </div>
</div>