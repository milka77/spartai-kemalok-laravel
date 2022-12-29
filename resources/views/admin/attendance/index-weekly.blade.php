<x-admin-master>
    @section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h1 class="text-center">Raid Attendance - Weekly Mythic Limit</h1>
            <hr>
  
            <div class="col-6 mx-auto text-center">
                <table class="table table-sm table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Previous Week</th>
                        <th>Current Week</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                      @foreach ($limits as $limit)
                        <tr>
                          <td>{{ $limit->id }}</td>
                          <td>{{ $limit->prev_week }}</td>
                          <td>{{ $limit->current_week }}</td>
                          <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('weeklymythic.edit', $limit->id) }}">Update</a>
                          </td>
                          <td>
                            <form action="{{ route('weeklymythic.destroy', $limit->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
      
                    <tfoot>
                        <th>ID</th>
                        <th>Previous Week</th>
                        <th>Current Week</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tfoot>
                  </table>
            </div>
  
          
          </div>
        </div>
      </div>
    @endsection
</x-admin-master>