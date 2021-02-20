<div x-data="{ open: false }" 
    @create-debt-modal-show.window="open = true"
    x-init="
    $watch('open', value => {
    if (value === true) { document.body.classList.add('overflow-hidden') }
    else { document.body.classList.remove('overflow-hidden') }
    });"
    x-show="open"
    class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div 
        x-show="open" 
        x-description="Background overlay, show/hide based on modal state." 
        x-transition:enter="ease-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="ease-in duration-200" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 transition-opacity" 
        aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
  
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div x-show="open" 
        x-description="Modal panel, show/hide based on modal state." 
        x-transition:enter="ease-out duration-300" 
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
        x-transition:leave="ease-in duration-200" 
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
        class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl w-full" 
        role="dialog" 
        aria-modal="true" 
        aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            {{ $title }}
                        </h3>
                        <div class="mt-2">
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Debt Name
                                    </label>
                                    <input wire:model="name" id="name" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white" type="text" placeholder="Big Bad Bank">
                                    @error('name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Type Of Debt
                                    </label>
                                    <div class="col-span-6 sm:col-span-3">
                                        <select wire:model="debt_type" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white">
                                            <option value="0" selected>What type of debt?</option>
                                            <option value="10">Regular Credit Card</option>
                                            <option value="20">Balance Transfer</option>
                                            <option value="30">Purchase Card</option>
                                            <option value="40">Short Term Loan</option>
                                            <option value="50">Long Term Loan</option>
                                        </select>
                                    </div>
                                    @error('debt_type') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Opening Balance
                                    </label>
                                    <input wire:model="opening_balance" id="opening_balance" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="2500">
                                    @error('opening_balance') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Interest Rate (APR)
                                    </label>
                                    <input wire:model="interest_rate" id="interest_rate" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="25">
                                    @error('interest_rate') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Monthly Charges
                                    </label>
                                    <input wire:model="monthly_charge" id="monthly_charge" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="2500">
                                    @error('monthly_charge') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <h4 class="text-base font-bold">Minimum Payment Options</h4>
                                <p class="text-gray-700">Credit Agreements typically come with a "Minimum Payment", mostly in the form of a formula - an example being:<br/>The greater of either: £20 or the balance in full if less than £20, or 1.5% of the balance.</p>
                            </div>
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Minimum Payment Fixed
                                    </label>
                                    <input wire:model="min_payment_fixed" id="min_payment_fixed" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="25">
                                    @error('min_payment_fixed') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-semibold">
                                        Minimum Payment %
                                    </label>
                                    <input wire:model="min_payment_percent" id="min_payment_percent" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="2500">
                                    @error('min_payment_percent') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @if($debt_type == 20)
                                <div class="flex flex-col">
                                    <h4 class="text-base font-bold">Balance Transfer Options</h4>
                                    <p class="text-gray-700">If you have an interest free period, set the interest rate above to the reduced rate (typically zero)</p>
                                </div>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                    <div class="flex-1">
                                        <label class="block text-gray-700 font-semibold">
                                            Interest Free Period (months left)
                                        </label>
                                        <input wire:model="bt_free_period" id="bt_free_period" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="18">
                                        @error('bt_free_period') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-gray-700 font-semibold">
                                            Interest Rate After Free Period
                                        </label>
                                        <input wire:model="bt_interest_post" id="bt_interest_post" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="2500">
                                        @error('bt_interest_post') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @elseif($debt_type == 30)
                                <h4 class="text-base font-bold">Purchase Card Options</h4>
                                <p class="text-gray-700">The promotional interest free period on purchase cards typically only applies to purchases made within the promotional period. Please be as accurate as possible when inputting the amount you spent within the promotional period (if it hasn't been paid off)</p>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                    <div class="flex-1">
                                        <label class="block text-gray-700 font-semibold">
                                            Interest Free Period (in months)
                                        </label>
                                        <input wire:model="pc_free_period" id="pc_free_period" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="12">
                                        @error('pc_free_period') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-gray-700 font-semibold">
                                            Approx Spent In Promotional Period
                                        </label>
                                        <input wire:model="pc_amount_spent" id="pc_amount_spent" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="500">
                                        @error('pc_amount_spent') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @elseif($debt_type == 40)
                                <h4 class="text-base font-bold">Short Term Loan Options</h4>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                    <div class="flex-1 ml-1">
                                        <div class="flex">
                                            <div class="flex items-center h-7">
                                                <input id="sl_can_overpay" wire:model="sl_can_overpay" id="sl_can_overpay" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sl_can_overpay" class="font-semibold text-gray-700">Can You Overpay?</label>
                                                <p class="text-gray-500">Some loan accounts specify that you can't overpay.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($debt_type == 50)
                                <h4 class="text-base font-bold">Long Term Loan Options</h4>
                                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0">
                                    <div class="flex-1 ml-1">
                                        <div class="flex">
                                            <div class="flex items-center h-7">
                                                <input id="ll_can_overpay" wire:model="ll_can_overpay" id="ll_can_overpay" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="ll_can_overpay" class="font-semibold text-gray-700">Can You Overpay?</label>
                                                <p class="text-gray-500">Some loan accounts specify that you can't overpay.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="w-full">
                                <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-black font-semibold py-2 px-4 rounded" type="submit">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button @click="$wire.save_debt(); open = false;" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button @click="open = false;" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>