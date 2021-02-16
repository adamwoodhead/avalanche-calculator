<x-email-layout>
    <x-slot name="name">
        {{ $first_name }}
    </x-slot>
    
    <ul>
        <li>First Name: {{ $first_name }}</li>
        <li>Last Name: {{ $last_name }}</li>
        <li>Email: {{ $email }}</li>
        <li>Subject: {{ $subject }}</li>
        <li>Message: {{ $body_message }}</li>
    </ul>
</x-email-layout>