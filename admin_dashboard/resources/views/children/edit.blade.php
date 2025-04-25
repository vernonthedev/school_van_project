<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Edit Child</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('children.update', $children->ChildID) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Child Name -->
                                    <div class="mb-3 form-group">
                                        <label for="ChildName">Child Name</label>
                                        <input type="text"
                                            class="form-control @error('ChildName') is-invalid @enderror"
                                            id="ChildName" name="ChildName" 
                                            value="{{ old('ChildName', $children->ChildName) }}" required>
                                        @error('ChildName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Parent Dropdown -->
                                    <div class="mb-3 form-group">
                                        <label for="ParentID">Parent</label>
                                        <select name="ParentId" id="ParentID" class="form-control">
                                            @foreach($parents as $parent)
                                                <option value="{{ $parent->ParentID }}" 
                                                    {{ $children->ParentId == $parent->ParentID ? 'selected' : '' }}>
                                                    {{ $parent->ParentName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ParentId')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    {{-- <div class="mb-3 form-group">
                                        <label for="Address">Address</label>
                                        <input type="text"
                                            class="form-control @error('Address') is-invalid @enderror"
                                            id="Address" name="Address" 
                                            value="{{ old('Address', $children->parent->Address ?? '') }}">
                                        @error('Address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <!-- Buttons -->
                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Update Child</button>
                                        <a href="{{ route('children.index') }}" class="btn btn-secondary">Cancel</a>
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
