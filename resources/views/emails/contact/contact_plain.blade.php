<x-email-plain-layout>
    <x-slot name="name">
        {{ $first_name }}
    </x-slot>

    First Name: {{ $first_name }}
    Last Name: {{ $last_name }}
    Email: {{ $email }}
    Subject: {{ $subject }}
    Message: {{ $body_message }}
</x-email-plain-layout>