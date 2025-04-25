<div class="container">
    <h2>Edit parentToStudent</h2>
    <form action="{{ route('parent_to_students.update', $parentToStudent->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $parentToStudent["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $parentToStudent["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" name="longitude" value="{{old("longitude", $parentToStudent["longitude"])}}">
            @error("longitude")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="latitude" class="form-label">latitude</label>
            <input type="text" class="form-control" name="latitude" value="{{old("latitude", $parentToStudent["latitude"])}}">
            @error("latitude")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phoneNumber" class="form-label">phoneNumber</label>
            <input type="text" class="form-control" name="phoneNumber" value="{{old("phoneNumber", $parentToStudent["phoneNumber"])}}">
            @error("phoneNumber")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="gender" class="form-label">gender</label>
            <input type="text" class="form-control" name="gender" value="{{old("gender", $parentToStudent["gender"])}}">
            @error("gender")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="occupation" class="form-label">occupation</label>
            <input type="text" class="form-control" name="occupation" value="{{old("occupation", $parentToStudent["occupation"])}}">
            @error("occupation")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="address" class="form-label">address</label>
            <input type="text" class="form-control" name="address" value="{{old("address", $parentToStudent["address"])}}">
            @error("address")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>