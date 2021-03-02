<x-app-layout>
    <x-slot name="title">
        About Us
    </x-slot>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <h2 class="text-lg font-semibold mb-4">General Purpose</h2>
        <div class="flex flex-col space-y-2">
            <p>Avalanche Calculator (formerly Snowball My Debt) was built originally as an extra-learning project, with zero profits in mind - this has stayed the same.</p>
            <p>The purpose of this website is to help people like yourself (assuming you're here for self-help), with debt issues. There are many options out there, some cost a small amount, some cost alot, and we're in the gray area of being <span class="italic">truly free</span>.
        </div>
     </div>
     <div class="border border-gray-200 border-solid shadow-sm rounded-sm">
         <table class="divide-y divide-gray-200 w-full">
             <thead class="bg-gray-50">
                 <tr>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                         Commit
                     </th>
                     <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                         Author
                     </th>
                 </tr>
             </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                @foreach($commits as $commit)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $commit->message }}</div>
                        <div class="text-sm text-gray-500">Changes: {{ $commit->changes }} | <span class="text-green-600">++{{ $commit->additions }}</span> | <span class="text-red-600">--{{ $commit->deletions }}</span></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-row-reverse">
                            <div class="ml-4 flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $commit->avatar_url }}" alt="">
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $commit->author }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $commit->date->format('F Y') }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
             </tbody>
         </table>
     </div>
</x-app-layout>