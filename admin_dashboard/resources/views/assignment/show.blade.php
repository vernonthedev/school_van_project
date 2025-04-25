<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Child Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $children->ChildName }}</h5>
                                </div>

                                <div class="mb-3">
                                    <strong>ChildID:</strong> {{ $children->ChildID }}
                                </div>

                                <div class="mb-3">
                                    <strong>Child Name:</strong> {{ $children->ChildName }}
                                </div>

                                <div class="mb-3">
                                    <strong>Parent:</strong> {{ $children->parent->ParentName ?? 'N/A' }}
                                </div>

                                <div class="mb-3">
                                    <strong>Address:</strong> {{ $children->parent->Address ?? 'N/A' }}
                                </div>

                               
                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('children.edit', $children->ChildID) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('children.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
