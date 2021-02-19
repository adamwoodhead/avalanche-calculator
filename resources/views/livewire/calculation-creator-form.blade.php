<div class="w-full bg-white rounded-md p-4" x-show="open">
    <h2 class="flex-1 text-lg font-semibold">Calculation Wizard</h2>
    <div class="w-full mt-4 flex flex-col space-y-4">
        <div class="w-full">
            <label class="block text-gray-700 font-semibold">
                Budget
            </label>
            <input wire:model="email" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="400">
            @error('email') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            <p class="text-gray-600 text-xs italic">The amount you can afford to pay each month, for all debts.</p>
        </div>
        <hr>
        <h3 class="flex-1 text-base font-bold">Debts</h3>
        <div class="flex flex-col space-y-4">
            <div class="flex-1">
            </div>
        </div>
        <livewire:debt-form-modal/>
        <hr>
        <div class="w-full">
            <button wire:click="calculate" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-black font-semibold py-2 px-4 rounded">
                Send
            </button>
        </div>
    </div>
</div>