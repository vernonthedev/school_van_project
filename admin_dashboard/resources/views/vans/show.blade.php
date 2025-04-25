<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Van Assignment Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $van->VanID }}</h5>
                                </div>

                                <div class="mb-3">
                                    <strong>NumberPlate:</strong> {{ $van->NumberPlate }}
                                </div>

                                <div class="mb-3">
                                    <strong>VanCapacity:</strong> {{ $van->VanCapacity }}
                                </div>

                                <div class="mb-3">
                                    <strong>VanOperatorName:</strong> {{ $van->operator->VanOperatorName ?? 'N/A' }}
                                </div>

                                <div class="mb-3">
                                    <strong>DriverName:</strong> {{ $van->driver->DriverName ?? 'N/A' }}
                                </div>

                                {{-- <div class="mb-3">
                                    <strong>Created At:</strong> {{ $van->created_at->format('M d, Y H:i') }}
                                </div>

                                <div class="mb-3">
                                    <strong>Last Updated:</strong> {{ $van->updated_at->format('M d, Y H:i') }}
                                </div> --}}

                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('vans.edit', $van->VanID) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('vans.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
