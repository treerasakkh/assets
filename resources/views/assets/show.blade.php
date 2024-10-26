<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายละเอียดทรัพย์สิน') }}: {{ $asset->itemName->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex justify-end mb-4">
                    <a href="{{ route('assets.edit', $asset) }}"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        ✏️ แก้ไข
                    </a>
                    @if (auth()->user()->id== $asset->user->id)
                        <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                ลบ
                            </button>
                        </form>
                    @endif
                </div>

                <div>
                    <h3 class="font-bold">ข้อมูลทรัพย์สิน:</h3>
                    <p><strong>รายการ:</strong> {{ $asset->itemName->name }}</p>
                    <p><strong>ยี่ห้อ/รุ่น:</strong> {{ $asset->brand_model }}</p>
                    <p><strong>จำนวน:</strong> {{ $asset->amount }}</p>
                    <p><strong>สถานที่ประจำ:</strong> {{ $asset->location->name }}</p>
                    <p><strong>สถานะการใช้งาน:</strong> {{ $asset->status }}</p>
                    <p><strong>ผู้รับผิดชอบ:</strong> {{ $asset->responsiblePerson->name }}</p>
                    <p><strong>ผู้บันทึก:</strong> {{ $asset->user->name }}</p>
                    <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->name }}"
                        class="mt-4 lg:w-1/2 w-full">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
