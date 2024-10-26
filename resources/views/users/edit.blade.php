<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl">
            แก้ไขข้อมูลผู้ใช้งาน
        </div>
    </x-slot>
    <form action="{{ route('users.update',$user) }}" method="post">
        @csrf
        @method('PUT')
        <div class="max-w-3xl mx-auto p-8 bg-white mt-8 space-y-4">
            <div class="flex flex-col space-y-1">
                <x-label value="ชื่อ-สกุล" for="name" class="block" />
                <x-text-input type="text" name="name" id="name" :value="$user->name" class="w-full" />
            </div>
            <div class="flex flex-col space-y-1">
                <x-label value="อีเมล" for="email" class="block" />
                <x-text-input name="email" id="email" :value="$user->email" class="w-full" />
            </div>
            <div class="flex flex-col space-y-1">
                <x-label value="ระดับ" for="is_admin" class="block" />
                <select name="is_admin" id="is_admin" class="border px-2 py-1">
                    <option value="0">ผู้ใช้</option>
                    <option value="1">แอดมิน</option>
                </select>
            </div>
            <x-primary-button>บันทึก</x-primary-button>
        </div>
    </form>
</x-app-layout>
