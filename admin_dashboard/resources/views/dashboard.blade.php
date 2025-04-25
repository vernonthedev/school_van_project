<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="card-title fw-semibold mb-4">Total Children</h5>
                        <div class="card">
                            <div class="card-body">
                                <i class="ti ti-user fs-6"></i>
                                <h5 class="card-title">{{ $totalChildren }} Children</h5>

                                <a href="{{ route('children.index') }}" class="card-link">View All</a>
                                <a href="#" class="card-link">Delete All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="card-title fw-semibold mb-4">Total Drivers</h5>
                        <div class="card">
                            <div class="card-body">
                                <i class="ti ti-user fs-6"></i>
                                <h5 class="card-title">{{ $totalDrivers }} Drivers</h5>

                                <a href="{{ route('drivers.index') }}" class="card-link">View All</a>
                                <a href="#" class="card-link">Delete All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="card-title fw-semibold mb-4">Total vans</h5>
                        <div class="card">
                            <div class="card-body">
                                <i class="ti ti-user fs-6"></i>
                                <h5 class="card-title">{{ $totalVans }}  Vans</h5>

                                <a href="{{ route('vans.index') }}" class="card-link">View All</a>
                                <a href="#" class="card-link">Delete All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div>
                    <h1 class="h3">Today's Attendance</h1>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Child Name</th>
                            <th scope="col">Pick Time</th>
                            <th scope="col">Drop off time</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td><button class="btn btn-info">boarded</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td><button class="btn btn-info">boarded</button></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td><button class="btn btn-info">boarded</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
