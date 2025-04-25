<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Operator Details</div>

                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="card-title">{{ $operator->VanOperatorName }}</h5>
                                </div>

                                <div class="mb-3">
                                    <strong>Phone Number:</strong> {{ $operator->PhoneNumber }}
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong> {{ $operator->Email }}
                                </div>
                                <div class="mb-3">
                                    <strong>Operator ID:</strong> {{ $operator->VanOperatorID }}
                                </div>
                                <div class="mb-3">
                                    <strong>Created At:</strong> {{ $operator->created_at->format('M d, Y H:i') }}
                                </div>

                                <div class="mb-3">
                                    <strong>Last Updated:</strong> {{ $operator->updated_at->format('M d, Y H:i') }}
                                </div>

                                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ route('operators.edit', $operator->VanOperatorID) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('operators.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
