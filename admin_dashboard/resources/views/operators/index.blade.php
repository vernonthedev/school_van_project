<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Van Operators</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <a href="{{ route('operators.create') }}" class="mb-3 btn btn-primary">Add New Operator</a>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>VanOperatorID</th>
                                            <th>VanOperatorName</th>
                                            <th>PhoneNumber</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($operators as $operator)
                                            <tr>
                                                <td>{{ $operator->VanOperatorID }}</td>
                                                <td>{{ $operator->VanOperatorName }}</td>
                                                <td>{{ $operator->PhoneNumber }}</td>
                                                <td>{{ $operator->Email }}</td>
                                                <td>
                                                    <a href="{{ route('operators.show', $operator->VanOperatorID) }}"
                                                        class="btn btn-info btn-sm">View</a>
                                                    <a href="{{ route('operators.edit', $operator->VanOperatorID) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('operators.destroy', $operator->VanOperatorID) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this operator?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $operators->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
