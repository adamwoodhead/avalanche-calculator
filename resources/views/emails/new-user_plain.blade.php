<x-email-plain-layout>
    <x-slot name="name">
        {{ $user->first_name }}
    </x-slot>
    Thanks for registering an account with us.

    Now that you're registered, you can use the Debts Page ({{ route('debts.show') }}) to save all your debts in one place, it's super handy as you can import your debts into calculations with two clicks, instead of setting them up each calculation!
</x-email-plain-layout>