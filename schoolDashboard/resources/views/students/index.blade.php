<div class="container">
<h2>students List</h2>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Create students</a>
<table class="table">
    <thead>
        <tr><th>parent_to_student_id</th><th>name</th><th>class</th><th>gender</th></tr>
    </thead>
    <tbody>
        @foreach ($students as $item)
                <tr>
                    <td>{{$item->parent_to_student_id}}</td>
<td>{{$item->name}}</td>
<td>{{$item->class}}</td>
<td>{{$item->gender}}</td>
<td>
                        <a href="{{ route('students.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $item->id) }}" method="POST" style="display:inline;">
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