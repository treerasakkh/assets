<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('แก้ไขสินทรัพย์') }}: {{ $asset->itemName->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('assets.update', $asset) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="item_name_id" class="block text-sm font-medium text-gray-700">รายการ</label>
                        <select id="item_name_id" name="item_name_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2">
                            @foreach ($itemNames as $itemName)
                                <option value="{{ $itemName->id }}"
                                    {{ $asset->item_name_id == $itemName->id ? 'selected' : '' }}>
                                    {{ $itemName->name }}</option>
                            @endforeach
                        </select>
                        @error('item_name_id')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="brand_model" class="block text-sm font-medium text-gray-700">แบรนด์/โมเดล</label>
                        <input type="text" id="brand_model" name="brand_model"
                            value="{{ old('brand_model', $asset->brand_model) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2" />
                        @error('brand_model')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="location_id" class="block text-sm font-medium text-gray-700">สถานที่</label>
                        <select id="location_id" name="location_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}"
                                    {{ $asset->location_id == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}</option>
                            @endforeach
                        </select>

                        @error('location_id')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">สถานะ</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" {{ $asset->status == $status ? 'selected' : '' }}>
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

                        <select id="responsible_person_id" name="responsible_person_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2">
                            @foreach ($people as $person)
                                <option value="{{ $person->id }}"
                                    {{ $asset->responsible_person_id == $person->id ? 'selected' : '' }}>
                                    {{ $person->name }}</option>
                            @endforeach
                        </select>
                        @error('responsible_person_id')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">อัปโหลดภาพ (ถ้ามี)</label>
                        <input type="file" id="image" name="image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2" />
                        @error('image')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <x-primary-button>
                            {{ __('บันทึกการแก้ไข') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
