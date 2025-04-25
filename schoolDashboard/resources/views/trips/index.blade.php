<div class="container">
<h2>trips List</h2>
<a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Create trips</a>
<table class="table">
    <thead>
        <tr><th>van_id</th><th>van_student_id</th><th>sourceRoute</th><th>destinationRoute</th><th>startTime</th><th>endTime</th><th>dateOfTrip</th><th>tripStatus</th></tr>
    </thead>
    <tbody>
        @foreach ($trips as $item)
                <tr>
                    <td>{{$item->van_id}}</td>
<td>{{$item->van_student_id}}</td>
<td>{{$item->sourceRoute}}</td>
<td>{{$item->destinationRoute}}</td>
<td>{{$item->startTime}}</td>
<td>{{$item->endTime}}</td>
<td>{{$item->dateOfTrip}}</td>
<td>{{$item->tripStatus}}</td>
<td>
                        <a href="{{ route('trips.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('trips.destroy', $item->id) }}" method="POST" style="display:inline;">
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