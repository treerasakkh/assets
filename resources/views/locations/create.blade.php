<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('เพิ่มสถานที่/ห้อง') }}
        </h2>
    </x-slot>

    <div class="lg:max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('locations.store') }}">
                @csrf
                
                <!-- ชื่อสถานที่/ห้อง -->
                <div class="mb-4">
                    <x-label for="name" :value="__('ชื่อสถานที่/ห้อง')" class="font-semibold" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- หมายเลขห้อง -->
                <div class="mb-4">
                    <x-label for="number" :value="__('หมายเลขห้อง(ถ้ามี)')" />
                    <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number', '-')" required />
                    @error('number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- ปุ่มบันทึก -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('บันทึก') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
