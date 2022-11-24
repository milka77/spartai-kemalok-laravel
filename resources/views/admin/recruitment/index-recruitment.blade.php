<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Recruitment - Admin Panel</h1>
        <hr>
        @if(!empty($recruitments))
          <table class="table table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Details</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recruitments as $rec)
              <tr>
                <td>{{ $rec->id }}</td>
                <td>{{ $rec->playable_class->name }}</td>
                <td>{{ $rec->comment }}</td>
                <td>
                  @if($rec->is_active == 1)
                    Active
                  @else
                    Not Active
                  @endif
                </td>
                <td><a href="{{ route('recruit.edit', $rec->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('recruit.destroy', $rec->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete <i class="fa-solid fa-trash-can"></i></button>  
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Details</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </tfoot>
          </table>
        @else
          <p class="text-center">No records found</p>
        @endif
      </div>
    </div>
  @endsection
</x-admin-master>