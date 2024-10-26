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

                <div class="w-full overflow-x-auto bg-white rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-indigo-50 to-blue-50">
                            <tr>
                                <th scope="col" class="sticky left-0 px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider bg-gradient-to-r from-indigo-50 to-blue-50">
                                    รายการ
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    จำนวน
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    สถานที่ประจำ
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    สถานะ
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    การดำเนินการ
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($assets as $asset)
                                <tr class="hover:bg-gray-50 even:bg-gray-50/30">
                                    <td class="sticky left-0 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 bg-white even:bg-gray-50/30">
                                        {{ $asset->itemName->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $asset->amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $asset->location->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $asset->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex">
                                        <a href="{{ route('assets.show', $asset) }}" 
                                           class="text-teal-600 hover:text-teal-900 transition-colors duration-200">
                                            <x-icons.view class="w-4 h-4" />
                                        </a>
                                        <a href="{{ route('assets.edit', $asset) }}" 
                                           class="text-yellow-600 hover:text-yellow-900 transition-colors duration-200">
                                            <x-icons.edit class="w-4 h-4" />
                                        </a>
                                        @if (auth()->user()->is_admin)
                                            <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                                    <x-icons.bin class="w-4 h-4" />
                                                </button>
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
    </div>
</x-app-layout>
