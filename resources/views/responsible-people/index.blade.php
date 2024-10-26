<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl">ผู้รับผิดชอบ</div>
    </x-slot>
    <div class="bg-white max-w-2xl p-8 mx-auto mt-4">
        <div class="flex justify-end">
            @if (auth()->user()->is_admin)
                <a href="{{ route('responsible-people.create') }}">
                    <x-icons.add class="size-10 text-blue-800" />
                </a>
            @endif
        </div>
        <div class="py-1 px-2 font-semibold">รายชื่อผู้รับผิดชอบ</div>
        @foreach ($people as $person)
            <div class="flex space-x-2 py-1 px-2 even:bg-gray-100">
                <div>{!! $loop->iteration < 10 ? '0' : '' !!}{{ $loop->iteration }}</div>
                <div>{{ $person->name }}</div>
            </div>
        @endforeach
    </div>
</x-app-layout>
