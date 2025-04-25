<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Add New Driver</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('drivers.store') }}">
                                    @csrf

                                    <div class="mb-3 form-group">
                                        <label for="DriverName">Driver Name</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('DriverName') is-invalid @enderror"
                                            id="DriverName" name="DriverName" value="{{ old('DriverName') }}" required>
                                        @error('DriverName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group">
                                        <label for="DriverPermit">Driver Permit</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('DriverPermit') is-invalid @enderror"
                                            id="DriverPermit" name="DriverPermit" value="{{ old('DriverPermit') }}"
                                            required>
                                        @error('DriverPermit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Save Driver</button>
                                        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancel</a>
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
