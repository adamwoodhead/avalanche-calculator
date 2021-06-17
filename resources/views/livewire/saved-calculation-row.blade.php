<tr>
    <td class="px-6 py-4 truncate">
        <div class="flex items-center">
            <div>
                <div class="text-sm font-medium text-gray-900">
                    {{ $calculation->created_at }}
                </div>
                <div class="text-sm text-gray-500">
                    {{ $calculation->description ?? '' }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">£{{ number_format($calculation->calculationDebts->sum('opening_balance'), 2) }}</div>
        <div class="text-sm text-gray-500">{{ $calculation->calculationDebts->count() }} Debts</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-500">£{{ number_format($calculation->budget, 2) }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <div class="flex flex-row-reverse gap-x-2">
            <button wire:click="load" class="cursor-pointer p-1 border border-solid border-gray-500 rounded-full text-green-600 hover:text-green-900">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
            <button wire:click="view" class="cursor-pointer p-1 border border-solid border-gray-500 rounded-full text-green-600 hover:text-green-900">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </td>
</tr>