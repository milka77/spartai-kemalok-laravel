<x-admin-master>
  @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col mx-auto">
          <h1 class="text-center">Craft - Admin Panel</h1>
          
          @if(!$crafts->isEmpty())
          <table class="table ">
            <thead>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Profession</th>
                <th>Name</th>
                <th>Quality</th>
                <th>Comment</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($crafts as $craft)
                @if (Auth()->user()->id === $craft->user_id)
                <tr>
                  <td>{{ $craft->id }}</td>
                  <td>{{ $craft->user->nickname }}</td>
                  <td>{{ $craft->profession->name }}</td>
                  <td>{{ $craft->name }}</td>
                  <td>{{ $craft->quality }}</td>
                  <td>{{ $craft->comment }}</td>
                  <td><a href="{{ route('craft.edit', $craft->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td>
                    <form action="{{ route('craft.destroy', $craft->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-outline-danger" type="submit">Delete <i class="fa-solid fa-trash-can"></i></button>  
                    </form>
                  </td>
                </tr>
                @elseif (Auth()->user()->userHasRole('admin'))
                <tr>
                  <td>{{ $craft->id }}</td>
                  <td>{{ $craft->user->nickname }}</td>
                  <td>{{ $craft->profession->name }}</td>
                  <td>{{ $craft->name }}</td>
                  <td>{{ $craft->quality }}</td>
                  <td>{{ $craft->comment }}</td>
                  <td><a href="{{ route('craft.edit', $craft->id) }}" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td>
                    <form action="{{ route('craft.destroy', $craft->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-outline-danger" type="submit">Delete <i class="fa-solid fa-trash-can"></i></button>  
                    </form>
                  </td>
                </tr>
                @endif
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Profession</th>
                <th>Name</th>
                <th>Quality</th>
                <th>Comment</th>
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