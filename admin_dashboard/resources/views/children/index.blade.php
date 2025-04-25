<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Children List</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <a href="{{ route('children.create') }}" class="mb-3 btn btn-primary">Add New Child</a>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ChildID</th>
                                            <th>ChildName</th>
                                            <th>Parent</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($children as $child)
                                        <tr>
                                                <td>{{ $child->ChildID }}</td>
                                                <td>{{ $child->ChildName }}</td>
                                                <td>{{ $child->parent->ParentName ?? 'N/A' }}</td>
                                                <td>{{ $child->parent->Address ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('children.show', $child->ChildID) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('children.edit', $child->ChildID) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('children.destroy', $child->ChildID) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this child?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $children->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
