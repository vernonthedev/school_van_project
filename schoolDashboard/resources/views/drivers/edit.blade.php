<div class="container">
    <h2>Edit driver</h2>
    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" name="user_id" value="{{old("user_id", $driver["user_id"])}}">
            @error("user_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $driver["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="drivingPermit" class="form-label">drivingPermit</label>
            <input type="text" class="form-control" name="drivingPermit" value="{{old("drivingPermit", $driver["drivingPermit"])}}">
            @error("drivingPermit")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phoneNumber" class="form-label">phoneNumber</label>
            <input type="text" class="form-control" name="phoneNumber" value="{{old("phoneNumber", $driver["phoneNumber"])}}">
            @error("phoneNumber")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="gender" class="form-label">gender</label>
            <input type="text" class="form-control" name="gender" value="{{old("gender", $driver["gender"])}}">
            @error("gender")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="address" class="form-label">address</label>
            <input type="text" class="form-control" name="address" value="{{old("address", $driver["address"])}}">
            @error("address")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>