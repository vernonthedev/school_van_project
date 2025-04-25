<div class="container">
<h2>vans List</h2>
<a href="{{ route('vans.create') }}" class="btn btn-primary mb-3">Create vans</a>
<table class="table">
    <thead>
        <tr><th>driver_id</th><th>operator_id</th><th>name</th><th>numberPlate</th><th>vanCapacity</th></tr>
    </thead>
    <tbody>
        @foreach ($vans as $item)
                <tr>
                    <td>{{$item->driver_id}}</td>
<td>{{$item->operator_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->numberPlate}}</td>
<td>{{$item->vanCapacity}}</td>
<td>
                        <a href="{{ route('vans.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('vans.destroy', $item->id) }}" method="POST" style="display:inline;">
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