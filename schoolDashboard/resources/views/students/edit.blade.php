<div class="container">
    <h2>Edit student</h2>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="parent_to_student_id" class="form-label">parent_to_student_id</label>
            <input type="text" class="form-control" name="parent_to_student_id" value="{{old("parent_to_student_id", $student["parent_to_student_id"])}}">
            @error("parent_to_student_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $student["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="class" class="form-label">class</label>
            <input type="text" class="form-control" name="class" value="{{old("class", $student["class"])}}">
            @error("class")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="gender" class="form-label">gender</label>
            <input type="text" class="form-control" name="gender" value="{{old("gender", $student["gender"])}}">
            @error("gender")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>