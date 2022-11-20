<x-admin-master>

  @section('content')
  
  <div class="container">
      <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>
      <hr>
      @if(auth()->user()->userHasRole('admin'))
      <div class="row justify-content-center">
          <div class="col-6">
            <h3 class="text-center">Users</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th class="text-right">Data</tr>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>All users</td>
                  <td class="text-right"><?= count($users); ?></td>
                </tr>
                <tr>
                  <td>Newest user</td>
                  <td class="text-right">{{ $users->last()->name }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        @endif

        <!-- Right side -->
        <div class="col-6">
          <h3 class="text-center">News</h3>
          {{-- <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-right">Data</tr>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>All recipies</td>
                  <td class="text-right"><?= /*  count($recipies); ?></td>
                </tr>
                <tr>
                  <td>Latest recipe</td>
                  <td class="text-right">
                    @if(count($recipies) === 0) 
                      No records found in the database
                    @else
                      <a href="{{ route('recipe.show', $recipies->last()->id )}}">{{ $recipies->last()->name }}</a>
                    @endif
                  </td>
                </tr>
              </tbody>
            </table> --}}
          </div>
        </div>
        <!-- ./Right side -->
    </div>
  @endsection

</x-admin-master>