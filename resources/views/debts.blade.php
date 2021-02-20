<x-app-layout>
    <div class="bg-white overflow-hidden shadow-md sm:rounded-md p-8">
        <h2 class="text-xl font-semibold pb-4">Debts</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices finibus quam, quis fringilla velit sollicitudin non. Morbi auctor elit a ex suscipit pellentesque. Etiam eu libero sagittis, fermentum erat nec, hendrerit lectus. Donec lobortis elementum porttitor. Aenean vitae leo ac augue pretium eleifend id vel ligula.</p>
    </div>
    <livewire:debts-section/>
    @push('modals')
    <livewire:debt-modal/>
    <livewire:delete-debt-modal title="Delete Debt"/>
    @endpush
</x-app-layout>