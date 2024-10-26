<x-app-layout>
    <div class="bg-white max-w-xl mx-auto p-8 ">
        @if (isset($assets))
            <div class="font-semibold text-xl my-4">{{ $assets[0]->location->name }}</div>

            <div class="grid grid-cols-2">
                <div class="font-semibold">สถานที่</div>
                <div class="font-semibold text-right"> จำนวนหน่วย </div>
            </div>
            @foreach ($assets as $asset)
                <div class="grid grid-cols-2 border-b">
                    <div>{{ $asset->itemName->name }}</div>
                    <div class="text-right">{{ $asset->amount }} </div>

                </div>
            @endforeach
            <div class="grid grid-cols-2">
                <div class="font-semibold">รวม</div>
                <div class="font-semibold text-right"> {{ $assets->sum('amount') }} </div>
            </div>
        @else
            <div class="text-red-500 ">{{ $message }}</div>
        @endif
    </div>

</x-app-layout>
