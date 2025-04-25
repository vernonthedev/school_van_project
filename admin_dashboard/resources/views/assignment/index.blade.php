<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Assign Child to Van</h5>
                                <!-- Sorting Options -->
                                <form action="{{ route('assignment.index') }}" method="GET" class="d-inline">
                                    <label for="sort" class="form-label me-2">Sort By:</label>
                                    <select name="sort" id="sort" class="form-select d-inline w-auto" onchange="this.form.submit()">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="VanOperatorName" {{ request('sort') == 'VanOperatorName' ? 'selected' : '' }}>Van Operator Name</option>
                                    </select>
                                </form>
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Form to Assign Child to Van -->
                                <form action="{{ route('assignment.addChildToVan') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="VanID" class="form-label">Select Van</label>
                                        <select name="VanID" id="VanID" class="form-control" required>
                                            <option value="" disabled selected>Select a Van</option>
                                            @foreach ($vans as $van)
                                                <option value="{{ $van->VanID }}">{{ $van->NumberPlate }} (Capacity: {{ $van->VanCapacity }}, Operator: {{ $van->operator->VanOperatorName ?? 'N/A' }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ChildID" class="form-label">Select Child</label>
                                        <select name="ChildID" id="ChildID" class="form-control" required>
                                            <option value="" disabled selected>Select a Child</option>
                                            @foreach ($children as $child)
                                                <option value="{{ $child->ChildID }}">{{ $child->ChildName }} (Parent: {{ $child->parent->ParentName ?? 'N/A' }})</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ChildID'))
                                            <div class="text-danger mt-2">
                                                {{ $errors->first('ChildID') }}
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Assign Child to Van</button>
                                </form>

                                <hr>

                                <!-- List of Children Assigned to Vans -->
                                <h5 class="mt-4">Children Assigned to Vans</h5>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Child Name</th>
                                            <th>Parent Name</th>
                                            <th>Van NumberPlate</th>
                                            <th>Van Capacity</th>
                                            <th>Operator Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                <td>{{ $assignment->child->ChildName }}</td>
                                                <td>{{ $assignment->child->parent->ParentName ?? 'N/A' }}</td>
                                                <td>{{ $assignment->van->NumberPlate }}</td>
                                                <td>{{ $assignment->van->VanCapacity }}</td>
                                                <td>{{ $assignment->van->operator->VanOperatorName ?? 'N/A' }}</td>
                                                <td>

                                                    <a href="{{ route('assignment.edit', $assignment->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                                    <form action="{{ route('assignment.remove', $assignment->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to remove this assignment?')">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $assignments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>