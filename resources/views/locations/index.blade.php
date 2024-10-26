<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายการสถานที่/ห้อง') }}
        </h2>
    </x-slot>
    <div class="bg-white mx-auto p-8 max-w-2xl mt-4">
        <div class="flex justify-end my-2">
            <a href="{{ route('locations.create') }}">
                <x-icons.add class="size-10 text-blue-600" />
            </a>
        </div>
        <div class="grid grid-cols-12 bg-gray-200 ">
            <div class="col-span-1 px-1 py-1 text-center">ที่</div>
            <div class="col-span-8 px-1 py-1">ชื่อสถานที่</div>
            <div class="col-span-3 px-1 py-1">หมายเลข</div>

        </div>
        @foreach ($locations as $location)
            <div class="grid grid-cols-12 even:bg-gray-100">
                <div class="col-span-1 px-1 py-1 text-center">{!! $loop->iteration < 10 ? '0' : '' !!}{{ $loop->iteration }}</div>
                <div class="col-span-8 px-1 py-1">
                    <a href="{{ route('showcase.asset-at-location', ['location_id' => $location->id]) }}">
                        {{ $location->name }}
                    </a>
                </div>

                <div class="col-span-3 px-1 py-1">{{ $location->number }}</div>
            </div>
        @endforeach
    </div>

</x-app-layout>
