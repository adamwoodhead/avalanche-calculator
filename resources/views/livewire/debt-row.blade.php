<tr>
    <td class="px-6 py-4 truncate">
        <div class="flex items-center">
            <div>
                <div class="text-sm font-medium text-gray-900">
                    {{ $debt->name }}
                </div>
                <div class="text-sm text-gray-500">
                    {{ $debt->description ?? 'No Description' }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $debt->debt_type_text }}</div>
        <div class="text-sm text-gray-500">{{ number_format($debt->interest_rate, 2) }}%</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">£{{ number_format($debt->opening_balance, 2) }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <div class="flex flex-row-reverse">
            <button wire:click="delete" class="ml-4 cursor-pointer p-1 border border-solid border-gray-500 rounded-full text-green-600 hover:text-green-900">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            <button wire:click="edit" class="cursor-pointer p-1 border border-solid border-gray-500 rounded-full text-green-600 hover:text-green-900">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div>
    </td>
</tr>