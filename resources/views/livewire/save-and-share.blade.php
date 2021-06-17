<div class="w-full flex flex-col gap-y-2">
    @if($calculation->access_token == null)
        @auth
        <button wire:click="saveAndShare" class="w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 sm:text-sm">
            <h2 class="text-lg font-semibold">Share It!</h2>
            <p class="text-xs">Working on your debts with someone? Share this!</p>
        </button>
        @endauth
        @guest
        <button wire:click="saveAndShare" class="w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 sm:text-sm">
            <h2 class="text-lg font-semibold">Save & Share!</h2>
            <p class="text-xs">Come back to this calculation by saving it!</p>
        </button>
        @endguest
    @else
        <h2 class="text-lg font-semibold">Share It!</h2>
        <input
            onClick="this.select();" 
            type="text"
            value="{{ route('calculator.results.avalanche.show') }}?secret={{ $calculation->access_token }}"
            class="rounded-sm shadow-sm border border-gray-200 px-4 py-2 text-base font-medium w-full sm:text-sm"/>
        @auth
        <button wire:click="unShare" type="button" class="w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700">
            <h2 class="text-lg font-semibold">Unshare</h2>
            <p class="text-xs">Your share link will stop working.</p>
        </button>
        @endauth
    @endif
</div>
