<div class="w-full -translate-y-1/2 relative top-[320px]">
    <div class="py-[40px] w-full">
        <div class="max-w-[1200px] m-auto flex gap-2">
            <div
                class="flex-[1] text-center p-[20px] text-[#000000] uppercase border-[3px] border-[solid] border-[#000] rounded-[5px] ml-[15px]">

                <i class="fas fa-compass  text-[40px] text-[#000000]"></i>

                <div class="text-[40px] my-[20px]">{{ $totalAdventures }}</div>
                <h3>Total Adventures</h3>
            </div>
            <div class="flex-[1] text-center p-[20px] text-[#000000] uppercase border-[3px] border-[solid] border-[#000] rounded-[5px] ml-[15px]">
                <i class="fas fa-users  text-[40px] text-[#000000]"></i>
                <div class="text-[40px] my-[20px]">{{ $totalUsers }}</div>
                <h3>Total Users</h3>
            </div>
            <div class="flex-[1] text-center p-[20px] text-[#000000] uppercase border-[3px] border-[solid] border-[#000] rounded-[5px] ml-[15px]">
                <i class="fas fa-globe text-[40px] text-[#000000]"></i>
                <div class="text-[40px] my-[20px]">{{ $mostVisitedDestination->total }}</div>
                <h3>Most Visited Destination: {{ $mostVisitedDestination->destinations }}</h3>
            </div>
        </div>
    </div>
</div>
