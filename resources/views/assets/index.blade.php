<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ทรัพย์สินทั้งหมด') }}
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
                <div class="flex justify-end mb-4 mr-0">
                    <a href="{{ route('assets.create') }}">
                        <x-icons.add class="size-10 text-blue-800" />
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                รายการ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                จำนวน</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                สถานที่ประจำ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                สถานะ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($assets as $asset)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $asset->itemName->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $asset->amount }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $asset->location->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-600">{{ $asset->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                    <a href="{{ route('assets.show', $asset) }}"
                                        class="text-teal-600 hover:text-teal-900 mr-2"><x-icons.view class="size-4" /></a>
                                    <a href="{{ route('assets.edit', $asset) }}"
                                        class="text-yellow-600 hover:text-yellow-900 mr-2"><x-icons.edit class="size-4" /></a>
                                    @if (auth()->user()->is_admin)
                                        <form action="{{ route('assets.destroy', $asset) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"><x-icons.bin class="size-4" /></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
