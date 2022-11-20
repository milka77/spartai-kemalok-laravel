<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Class - Admin Panel</h1>
        <hr>
        @if(!empty($classes))
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($classes as $class)
              <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->name }}</td>
                <td><a href="{{ route('class.edit', $class->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('class.destroy', $class->id) }}" method="POST">
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
                <th>Id</th>
                <th>Name</th>
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