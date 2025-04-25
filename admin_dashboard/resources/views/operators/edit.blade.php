<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Edit Operator</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('operators.update', $operator->VanOperatorID) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 form-group">
                                        <label for="OperatorName">VanOperatorName</label>
                                        <input type="text"
                                            class="form-control @error('OperatorName') is-invalid @enderror"
                                            id="OperatorName" name="VanOperatorName"
                                            value="{{ old('OperatorName', $operator->VanOperatorName) }}" required>
                                        @error('OperatorName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="OperatorName">PhoneNumber</label>
                                        <input type="text"
                                            class="form-control @error('OperatorName') is-invalid @enderror"
                                            id="OperatorName" name="PhoneNumber"
                                            value="{{ old('OperatorName', $operator->PhoneNumber) }}" required>
                                        @error('OperatorName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="OperatorName">Email</label>
                                        <input type="text"
                                            class="form-control @error('OperatorName') is-invalid @enderror"
                                            id="OperatorName" name="Email"
                                            value="{{ old('OperatorName', $operator->Email) }}" required>
                                        @error('OperatorName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary">Update Operator</button>
                                        <a href="{{ route('operators.index') }}" class="btn btn-secondary">Cancel</a>
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
