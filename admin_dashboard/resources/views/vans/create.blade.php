<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Assign New Van</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('vans.store') }}">
                                    @csrf

                                    <div class="mb-3 form-group">
                                        <label for="NumberPlate">NumberPlate</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('OperatorName') is-invalid @enderror"
                                            id="NumberPlate" name="NumberPlate" value="{{ old('NumberPlate') }}" required>
                                        <label for="VanCapacity">Van Capacity</label>
                                        <input type="number"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('OperatorName') is-invalid @enderror"
                                            id="VanCapacity" name="VanCapacity" value="{{ old('VanCapacity') }}" required>
                                        
                                        <div class="mb-4">
                                            <label for="VanOperatorID" class="block text-sm font-medium text-gray-600 mb-1">VanOperatorName</label>
                                            <div class="relative">
                                                <select name="VanOperatorID" id="VanOperatorID" 
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('ParentId') border-red-500 @enderror">
                                                    @foreach($operators as $operator)
                                                        <option value="{{ $operator->VanOperatorID }}">{{ $operator->VanOperatorName }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            @error('VanOperatorID')
                                                <span class="text-sm text-red-600 mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="DriverID" class="block text-sm font-medium text-gray-600 mb-1">Driver</label>
                                            <div class="relative">
                                                <select name="DriverID" id="DriverID" 
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('ParentId') border-red-500 @enderror">
                                                    @foreach($drivers as $driver)
                                                        <option value="{{ $driver->DriverID }}">{{ $driver->DriverName }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            @error('DriverID')
                                                <span class="text-sm text-red-600 mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Save Assignment</button>
                                        <a href="{{ route('vans.index') }}" class="btn btn-secondary">Cancel</a>
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
