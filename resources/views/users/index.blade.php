<x-app-layout>
    <x-slot name="header" >
        <div class="font-semibold text-xl">
            ผู้ใช้งาน
        </div>
    </x-slot>
    <div class="max-w-3xl mx-auto p-8 bg-white mt-8">
        <div class="grid grid-cols-3 font-semibold">
            <div>รายชื่อ</div>
            <div>อีเมล</div>
            <div>ระดับ</div>
        </div>
        @foreach ($users as $user)
            <div class="grid grid-cols-2 lg:grid-cols-3 py-4">
                <a href="{{ route('users.edit', $user) }}">
                    <div class="text-blue-500 font-semibold">{{ $user->name }}</div>
                </a>
                <div>{{ $user->email }}</div>
                <div class="text-gray-400">{{ $user->is_admin==0?'ผู้ใช้':'แอดมิน' }}</div>
            </div>
        @endforeach
    </div>
</x-app-layout>
