<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-white text-xl mb-4">< Add Category</h2> 
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="text-gray-400 block mb-2">Category</label> 
                        <input type="text" name="name" class="w-full bg-gray-900 text-white border-gray-700 rounded-md" placeholder="Electronic"> 
                    </div>
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('category.index') }}" class="text-gray-400 py-2">Cancel</a> [
                        
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md">Save Category</button> [
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>