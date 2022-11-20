<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1 class="text-center">Raid Difficulty - Admin Panel</h1>
          <hr>

          <div class="mb-4">
            @if(!empty($raid_difficulties))
              <table class="table table-hover">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Update</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  @foreach ($raid_difficulties as $raid_diff)
                    <tr>
                      <td>{{ $raid_diff->id }}</td>
                      <td>{{ $raid_diff->name }}</td>
                      <td><a class="btn btn-sm btn-primary" href="{{ route('raidtaxdiff.edit', $raid_diff->id) }}">Update</a></td>
                      <td>
                        <form action="{{ route('raidtaxdiff.destroy', $raid_diff->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>        
                  @endforeach
                </tbody>
                <tfoot class="border-bottom">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tfoot>
              </table>
            @else
              <p class="text-center">No records found</p>
            @endif
          </div>
          <div class="d-flex">
            <div class="mx-auto">
              <a class="btn btn-success" href="{{ route('raidtaxdiff.create') }}">Add New Difficulty</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  </x-admin-master>