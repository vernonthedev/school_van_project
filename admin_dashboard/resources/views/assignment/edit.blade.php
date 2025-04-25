<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Edit Assignment</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('assignment.update', $assignment->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Child Dropdown -->
                                    <div class="mb-3 form-group">
                                        <label for="ChildID">Select Child</label>
                                        <select name="ChildID" id="ChildID" class="form-control" required>
                                            @foreach($children as $child)
                                                <option value="{{ $child->ChildID }}" 
                                                    {{ $assignment->ChildID == $child->ChildID ? 'selected' : '' }}>
                                                    {{ $child->ChildName }} (Parent: {{ $child->parent->ParentName ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ChildID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Van Dropdown -->
                                    <div class="mb-3 form-group">
                                        <label for="VanID">Select Van</label>
                                        <select name="VanID" id="VanID" class="form-control" required>
                                            @foreach($vans as $van)
                                                <option value="{{ $van->VanID }}" 
                                                    {{ $assignment->VanID == $van->VanID ? 'selected' : '' }}>
                                                    {{ $van->VanName }} (Capacity: {{ $van->VanCapacity }}, Operator: {{ $van->operator->VanOperatorName ?? 'N/A' }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('VanID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Buttons -->
                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Update Assignment</button>
                                        <a href="{{ route('assignment.index') }}" class="btn btn-secondary">Cancel</a>
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