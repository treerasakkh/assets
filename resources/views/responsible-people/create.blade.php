<x-app-layout>
    <x-slot name="header">
        เพิ่มผู้รับผิดชอบ
    </x-slot>
    <div class="bg-white mt-4 max-w-2xl mx-auto p-8">
        <form method="POST" action="{{ route('responsible-people.store') }}">
            @csrf
            <label for="name" class="font-semibold">ชื่อ-สกุลผู้รับผิดชอบ</label>
            <input type="text" name="name" id="name" class="border rounded-xm px-2 py-1 block w-full my-2"
                >
            @error('name')
                <span class="text-red-500 italic">{{ $message }}</span>
            @enderror
            <div class="flex justify-center">
                <x-primary-button class="mt-2">บันทึก</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
