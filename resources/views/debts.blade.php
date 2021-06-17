<x-app-layout>
    <x-slot name="title">
        My Debts
    </x-slot>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-xl font-semibold pb-4">Debts</h2>
        <p>Save all your debts to your account, use them with or without one another in the calculations you create.</p>
    </div>
    <livewire:debts-section/>
    @push('modals')
    <livewire:debt-modal/>
    <livewire:delete-debt-modal title="Delete Debt"/>
    @endpush
</x-app-layout>