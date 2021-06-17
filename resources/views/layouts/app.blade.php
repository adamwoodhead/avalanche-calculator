<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? ucwords(str_replace('.', ' - ', str_replace('-', ' ', str_replace('.show', '', Route::currentRouteName())))) }} | Avalanche Calculator</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        @stack('styles')

        @stack('scripts')

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <x-sidebar/>

        <x-navigation-bar :title="$title ?? ucwords(str_replace('.', ' - ', str_replace('-', ' ', str_replace('.show', '', Route::currentRouteName()))))"/>

        <div class="min-h-screen bg-gray-100">
            <main class="md:pl-72">
                <div class="md:py-8">
                    <div class="flex-col max-w-7xl mx-auto sm:px-8 space-y-8 relative">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        <div
            x-data="noticesHandler()"
            class="fixed inset-0 flex flex-col-reverse items-end justify-start h-full w-full"
            @notice.window="add($event.detail)"
            style="pointer-events:none">
            <template x-for="notice of notices" :key="notice.id">
                <div
                x-show="visible.includes(notice)"
                x-transition:enter="transition ease-in duration-200"
                x-transition:enter-start="transform opacity-0 translate-y-2"
                x-transition:enter-end="transform opacity-100"
                x-transition:leave="transition ease-out duration-500"
                x-transition:leave-start="transform translate-x-0 opacity-100"
                x-transition:leave-end="transform translate-x-full opacity-0"
                @click="remove(notice.id)"
                class="flex items-center border-l-4 py-2 px-3 shadow-md mb-2 mr-2 cursor-default"
                :class="{
                    'bg-green-500 border-green-700': notice.type === 'success',
                    'bg-blue-500 border-blue-700': notice.type === 'info',
                    'bg-yellow-500 border-yellow-700': notice.type === 'warning',
                    'bg-red-500 border-red-700': notice.type === 'error',
                }"
                style="pointer-events:all">
                    <div x-show="notice.type === 'success'" class="text-green-500 rounded-full bg-white mr-3">
                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg>
                    </div>
                    <div x-show="notice.type === 'info'" class="text-blue-500 rounded-full bg-white mr-3">
                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-info" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                            <circle cx="8" cy="4.5" r="1"/>
                        </svg>
                    </div>
                    <div x-show="notice.type === 'warning'" class="text-yellow-500 rounded-full bg-white mr-3">
                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                    </div>
                    <div x-show="notice.type === 'error'" class="text-red-500 rounded-full bg-white mr-3">
                        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    </div>
                    <div class="text-white max-w-xs " x-text="notice.text">
                    </div>
                    <template x-if="notice.cta !== null">
                        <div>
                            <a class="text-white max-w-xs ml-2 pl-2 border-l border-solid border-white font-bold cursor-pointer hover:underline" x-bind:href="notice.cta.link" x-text="notice.cta.text"></a>
                        </div>
                    </template>
                </div>
            </template>
        </div>  

        @stack('modals')

        @livewireScripts

        @stack('finalscripts')

        <script type="text/javascript">
            var debugLogs = 0;
            Livewire.on('debugLog', message => {
                debugLogs++;
                console.log(debugLogs + ': ' + message);
            });

            function noticesHandler() {
                return {
                    notices: [],
                    visible: [],
                    add(notice) {
                        notice.id = Date.now();
                        this.notices.push(notice);
                        this.fire(notice.id);
                    },
                    fire(id) {
                        this.visible.push(this.notices.find(notice => notice.id == id));
                        const timeShown = 4000 * this.visible.length;
                        setTimeout(() => {
                            this.remove(id);
                        }, timeShown);
                    },
                    remove(id) {
                        const notice = this.visible.find(notice => notice.id == id);
                        const index = this.visible.indexOf(notice);
                        this.visible.splice(index, 1);
                    },
                    
                };
            }
        </script>
    </body>
</html>