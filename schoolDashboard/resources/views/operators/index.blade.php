<div class="container">
<h2>operators List</h2>
<a href="{{ route('operators.create') }}" class="btn btn-primary mb-3">Create operators</a>
<table class="table">
    <thead>
        <tr><th>user_id</th><th>name</th><th>phoneNumber</th><th>address</th><th>gender</th><th>title</th></tr>
    </thead>
    <tbody>
        @foreach ($operators as $item)
                <tr>
                    <td>{{$item->user_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->phoneNumber}}</td>
<td>{{$item->address}}</td>
<td>{{$item->gender}}</td>
<td>{{$item->title}}</td>
<td>
                        <a href="{{ route('operators.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('operators.destroy', $item->id) }}" method="POST" style="display:inline;">
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