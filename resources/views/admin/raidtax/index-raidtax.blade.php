<x-admin-master>
  @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h1 class="text-center">Raid Tactics - Admin Panel</h1>
          <hr>

          <div>
            <table class="table table-hover">
              <thead class="thead-dark">
                <th>id</th>
                <th>Raid Category</th>
                <th>Boss</th>
                <th>Author</th>
                <th>Created at</th>
                <th>Update</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @foreach ($raid_taxes as $raid_tax)
                  <tr>
                    <td>{{ $raid_tax->id }}</td>
                    <td>{{ $raid_tax->raidTaxCategory->name }}</td>
                    <td>{{ $raid_tax->boss_name }}</td>
                    <td>{{ $raid_tax->user->nickname }}</td>
                    <td>{{ $raid_tax->created_at }}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('raidtax.edit', $raid_tax->id) }}">Update</a></td>
                    <td>
                      <form action="{{ route('raidtax.destroy', $raid_tax->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>

              <tfoot class="thead-dark">
                <th>id</th>
                <th>Raid Category</th>
                <th>Boss</th>
                <th>Author</th>
                <th>Created at</th>
                <th>Update</th>
                <th>Delete</th>
              </tfoot>
            </table>
          </div>

          <div class="d-flex flex-row">
            <div class="mx-auto">
              {{ $raid_taxes->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  </x-admin-master>