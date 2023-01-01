<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="text-center">Professions - Admin Panel</h1>
          
          @if(!empty($professions))
          <table class="table ">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($professions as $prof)
              <tr>
                <td>{{ $prof->id }}</td>
                <td>{{ $prof->name }}</td>
                <td><a href="{{ route('prof.edit', $prof->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('prof.destroy', $prof->id) }}" method="POST">
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
          <p class="p-2 text-center">No Records Found</p>
          @endif
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>