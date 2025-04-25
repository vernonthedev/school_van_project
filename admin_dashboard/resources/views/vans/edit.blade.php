<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Edit Van Assignment</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('vans.update', $van->VanID) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 form-group">
                                        <label for="NumberPlate">NumberPlate</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('OperatorName') is-invalid @enderror"
                                            id="NumberPlate" name="NumberPlate" value="{{ old('NumberPlate', $van->NumberPlate) }}" required>
                                        <label for="VanCapacity">Van Capacity</label>
                                        <input type="number"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('OperatorName') is-invalid @enderror"
                                            id="VanCapacity" name="VanCapacity" value="{{ old('VanCapacity', $van->VanCapacity )}}" required>
                                        
                                        <div class="mb-3 form-group">
                                            <label for="VanOperatorID">VanOperatorName</label>
                                            <select name="VanOperatorID" id="VanOperatorID" class="form-control">
                                                @foreach($operators as $operator)
                                                    <option value="{{ $operator->VanOperatorID }}" 
                                                        {{ $van->VanOperatorID == $operator->VanOperatorID ? 'selected' : '' }}>
                                                        {{ $operator->VanOperatorName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('VanOperatorID')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 form-group">
                                            <label for="DriverID">DriverName</label>
                                            <select name="DriverID" id="DriverID" class="form-control">
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->DriverID }}" 
                                                        {{ $van->DriverID == $driver->DriverID ? 'selected' : '' }}>
                                                        {{ $driver->DriverName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('DriverID')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Update Assignment</button>
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
