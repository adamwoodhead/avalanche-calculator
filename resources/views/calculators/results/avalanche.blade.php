<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    
    @endpush
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    @endpush
    {{-- Avalanche Summary --}}

    {{-- Responsive Chart --}}
    <div class="bg-white max-w-7xl mx-auto border border-gray-200 p-4">
        <canvas class="hidden sm:block" id="debtChart" width="auto" height="auto"></canvas>
        <p class="block sm:hidden">Want to see a visualization of your debts? Tilt your phone to the side!</p>
    </div>

    {{-- Pay Off Summary --}}

    {{-- Monthly Payments --}}
    <div class="bg-white max-w-7xl mx-auto border border-gray-200" x-data="{selected: 1}">
        <ul class="shadow-box">
            <li class="relative border-b border-gray-200">
                <div class="w-full px-8 py-4 text-left">
                    <div class="flex flex-row items-center font-bold">
                        <div class="flex-1 flex flex-row items-center">
                            <span class="ml-10">Month</span>
                        </div>
                        <div class="flex-1 text-center">Interest</div>
                        <div class="flex-1 text-center">Total Paid</div>
                        <div class="flex-1 text-right">Remaining Debt</div>
                    </div>
                </div>
            </li>
            @foreach($results['months'] as $month)
            <li class="relative border-b border-gray-200">
                <button type="button" class="w-full px-8 py-4 text-left" @click="selected !== {{ $loop->iteration }} ? selected = {{ $loop->iteration }} : selected = null">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 flex flex-row items-center">
                            <svg x-show="selected !== {{ $loop->iteration }}" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                            </svg>
                            <svg x-show="selected === {{ $loop->iteration }}" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                            </svg>
                            <span class="ml-6">{{ $month['month'] }}</span>
                        </div>
                        <div class="flex-1 text-center">£{{ number_format($month["accruedinterest"], 2) }}</div>
                        <div class="flex-1 text-center">£{{ number_format($month["total"], 2) }}</div>
                        <div class="flex-1 text-right">£{{ number_format(array_sum(array_column($month["payments"], "balance")), 2) }}</div>
                    </div>
                </button>
       
                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container{{ $loop->iteration }}" x-bind:style="selected == {{ $loop->iteration }} ? 'max-height: ' + $refs.container{{ $loop->iteration }}.scrollHeight + 'px' : ''">
                    <div class="p-6 bg-gray-200">
                        <span class="font-bold">Debt Paid: </span>£{{ number_format($month["total"], 2) }}<br/>
                        <span class="font-bold">Combined Interest: </span>£{{ number_format($month["accruedinterest"], 2) }}<br/>
                        <span class="font-bold">Closing Debt Balance: </span>£{{ number_format(array_sum(array_column($month["payments"], "balance")), 2) }}
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @foreach($month['payments'] as $payment)
                            <div class="bg-green-600 shadow-xs hover:shadow-md p-6">
                                <div class="text-white relative">
                                    <h4 class="text-lg truncate mb-2">{{ $payment["name"] }}</h4>
                                    <p class="truncate">Opening Balance: £{{ number_format(($payment["balance"] + $payment["payment"] > 0 ? $payment["balance"] + $payment["payment"] : 0), 2) }}</p>
                                    <p class="truncate">Closing Balance: £{{ number_format(($payment["balance"] > 0 ? $payment["balance"] : 0), 2) }}</p>
                                    <p class="truncate">Payment: £{{ number_format(($payment["payment"] > 0 ? $payment["payment"] : 0), 2) }}</p>
                                    <p class="truncate">Charge: £{{ number_format(($payment["charge"] > 0 ? $payment["charge"] : 0), 2) }}</p>
                                    <p class="truncate">Interest: £{{ number_format(($payment["interest"] > 0 ? $payment["interest"] : 0), 2) }}</p>
                                    <div class="absolute w-0.5 h-full right-1 top-0">
                                        <div class="bg-gray-600"style="height: calc({{ $payment["percent_paid"] * 100 }}%);"></div>
                                        <div class="bg-yellow-600"style="height: calc({{ $payment["percent_remaining"] * 100 }}%);"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
           </li>
            @endforeach
        </ul>
    </div>
    @push('finalscripts')
    <script async defer type="text/javascript">
        var colours = [
            "#F44336", // RED
            "#2196F3", // BLUE
            "#4CAF50", // GREEN
            "#FFEB3B", // YELLOW
            "#3F51B5", // INDIGO
            "#FF9800", // ORANGE
            "#9C27B0", // PURPLE
            "#9E9E9E", // GREY
            "#E91E63", // PINK
            "#00BCD4", // CYAN
            "#CDDC39", // LIME
            "#009688", // TEAL
            "#FF5722", // DEEP ORANGE
            "#673AB7", // DEEP PURPLE
            "#8BC34A", // LIGHT GREEN
            // Reiterate all a load of times, it's incredibly doubtful anyone will enter any more debts than this.. ever
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
        ];

        var ctx = document.getElementById('debtChart').getContext('2d');
        var debtChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    @foreach($results['chart_keys'] as $month)
                        "{{ $month }}",
                    @endforeach
                ],
                datasets: [
                    @foreach($results['chart_data'] as $key => $value)
                    {
                        label: "{{ $key }}",
                        data: [
                            @foreach($value as $balance)
                                {{ round($balance, 2) }},
                            @endforeach
                        ],
                        fill: "false",
                        borderWidth: 3,
                        borderColor: colours[{{ $loop->index }}]
                    },
                    @endforeach
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    @endpush
</x-app-layout>
