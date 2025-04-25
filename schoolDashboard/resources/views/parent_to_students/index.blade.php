<div class="container">
<h2>parent_to_students List</h2>
<a href="{{ route('parent_to_students.create') }}" class="btn btn-primary mb-3">Create parent_to_students</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>name</th><th>longitude</th><th>latitude</th><th>phoneNumber</th><th>gender</th><th>occupation</th><th>address</th></tr>
    </thead>
    <tbody>
        @foreach ($parent_to_students as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->longitude}}</td>
<td>{{$item->latitude}}</td>
<td>{{$item->phoneNumber}}</td>
<td>{{$item->gender}}</td>
<td>{{$item->occupation}}</td>
<td>{{$item->address}}</td>
<td>
                        <a href="{{ route('parent_to_students.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('parent_to_students.destroy', $item->id) }}" method="POST" style="display:inline;">
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