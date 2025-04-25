<div class="container">
<h2>drivers List</h2>
<a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">Create drivers</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>name</th><th>drivingPermit</th><th>phoneNumber</th><th>gender</th><th>address</th></tr>
    </thead>
    <tbody>
        @foreach ($drivers as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->drivingPermit}}</td>
<td>{{$item->phoneNumber}}</td>
<td>{{$item->gender}}</td>
<td>{{$item->address}}</td>
<td>
                        <a href="{{ route('drivers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('drivers.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>