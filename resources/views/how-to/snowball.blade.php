<x-app-layout>
    <div class="bg-white shadow-sm rounded-sm p-4">
        <div class="flex flex-col gap-y-3">
            <h2 class="text-lg font-semibold">What is the Snowball Calculation?</h2>
            <p>The Debt Snowball Calculation is a method of paying off debt, in a manner that is mentally rewarding, and effective.</p>
            <p>The idea behind the Snowball method is to create a list of your debts, and then order them from the lowest balance - this order never changes, and you eliminate each debt consecutively, one after another.</p>    
        </div>
    </div>
    <div class="bg-white shadow-sm rounded-sm p-4">
        <div class="flex flex-col gap-y-3">
            <h2 class="text-lg font-semibold">A Snowball Example</h2>
            <p>Compared to the <a href="{{ route('calculator.avalanche.show') }}">Avalanche</a> example, the Snowball technique is incredibly simple.</p>
            
            <ul class="list-disc list-inside">
                <li>Credit Card A has a balance of £1500, an interest rate of 18% and zero charges.</li>
                <li>Credit Card B has a balance of £1200, an interest rate of 30% and zero charges.</li>
                <li>Credit Card C has a balance of £300, an interest rate of 0% and £5 monthly charges.</li>
            </ul>
    
            <p>Even though we acknowledge that Card B is the most costing, we will put all of our focus onto Card C, as this has the lowest balance - whilst making only minimum payments to our other debts. We continue to make the larger payments to Card C with the target of a zero balance, even after over-taking other debts.</p>
            
            <p >Once Card C is settled, our focus is then moved onto card B, as compared to our other cards, it now has the lower balance.</p>
            <p>Once Card B is settled, focus moves onto Card A, and our debts are settled.</p>
            
            <p>The reason the Snowball calculation is effective, is more mental than logical. When using the Snowball technique, you visually see your smaller debts decrease in value rapidly, and you feel more progress has been made every month which helps build motivation for the following month.</p>
            
            <p>In the end, you pay more interest with the <a href="{{ route('calculator.snowball.show') }}">Snowball</a> method compared to the <a href="{{ route('calculator.avalanche.show') }}">Avalanche</a> method - but if that extra motivation helps, it's worth it, right?</p>    
        </div>
    </div>
</x-app-layout>