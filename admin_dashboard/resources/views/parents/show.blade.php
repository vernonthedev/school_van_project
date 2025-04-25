<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Parent Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $parent->ParentName }}</h5>
                                </div>

                                <div class="mb-3">
                                    <strong>ParentID:</strong> {{ $parent->ParentID }}
                                </div>

                                <div class="mb-3">
                                    <strong>Longitude:</strong> {{ $parent->Longitude }}
                                </div>

                                <div class="mb-3">
                                    <strong>Latitude:</strong> {{ $parent->Latitude }}
                                </div>

                                <div class="mb-3">
                                    <strong>Address:</strong> {{ $parent->Address }}
                                </div>

                                <div class="mb-3">
                                    <strong>PhoneNumber:</strong> {{ $parent->PhoneNumber }}
                                </div>

                                <div class="mb-3">
                                    <strong>Email:</strong> {{ $parent->Email}}
                                </div>

                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('parents.edit', $parent->ParentID) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('parents.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
