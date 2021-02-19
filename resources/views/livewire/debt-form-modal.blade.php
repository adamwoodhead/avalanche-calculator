<form class="w-full mt-4 flex flex-col space-y-4" wire:submit.prevent="submit">
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
</form>