<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Drivers List</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <a href="{{ route('drivers.create') }}" class="mb-3 btn btn-primary">Add New Driver</a>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>DriverID</th>
                                            <th>Driver Name</th>
                                            <th>Driver Permit</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drivers as $driver)
                                            <tr>
                                                <td>{{ $driver->DriverID }}</td>
                                                <td>{{ $driver->DriverName }}</td>
                                                <td>{{ $driver->DriverPermit }}</td>
                                                <td>
                                                    <a href="{{ route('drivers.show', $driver->DriverID) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('drivers.edit', $driver->DriverID) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('drivers.destroy', $driver->DriverID) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this driver?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $drivers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
