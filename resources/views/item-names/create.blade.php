<x-app-layout>
    <x-slot name="header" >
        <span class="font-semibold text-xl">

            เพิ่มรายชื่อทรัพย์สิน
        </span>
    </x-slot>
    <div class="bg-white max-w-2xl mx-auto mt-4 p-8">
        <form method="POST" action="{{ route('item-names.store') }}">
            @csrf
            <div class="my-4 font-semibold">รายการ</div>
            <label for="name">ชื่อ</label>
            <input type="text" name="name" id="name" class="border rounded-xl px-3 py-1 block w-full my-2"
                :value="old('name')">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <div class="flex justify-center">
                <x-primary-button class="mt-2">บันทึก</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
