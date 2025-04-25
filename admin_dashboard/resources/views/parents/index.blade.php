<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Parent List</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <a href="{{ route('parents.create') }}" class="mb-3 btn btn-primary">Add New Parent</a>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ParentID</th>
                                            <th>ParentName</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>Address</th>
                                            <th>PhoneNumber</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parents as $parent)
                                            <tr>
                                                <td>{{ $parent->ParentID }}</td>
                                                <td>{{ $parent->ParentName }}</td>
                                                <td>{{ $parent->Longitude }}</td>
                                                <td>{{ $parent->Latitude }}</td>
                                                <td>{{ $parent->Address }}</td>
                                                <td>{{ $parent->PhoneNumber }}</td>
                                                <td>{{ $parent->Email }}</td>
                                                <td>
                                                    <a href="{{ route('parents.show', $parent->ParentID) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('parents.edit', $parent->ParentID) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('parents.destroy', $parent->ParentID) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this parent?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $parents->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
