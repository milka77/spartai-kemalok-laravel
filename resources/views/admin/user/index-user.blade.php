<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center mb-3">Users - Admin Panel</h1>    
            
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</td>
            <th>Name</td>
            <th>Nickname</td>
            <th>Email</td>
            <th>Role</th>
            <th>Registered</td>
            <th>Functions</td>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->nickname }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @foreach ($user->roles as $role )
                  {{ $role->name }}
              @endforeach </td>
            <td>{{ $user->created_at }}</td>
            <td class="d-flex flex-row">
              <a class="btn btn-primary text-white mr-2" href="{{ route('user.show', $user->id) }}">Show</a>
              <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-outline-danger" type="submit" value="Delete">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Id</td>
            <th>Name</td>
            <th>Nickname</td>
            <th>Email</td>
            <th>Role</th>
            <th>Registered</td>
            <th>Functions</td>
          </tr>
        </tfoot>
      </table>

      <div class="row">
        <div class="col-4">
          Showing ({{ $users->firstItem() }} to {{ $users->lastItem() }}) of {{ $users->total() }} entries

        </div>
        <div class="col-8 pagination">
         
            {{ $users->links() }}
         
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>