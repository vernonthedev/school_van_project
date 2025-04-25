<div class="container">
    <h2>Edit trip</h2>
    <form action="{{ route('trips.update', $trip->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="van_id" class="form-label">van_id</label>
            <input type="text" class="form-control" name="van_id" value="{{old("van_id", $trip["van_id"])}}">
            @error("van_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="van_student_id" class="form-label">van_student_id</label>
            <input type="text" class="form-control" name="van_student_id" value="{{old("van_student_id", $trip["van_student_id"])}}">
            @error("van_student_id")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="sourceRoute" class="form-label">sourceRoute</label>
            <input type="text" class="form-control" name="sourceRoute" value="{{old("sourceRoute", $trip["sourceRoute"])}}">
            @error("sourceRoute")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="destinationRoute" class="form-label">destinationRoute</label>
            <input type="text" class="form-control" name="destinationRoute" value="{{old("destinationRoute", $trip["destinationRoute"])}}">
            @error("destinationRoute")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="startTime" class="form-label">startTime</label>
            <input type="text" class="form-control" name="startTime" value="{{old("startTime", $trip["startTime"])}}">
            @error("startTime")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="endTime" class="form-label">endTime</label>
            <input type="text" class="form-control" name="endTime" value="{{old("endTime", $trip["endTime"])}}">
            @error("endTime")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="dateOfTrip" class="form-label">dateOfTrip</label>
            <input type="text" class="form-control" name="dateOfTrip" value="{{old("dateOfTrip", $trip["dateOfTrip"])}}">
            @error("dateOfTrip")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="tripStatus" class="form-label">tripStatus</label>
            <input type="text" class="form-control" name="tripStatus" value="{{old("tripStatus", $trip["tripStatus"])}}">
            @error("tripStatus")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>