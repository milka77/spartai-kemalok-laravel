<x-home-master>
  @section('content')
  <div class="flex justify-center px-1">
    <div class="w-full md:w-2/3 min-h-full p-3 rounded-lg bg-zinc-800 text-gray-200 mb-5">
      <h1 class="text-2xl text-center mb-4">Heti legnagyobb kulcs runok</h1>

      <div class="border-t border-b border-zinc-600 mb-3 pt-2 flex flex-col md:flex-row  md:gap-5 md:p-2">
        {{-- Thumbnail pic --}}
        <div class="mx-auto md:my-auto pb-2 md:pb-0">
          <img class="h-auto w-auto" src="{{ $data->thumbnail_url }}" alt="">
        </div>
        {{-- End Of Thumbnail pic --}}

        {{-- Character Info --}}
        <div class="md:w-1/3">
          <ul>
            <li class="flex justify-between px-2 md:px-0">Character: <span class="{{ strtolower($data->class) }}"> {{ $data->name }} </span></li>
            <li class="flex justify-between bg-slate-700 md:bg-zinc-800 px-2 md:px-0">Race: <span class="{{ strtolower($data->class) }}"> {{ $data->race }} </span></li>
            <li class="flex justify-between px-2 md:px-0">Class:  <span class="{{ strtolower($data->class) }}"> {{ $data->class }} </span></li>
            <li class="flex justify-between bg-slate-700 md:bg-zinc-800 px-2 md:px-0">Achievement Points:  <span class="{{ strtolower($data->class) }}"> {{ $data->achievement_points }} </span></li>
          </ul>
        </div>
        {{-- End Of Character Info --}}

        {{-- Gear / Tanlent info --}}
        <div class="md:w-1/3">
          <ul>
            <li class="flex justify-between px-2 md:px-0">ilvl: <span class="text-right {{ strtolower($data->class) }}">{{ $data->gear->item_level_equipped }} </span> </li>
            <li class="flex justify-between bg-slate-700 md:bg-zinc-800 px-2 md:px-0">
              Talent string: <input type=text hidden id="talent_string" value="{{ $data->talentLoadout->loadout_text }}">
              <span class="{{ strtolower($data->class) }}">
                <a href="https://www.wowhead.com/talent-calc/blizzard/{{ $data->talentLoadout->loadout_text }}" target="_blank" rel="noopener noreferrer"> Talent Calculator  </a>
                <i class="fas fa-clipboard hover:text-slate-400 cursor-pointer" onclick="copyTalent()"></i>
              </span>
            </li>
            <li class="flex justify-between px-2 md:px-0">Active Spec: <span class="{{ strtolower($data->class) }}"> {{ $data->active_spec_name }}  </span></li>
            <li class="flex justify-between bg-slate-700 md:bg-zinc-800 px-2 md:px-0">Season M+ Score: 
              <span class="{{ strtolower($data->class) }}">
              @foreach ($data->mythic_plus_scores_by_season as $score)
                {{ $score->scores->all }}                
              @endforeach
              </span>
            </li>
          </ul>
        </div>
        {{-- End Of Gear / Tanlent info --}}
      </div>

      {{-- Raider.Io Weekly highest dungeon runs table --}}
      <div class="flex flex-col bg-zinc-900 mb-4">
        <div class="py-2 inline-block min-w-full">
          @if(!empty($data->mythic_plus_weekly_highest_level_runs))
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
          @else 
          <div class="text-center">
            <span class="{{ strtolower($data->class) }}">{{ $data->name }}</span>  még nem ment Mythic+ instát a héten.
          </div>
          @endif
        </div>
      </div>
      {{-- End Of Raider.Io Weekly highest dungeon runs table --}}

      <div class="flex justify-center">
        <a class="p-3 rounded-lg bg-red-900 hover:bg-red-900/75 hover:text-slate-400" href="{{ route('guild.roster') }}">Vissza a taglistahoz</a>
      </div>
    </div>
  </div>
  @endsection

  @section('extra-js')
  <script>
    function copyTalent() {
      // Get the talent string
      let talent = document.getElementById('talent_string');

      // Select the text field
      talent.select();
      talent.setSelectionRange(0, 99999); // For mobile devices

      // Copy the text from the field
      navigator.clipboard.writeText(talent.value);

      // Alert the copied text
      alert("Talent import string copied: " + talent.value);
    }
  </script>
  @endsection
</x-home-master>