<x-admin-master>
  @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col">
        <h1 class="text-center">Raid Attendance - Weekly Mythic Limit</h1>
        <hr>

        <div class="col-4 mx-auto">
          <form action="{{ route('weeklymythic.store') }}" method="post">
              @csrf
              <div class="mb-2">
                <label class="form-label" for="prev_week">Previous Week Mythic Limit: </label>
                <input class="form-control" type="text" name="prev_week">
              </div>
              <div class="mb-2">
                <label class="form-label" for="current_week">Current Week Mythic Limit: </label>
                <input class="form-control" type="text" name="current_week">
              </div>
              <div class="d-flex">
                <div class="mx-auto">
                  <a class="btn btn-outline-danger" href="{{ route('weeklymythic.index') }}">Cancel</a>
                  <button class="btn btn-success" type="submit">Add</button>
                </div>
              </div>
          </form>
        </div>

        
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>