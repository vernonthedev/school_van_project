<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Driver Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $driver->DriverName }}</h5>
                                </div>

                                <div class="mb-3">
                                    <strong>Driver ID:</strong> {{ $driver->DriverID }}
                                </div>

                                <div class="mb-3">
                                    <strong>Driver Permit:</strong> {{ $driver->DriverPermit }}
                                </div>

                                <div class="mb-3">
                                    <strong>Created At:</strong> {{ $driver->created_at->format('M d, Y H:i') }}
                                </div>

                                <div class="mb-3">
                                    <strong>Last Updated:</strong> {{ $driver->updated_at->format('M d, Y H:i') }}
                                </div>

                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('drivers.edit', $driver->DriverID) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
