<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="text-center">Raid Tactics Category - Admin Panel</h1>
    
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
              @foreach ($raid_tax_cat as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td><a href="{{ route('raidtaxcat.edit', $category->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                  <form action="{{ route('raidtaxcat.destroy', $category->id) }}" method="POST">
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
                <th>delete</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  @endsection
  </x-admin-master>