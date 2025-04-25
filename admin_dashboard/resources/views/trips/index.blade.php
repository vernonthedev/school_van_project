<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Trip List</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <a href="{{ route('trips.create') }}" class="mb-3 btn btn-primary">Available Trips</a>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Start Location</th>
                                            <th>End Location</th>
                                            <th>Current Location</th>
                                            <th>Trip Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Trip Status</th>
                                            <th>Trip Started</th>
                                            <th>Trip Completed</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trips as $trip)
                                            <tr>
                                                <td>
                                                    Latitude: {{ $trip->start_latitude ?? 'N/A' }}<br>
                                                    Longitude: {{ $trip->start_longitude ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    Latitude: {{ $trip->end_latitude ?? 'N/A' }}<br>
                                                    Longitude: {{ $trip->end_longitude ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    Latitude: {{ $trip->current_latitude ?? 'N/A' }}<br>
                                                    Longitude: {{ $trip->current_longitude ?? 'N/A' }}
                                                </td>
                                                <td>{{ $trip->date ?? 'N/A' }}</td>
                                                <td>{{ $trip->start_time ? $trip->start_time->format('H:i:s') : 'N/A' }}</td>
                                                <td>{{ $trip->end_time ? $trip->end_time->format('H:i:s') : 'N/A' }}</td>
                                                <td>{{ ucfirst($trip->trip_status ?? 'N/A') }}</td>
                                                <td>{{ $trip->is_started ? 'Yes' : 'No' }}</td>
                                                <td>{{ $trip->is_complete ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-info btn-sm">View</a>
                                                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this trip?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $trips->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
