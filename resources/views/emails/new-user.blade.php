<x-email-layout>
    <x-slot name="name">
        {{ $user->first_name }}
    </x-slot>
    <p>Thanks for registering an account with us.</p>
    <p>Now that you're registered, you can use the <a href="{{ route('debts.show') }}">Debts Page</a> to save all your debts in one place, it's super handy as you can import your debts into calculations with two clicks, instead of setting them up each calculation!</p>
</x-email-layout>