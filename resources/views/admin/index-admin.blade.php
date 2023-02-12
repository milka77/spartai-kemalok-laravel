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
      <div class="col-12 d-flex justify-center flex-wrap">
        
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('home') }}">Kemalok.hu</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('news.create') }}">Add News</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('news.index') }}">Show All News</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('raidtax.create') }}">Add Raid Tactic</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('raidtax.adminindex') }}">Show Raid Tactics</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('recruit.adminindex') }}">Manage Recruitment</a>
          <a class="btn btn-primary mr-2 mb-2" href="{{ route('weeklymythic.index') }}">Manage Weekly M+ Limit</a>
        
      </div>
    </div>
    {{-- End Of Quick Links --}}

    <div class="row justify-content-center">
      <div class="col-6">
        <div class="rounded border p-2 bg-white mb-2">
          <h3 class="text-center">Mythic+ Weekly Limits</h3>
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-right">Data</tr>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Previous Weekly Limit</td>
                <td class="text-right">{{ $prev_limit }}</td>
              </tr>
              <tr>
                <td>Currrent Weekly Limit</td>
                <td class="text-right">{{ $current_limit }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="rounded border p-2 bg-white mb-2">
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
        </div>

        <div class="rounded border p-2 bg-white mb-2">
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

        <div class="rounded border p-2 bg-white mb-2">
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
                <td class="text-right">v0.5</td>
              </tr>
              <tr>
                <td>Raid Tactics</td>
                <td class="text-right">v0.5</td>
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
      </div>
        

      <!-- Right side -->
      <div class="col-6">
        <div class="rounded border p-2 bg-white mb-2">
          <h3 class="text-center">Update Logs</h3>
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Update Description</th>
                <th class="text-right">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Added comment funcionality to news page. Users are able to comment on the news and edit or delete thier own comments.</td>
                <td class="text-right">12.02.2023</td>
              </tr>
              <tr>
                <td>Added Weekly m+ limits. Admins are able to set the previous and current weekly M+ limit from the admin site</td>
                <td class="text-right">29.12.2022</td>
              </tr>
              <tr>
                <td>Refactored create raid tactics - By default, 2 phases are shown the rest can be added with a button if required up to 5.</td>
                <td class="text-right">23.12.2022</td>
              </tr>
              <tr>
                <td>Added mythic options for all phases in the raid tax section</td>
                <td class="text-right">22.12.2022</td>
              </tr>
              
            </tbody>
          </table>
        </div>
        
      </div>
      <!-- ./Right side -->
      @endif
    </div>
  </div>
    @endsection

</x-admin-master>