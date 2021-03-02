<x-app-layout>
    <x-slot name="title">
        How The Avalanche Calculator Works
    </x-slot>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <div class="flex flex-col gap-y-3">
            <h2 class="text-lg font-semibold">What is the Avalanche Calculation?</h2>
            <p>Most people have heard of the Snowball Calculation when it comes to paying off debt, not so many have heard about the Debt Avalanche Calculation, which is <span class="bold">shocking!</span></p>
            <p>The idea behind using the Avalanche Calculation is to eliminate the higher cost debts first with the intention of avoiding as much interest as possible.</p>
            <p>So how do we define one debt to be more costing, than another? We consider the <a href="/frequently-asked-questions/" class="tool-tipped" data-position="top" data-tooltip="What is an Interest Rate?">Interest Rate</a>, and any other charges that are applicable to the debt - also known as <a href="/frequently-asked-questions/" class="tool-tipped" data-position="top" data-tooltip="What is APR?">APR</a>.</p>
        </div>
    </div>
    <div class="bg-white p-4 border border-gray-200 border-solid shadow-sm rounded-sm">
        <div class="flex flex-col gap-y-3">
            <h2 class="text-lg font-semibold">An Avalanche Example</h2>
            <p>Compared to the <a href="{{ route('calculator.avalanche.show') }}">Snowball</a> technique, the Snowball method is incredibly simple.</p>
            
            <ul class="list-disc list-inside">
                <li>Credit Card A has a balance of £1200, an interest rate of 18% and zero charges.</li>
                <li>Credit Card B has a balance of £1200, an interest rate of 30% and zero charges.</li>
                <li>Credit Card C has a balance of £300, an interest rate of 0% and £5 monthly charges.</li>
            </ul>
    
            <p>Now that we have the basics down on these debts, it's time to work out the APR - or effective interest rate when considering all charges.</p>
            
            <p>A note to remember, the avalanche method does <span class="bold">not</span> take into consideration <span class="bold">where</span> the debt is, as it is irrelevant - the only thing that matters is what the cost is for each debt.</p>
            
            <ul class="list-disc list-inside">
                <li>Credit Card A effectively has an 18% APR, which is a monthly interest rate of (18% / 12 Months) 1.5%</li>
                <li>Credit Card B effectively has an 30% APR, which is a monthly interest rate of (30% / 12 Months) 2.5%</li>
                <li>Credit Card C effectively has an 20% APR, but how did we get there? - (£5 Charge / £300 Balance) x 12 Months = 0.2 (20%)</li>
                <li>Now if we look at Credit Card C again with a different balance, for example £100: 60% APR - (£5 Charge / £100 Balance) x 12 Months = 0.6 (60%)</li>
            </ul>
            
            <p>From this example we can predict that when after some months of making our minimum & larger payments, that the priority of larger payments will change to allow for Credit Card C to be paid first, give it's overall cost is 60% which is higher that both A & B; 18% & 30% respectively.</p> 
        </div>
    </div>
</x-app-layout>