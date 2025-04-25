<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Trip Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Origin:</strong><br>
                                    Longitude: {{ $trip->origin['longitude'] ?? 'N/A' }}<br>
                                    Latitude: {{ $trip->origin['latitude'] ?? 'N/A' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Destination:</strong><br>
                                    Longitude: {{ $trip->destination['longitude'] ?? 'N/A' }}<br>
                                    Latitude: {{ $trip->destination['latitude'] ?? 'N/A' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Van Location:</strong><br>
                                    Longitude: {{ $trip->van_location['longitude'] ?? 'N/A' }}<br>
                                    Latitude: {{ $trip->van_location['latitude'] ?? 'N/A' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Trip Started:</strong> {{ $trip->is_started ? 'Yes' : 'No' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Trip Completed:</strong> {{ $trip->is_complete ? 'Yes' : 'No' }}
                                </div>

                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('trips.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
