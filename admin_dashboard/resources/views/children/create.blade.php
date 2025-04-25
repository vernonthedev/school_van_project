<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register Child</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('children.store') }}" class="p-4">
                                    @csrf
                                
                                    <div class="mb-4">
                                        <label for="ChildName" class="block text-sm font-medium text-gray-600 mb-1">ChildName</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('ChildName') border-red-500 @enderror"
                                            id="ChildName" name="ChildName" value="{{ old('ChildName') }}" required>
                                        @error('ChildName')
                                            <span class="text-sm text-red-600 mt-1">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    <div class="mb-4">
                                        <label for="ParentID" class="block text-sm font-medium text-gray-600 mb-1">Parent</label>
                                        <div class="relative">
                                            <select name="ParentId" id="ParentID" 
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('ParentId') border-red-500 @enderror">
                                                @foreach($parents as $parent)
                                                    <option value="{{ $parent->ParentID }}">{{ $parent->ParentName }}</option>
                                                @endforeach
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('ParentId')
                                            <span class="text-sm text-red-600 mt-1">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    <div class="flex justify-end space-x-2 mt-6">
                                        <a href="{{ route('children.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">Cancel</a>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">Save Child</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
