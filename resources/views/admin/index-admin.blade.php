<x-admin-master>

  @section('content')
  
  <div class="container">
    <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>
    @if(auth()->user()->userHasRole('admin'))
    {{-- Quick Links --}}
    <div class="row bg-white p-4 border rounded mb-4">
      <div class="col-12 mb-3">
        <h2 class="text-center">Admin Quick Links Buttons</h2>
      </div>
      <div class="col-12 d-flex">
        <div class="mx-auto">
          <a class="btn btn-primary" href="{{ route('home') }}">Kemalok.hu</a>
          <a class="btn btn-primary" href="{{ route('news.create') }}">Add News</a>
          <a class="btn btn-primary" href="{{ route('news.index') }}">Show All News</a>
          <a class="btn btn-primary" href="{{ route('raidtax.create') }}">Add Raid Tactic</a>
          <a class="btn btn-primary" href="{{ route('raidtax.adminindex') }}">Show Raid Tactics</a>
          <a class="btn btn-primary" href="{{ route('recruit.adminindex') }}">Manage Recruitment</a>
        </div>
      </div>
    </div>
    {{-- End Of Quick Links --}}

    <div class="row justify-content-center">
      <div class="col-6">
        <h3 class="text-center">Users</h3>
        <table class="table table-sm">
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

        <h3 class="text-center">News & Raid Tactics</h3>
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Name</th>
              <th class="text-right">Nr</tr>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>News</td>
              <td class="text-right">{{ count($news) }}</td>
            </tr>
            <tr>
              <td>Raid Tactics</td>
              <td class="text-right">{{ count($raid_tactics) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
        

      <!-- Right side -->
      <div class="col-6">
        <h3 class="text-center">Admin Modules Versions</h3>
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Name</th>
              <th class="text-right">Ver</tr>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Admin Dashboard</td>
              <td class="text-right">v0.2b</td>
            </tr>
            <tr>
              <td>News</td>
              <td class="text-right">v0.3</td>
            </tr>
            <tr>
              <td>Raid Tactics</td>
              <td class="text-right">v0.3</td>
            </tr>
            <tr>
              <td>Recruitments</td>
              <td class="text-right">v0.3</td>
            </tr>
            <tr>
              <td>Users</td>
              <td class="text-right">v0.3</td>
            </tr>
            <tr>
              <td>Roles</td>
              <td class="text-right">v0.3</td>
            </tr>
          </tbody>
        </table>
        
      </div>
      <!-- ./Right side -->
      @endif
    </div>
  </div>
    @endsection

</x-admin-master>