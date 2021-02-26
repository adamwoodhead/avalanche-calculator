<x-app-layout>
    <div class="bg-white p-4">
        <h2 class="text-lg font-semibold mb-4">General Purpose</h2>
        <div class="flex flex-col space-y-2">
            <p>Avalanche Calculator (formerly Snowball My Debt) was built originally as an extra-learning project, with zero profits in mind - this has stayed the same.</p>
            <p>The purpose of this website is to help people like yourself (assuming you're here for self-help), with debt issues. There are many options out there, some cost a small amount, some cost alot, and we're in the gray area of being <span class="italic">truly free</span>.
        </div>
     </div>
     <div class="shadow border-b border-gray-200 sm:rounded-lg">
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
                        <div class="text-sm text-gray-900">{{ $commit['commit']['message'] }}</div>
                        <div class="text-sm text-gray-500">{{ Carbon\Carbon::parse($commit['commit']['author']['date'])->format('d/m/Y') }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-row-reverse">
                            <div class="ml-4 flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $commit['author']['avatar_url'] }}" alt="">
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $commit['commit']['author']['name'] }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($commit['commit']['author']['date'])->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
             </tbody>
         </table>
     </div>
    <div class="bg-white p-4">
        <h2 class="text-lg font-semibold mb-4">Development Commits (Last 30)</h2>
        <div class="flex flex-col space-y-4">
            @foreach($commits as $commit)
            <a class="flex flex-col bg-gray-100 p-2 rounded-md shadow-sm hover:bg-gray-200" target="_blank" href="{{ $commit['html_url'] }}">
                <span class="font-semibold">{{ $commit['commit']['message'] }}</span>
                <div class="flex flex-row">
                    <div class="flex-1">{{ $commit['commit']['author']['name'] }}</div>
                    <div class="flex-1 text-right">{{ \Carbon\Carbon::parse($commit['commit']['author']['date'])->format('d/m/Y') }}</div>    
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>