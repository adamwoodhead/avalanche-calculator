<div class="w-full mt-4 flex flex-col space-y-4">
    <div class="flex-col space-y-8">
        <div class="w-full">
            <label class="block text-gray-700 font-semibold">
                Monthly Budget
            </label>
            <input wire:model.debounce.750ms="calculation.budget" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" type="number" placeholder="400">
            @error('calculation.budget') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            <p class="text-gray-600 text-xs italic">The amount you can afford to pay in total each month, for all debts combined.<br/>
                Based on your debt information, your minimum budget is £{{ $min_budget != null ? number_format($min_budget, 2) : '0.00' }}</p>
        </div>
        <div class="flex flex-col space-y-4 sm:flex-row sm:space-x-8 sm:space-y-0">
            <button wire:click="$emit('assignDebtToCreate')" type="button" class="rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 sm:w-auto sm:text-sm">
                New Debt
            </button>
            <div class="hidden sm:block border-r"></div>
            @auth
            <select wire:model="import_debt_id" class="block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 pl-4 pr-8 focus:outline-none focus:bg-white">
                @foreach(Auth::user()->debts()->orderBy('name')->get() as $debt)
                <option value="{{ $debt->id }}"@once selected @endonce>{{ $debt->name }}</option>
                @endforeach
            </select>
            @endauth
            <button @auth wire:click="import" @else x-data="{}" @click="$dispatch('notice', {type: 'error', text: 'You need to be logged in for that!', cta: { link: '{{ route("register") }}', text: 'Register'} })" @endauth type="button" class="rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 sm:w-auto sm:text-sm">
                Import Debt
            </button>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Balance
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit/Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($calculation->calculationDebts as $debt)
                            <livewire:calculation-debt-row :debt="$debt" :key="'debt-row-'.$debt->id"/>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <button wire:click="submit_for_calculation" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
            Calculate
        </button>
    </div>
</div>
