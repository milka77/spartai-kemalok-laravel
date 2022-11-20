<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Spec - Admin Panel</h1>
        <hr>
        @if(!empty($spec))
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Id</th>
                <th>Class</th>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($specs as $spec)
              <tr>
                <td>{{ $spec->id }}</td>
                <td>class</td>
                <td>{{ $spec->name }}</td>
                <td><a href="{{ route('spec.edit', $spec->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('spec.destroy', $spec->id) }}" method="POST">
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
                <th>Class</th>
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