<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Add New Parent</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('parents.store') }}">
                                    @csrf

                                    <div class="mb-3 form-group">
                                        <label for="ParentName">ParentName</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('ParentName') is-invalid @enderror"
                                            id="ParentName" name="ParentName" value="{{ old('ParentName') }}" required>
                                        @error('ParentName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group">
                                        <label for="Longitude">Longitude</label>
                                        <input type="number" step="any"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('Longitude') is-invalid @enderror"
                                            id="Longitude" name="Longitude" value="{{ old('Longitude') }}"
                                            required>
                                        @error('Longitude')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="Latitude">Latitude</label>
                                        <input type="number" step="any"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('Latitude') is-invalid @enderror"
                                            id="Latitude" name="Latitude" value="{{ old('Latitude') }}"
                                            required>
                                        @error('Latitude')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="Address">Address</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('Address') is-invalid @enderror"
                                            id="Address" name="Address" value="{{ old('Address') }}"
                                            required>
                                        @error('Address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="PhoneNumber">PhoneNumber</label>
                                        <input type="tel"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('PhoneNumber') is-invalid @enderror"
                                            id="PhoneNumber" name="PhoneNumber" value="{{ old('PhoneNumber') }}"
                                            required>
                                        @error('PhoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="Email">Parent's Email</label>
                                        <input type="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 @error('Email') is-invalid @enderror"
                                            id="Email" name="Email" value="{{ old('Email') }}"
                                            required>
                                        @error('Email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Save Parent</button>
                                        <a href="{{ route('parents.index') }}" class="btn btn-secondary">Cancel</a>
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
