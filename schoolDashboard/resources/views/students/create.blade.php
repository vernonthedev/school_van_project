<div class="container">
    <h2>Create students</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="parent_to_student_id" class="form-label">parent_to_student_id</label>
            <input type="text" class="form-control" name="parent_to_student_id" value="{{old("parent_to_student_id")}}">
            @error("parent_to_student_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="class" class="form-label">class</label>
            <input type="text" class="form-control" name="class" value="{{old("class")}}">
            @error("class")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="gender" class="form-label">gender</label>
            <input type="text" class="form-control" name="gender" value="{{old("gender")}}">
            @error("gender")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>