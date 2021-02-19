<x-app-layout>
    <div class="bg-white p-4">
        <h2 class="text-lg font-semibold mb-4">General Purpose</h2>
        <div class="flex flex-col space-y-2">
            <p>Avalanche Calculator (formerly Snowball My Debt) was built originally as an extra-learning project, with zero profits in mind - this has stayed the same.</p>
            <p>The purpose of this website is to help people like yourself (assuming you're here for self-help), with debt issues. There are many options out there, some cost a small amount, some cost alot, and we're in the gray area of being <span class="italic">truly free</span>.
            <p>With full transparency in mind, the <a class="text-green-500 font-semibold" href="https://github.com/adamwoodhead/avalanche-calculator" target="_blank">full source code is available on GitHub</a>.</p>    
        </div>
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