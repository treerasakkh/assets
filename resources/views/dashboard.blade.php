<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('แดชบอร์ด') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                <x-bill-board :amount="$numberOfAssets" label="ทรัพย์สิน" :url="route('assets.index')" />
                <x-bill-board :amount="$numberOfLocations" label="สถานที่" :url="route('locations.index')" />
                <x-bill-board :amount="$numberOfUsers" label="ผู้รับผิดชอบ" :url="route('responsible-people.index')" />
                @if (auth()->user()->is_admin)
                    <x-bill-board :amount="$numberOfUsers" label="ผู้ใช้" :url="route('users.index')" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
