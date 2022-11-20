<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <div class="mb-4">
        <h1 class="text-2xl text-center"><a class="text-red-500" href="{{ $members['guild']['url'] }}" target="_blank" rel="noopener noreferrer">{{'<'.$members['guild']['name'].'>'}}</a></h1>
        <p class="text-center">Taglista</p>
      </div>
            
      <div class="border-t border-zinc-600">
        {{-- Guild Roster Table --}}
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden px-2">
                <table class="min-w-full">
                  <thead class="border-b border-zinc-500">
                    <tr>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Nev</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Role</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Rang</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Faj</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Class</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Spec</th>
                      <th scope="col" class="text-sm font-medium py-4 text-left">Raider IO</th>
                      <th scope="col" colspan="3" class="text-sm font-medium py-4 text-center">Legmagasabb heti runok elozo / aktualis</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($members['members'] as $member)
                      <tr class="border-b border-zinc-500">
                        <td  class="py-1">
                          <a class="hover:text-violet-400" href="{{ route('guild.raiderio',  $member->character->name ) }}">
                            {{ $member->character->name }}
                          </a>
                        </td>
                        <td>{{ $member->character->active_spec_role }}</td>
                        <td>
                          @if ($member->rank === 0)
                            A Kemál
                          @elseif ($member->rank === 1)
                            Császárbáttya
                          @elseif ($member->rank === 3)
                            300 Testvér
                          @elseif ($member->rank === 5)
                            Dzsanázó
                          @else
                            {{ $member->rank }}
                          @endif
                        </td>
                        <td>{{ $member->character->race }}</td>
                        <td>{{ $member->character->class }}</td>
                        <td>{{ $member->character->active_spec_name }}</td>

                        <td><a class="hover:text-violet-400" href="{{ $member->character->profile_url }}" target="_blank" rel="noopener noreferrer">Raider IO profil</a></td>
                        <td class="text-center">
                          @foreach ($whd as $personal_previous_highest_key)
                            @if($member->character->name === $personal_previous_highest_key->name)

                              @foreach ($personal_previous_highest_key->mythic_plus_previous_weekly_highest_level_runs as $run)
                                @if($run->mythic_level >= 10)
                                  <span class="text-green-500">{{ $run->mythic_level }}</span>
                                  @break
                                @else
                                  <span class="text-red-500">{{ $run->mythic_level }}</span>
                                  @break
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                        </td>

                        <td>/</td>

                        <td class="text-center">
                          @foreach ($whd as $personal_highest_key)
                            @if($member->character->name === $personal_highest_key->name)

                              @foreach ($personal_highest_key->mythic_plus_weekly_highest_level_runs as $run)
                                @if($run->mythic_level >= 10)
                                  <span class="text-green-500">{{ $run->mythic_level }}</span>
                                  @break
                                @else
                                  <span class="text-red-500">{{ $run->mythic_level }}</span>
                                  @break
                                @endif
                              @endforeach
                            @endif
                            
                          @endforeach
                        </td>
                      </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        {{-- End Of Guild Roster Table --}}
        
          
        
      </div>
    </div>
  </div>
  @endsection
</x-home-master>