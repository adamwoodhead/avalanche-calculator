<x-app-layout>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="bg-white p-4 sm:w-1/4">
            <h2 class="text-lg font-semibold mb-4">Contacting US</h2>
            <div class="flex flex-col space-y-2">
                <p>Please keep in mind that we don't offer financial advice, nor can we offer financial advice through email.</p>
                <p>The purpose of this website is to induce self-help, with debt issues.</p>
                <hr>
                <p>Please feel free to contact us about any of the following subjects:</p>
                <ul class="list-disc list-inside">
                    <li>Website</li>
                    <li>Development</li>
                    <li>Suggestions</li>
                    <li>Contributing</li>
                    <li>Emails</li>
                    <li>Settings</li>
                    <li>GDPR / Privacy</li>
                    <li>Security</li>
                    <li>Media</li>
                </ul>
                <hr>
                <p>If you're unsure, just ask away and we'll get back to you.</p>
            </div>
        </div>
        <div class="sm:w-3/4">
            <livewire:contact-form/>
        </div>
    </div>
</x-app-layout>