<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl">รายชี่อทรัพย์สิน</div>
    </x-slot>
    <div class="bg-white max-w-2xl mx-auto mt-4 p-8">
        <div class="flex justify-end">
            <a href="{{ route('item-names.create') }}">
                <x-icons.add class="size-10 text-blue-600" />
            </a>
        </div>

        <div class="my-4 font-semibold">รายการที่มีอยู่แล้ว</div>
        @foreach ($itemNames as $itemName)
            <div class="flex space-x-2  py-1 even:bg-gray-100">
                <div class="w-6 text-right">{!! $loop->iteration < 10 ? '0' : '' !!}{{ $loop->iteration }}</div>
                <a href="{{ route('showcase.location-of-asset',['item_name_id'=>$itemName->id]) }}">
                    <div>{{ $itemName->name }}</div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
