<div class="bg-white overflow-hidden shadow-md sm:rounded-md p-8">
    <h2 class="text-xl font-semibold pb-4">Debt Collections</h2>
    <button wire:click="create" class="bg-green-500 w-48 text-white rounded-md py-1 px-2 mb-4">Create Collection</button>
    <div class="flex flex-col space-y-4">
        @foreach($collections as $collection)
        <livewire:debt-collection-card :collection="$collection" :key="$collection->id"/>
        @if(!$loop->last)
        <hr>
        @endif
        @endforeach
    </div>
</div>
@push('modals')
<livewire:delete-collection-modal title="Delete Collection" description="Are you sure you want to delete this collection? All of the related data will be deleted permanently."/>
<livewire:user-debt-wizard-modal title="Delete Collection"/>
@endpush