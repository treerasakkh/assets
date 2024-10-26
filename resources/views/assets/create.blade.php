<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('เพิ่มทรัพย์สินใหม่') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('assets.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="item_name_id" class="block text-sm font-medium text-gray-700">รายการ</label>
                        <select name="item_name_id" id="item_name_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2" />
                        >
                        <option value="">&nbsp;</option>
                        @foreach ($itemNames as $itemName)
                            <option value="{{ $itemName->id }}" {{ old('item_name_id')==$itemName->id ? ' selected':''}}>{{ $itemName->name }}</option>
                        @endforeach

                        </select>
                        @error('item_name_id')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="brand_model" class="block text-sm font-medium text-gray-700">ยี่ห้อ/รุ่น</label>
                        <input type="text" id="brand_model" name="brand_model" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2"
                            value="{{ old('brand_model') }}" />
                        @error('brand_model')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="amount">จำนวน</label>
                        <input type="number" name="amount" id="amount"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2">
                        
                    </div>

                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-gray-700">สถานที่ประจำ</label>
                        <select type="text" id="location_id" name="location_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2" />

                        >
                        <option value="">&nbsp;</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}"
                                {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}</option>
                        @endforeach
                        </select>

                        @error('location')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">สถานะการใช้งาน</label>
                        <select id="status" name="status" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="responsible_person_id"
                            class="block text-sm font-medium text-gray-700">ผู้รับผิดชอบ</label>
                        <select id="responsible_person_id" name="responsible_person_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2">
                            <option value="">&nbsp;</option>
                            @foreach ($people as $person)
                                <option value="{{ $person->id }}"
                                    {{ old('responsible_person_id') == $person->id ? 'selected' : '' }}>
                                    {{ $person->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('responsible_person')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">อัปโหลดภาพ (ถ้ามี)</label>
                        <input type="file" id="image" name="image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-2 py-2" />
                        @error('image')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <x-primary-button>
                            {{ __('บันทึกทรัพย์สิน') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="flex justify-begin mt-16 space-x-2 text-white">
                    <a href="{{ route('locations.create') }}">
                        <div class="text-[10px] border px-4 py-2 rounded-3xl bg-rose-500 ">+เพิ่มสถานที่</div>
                    </a>
                    <a href="{{ route('item-names.create') }}">
                        <div class="text-[10px] border px-4 py-2 rounded-3xl bg-teal-500 ">+เพิ่มรายการ</d>
                    </a>
                </div>
             

            </div>
        </div>
    </div>
</x-app-layout>
