<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="w-1/2 p-3 rounded-lg bg-zinc-800 text-white mb-5">
      <h1 class="text-2xl text-center mb-4">Heti legnagyobb kulcs runok</h1>

      <div class="border-t border-b border-zinc-600 p-2 flex gap-5">
        {{-- Thumbnail pic --}}
        <div class="my-auto">
          <img class="h-auto w-auto" src="{{ $data->thumbnail_url }}" alt="">
        </div>
        {{-- End Of Thumbnail pic --}}

        {{-- Character Info --}}
        <div>
          <ul>
            <li>Character: {{ $data->name }} </li>
            <li>Race: {{ $data->race }} </li>
            <li>Class: {{ $data->class }} </li>
            <li>Active Spec: {{ $data->active_spec_name }} </li>
          </ul>
        </div>
        {{-- End Of Character Info --}}
      </div>

      {{-- Raider.Io Weekly highest dungeon runs table --}}
      <div class="flex flex-col bg-zinc-900 mb-4">
        <div class="py-2 inline-block min-w-full">
          <div class="overflow-hidden">
            <table class="w-full justify-center">
              <thead>
                <tr class="border-b border-zinc-600">
                  <th>M+ Level</th>
                  <th>Dungeon</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->mythic_plus_weekly_highest_level_runs as $run)
                <tr class="text-center border-b border-zinc-600">
                  <td>{{ $run->mythic_level }}</td>
                  <td>{{ $run->dungeon }}</td>
                  <td><a class="hover:text-violet-900" href="{{ $run->url }}" target="_blank">Raider.io</a></td>
                
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{-- End Of Raider.Io Weekly highest dungeon runs table --}}

      <div class="flex justify-center">
        <a class="p-3 rounded-lg bg-red-900 hover:bg-red-900/75 hover:text-slate-400" href="{{ route('guild.roster') }}">Vissza a taglistahoz</a>
      </div>
    </div>
  </div>
  @endsection
</x-home-master>