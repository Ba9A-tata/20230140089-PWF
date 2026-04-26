<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-white">Category List</h2>
                <p class="text-gray-400">Manage your category</p>
            </div>

            <div class="flex justify-end mb-4">
                <a href="{{ route('category.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-150">
                    +Add Category
                </a>
            </div>

            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                NAME
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                TOTAL PRODUCT
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">
                                ACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse ($categories as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                {{ $item->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                {{ $item->products_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                                <a href="{{ route('category.edit', $item->id) }}" class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</a>
                                
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin mau hapus kategori ini?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                No categories found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>