<div class="container">
    <h2>Create vans</h2>
    <form action="{{ route('vans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="driver_id" class="form-label">driver_id</label>
            <input type="text" class="form-control" name="driver_id" value="{{old("driver_id")}}">
            @error("driver_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="operator_id" class="form-label">operator_id</label>
            <input type="text" class="form-control" name="operator_id" value="{{old("operator_id")}}">
            @error("operator_id")
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
            <label for="numberPlate" class="form-label">numberPlate</label>
            <input type="text" class="form-control" name="numberPlate" value="{{old("numberPlate")}}">
            @error("numberPlate")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="vanCapacity" class="form-label">vanCapacity</label>
            <input type="text" class="form-control" name="vanCapacity" value="{{old("vanCapacity")}}">
            @error("vanCapacity")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>