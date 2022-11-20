<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Guild Roster</h1>
     
      <div class="border-t border-zinc-600">
        {{-- Guild Roster Table --}}
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table class="min-w-full">
                  <thead class="border-b">
                    <tr>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        #
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Nev
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Szint
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Rang
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Faj
                      </th>
                      <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Class
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nr = 0; ?>
                    @for ($i=0; $i<count($guild_members['members']) ; $i++)
                    <?php $rank = $guild_members['members'][$i]['rank']; ?>
                    @if ($rank == 0 || $rank == 2 || $rank == 3 || $rank == 5)
                    <?php $nr++; ?>
                    <tr class="border-b border-zinc-600">
                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium"><?= $nr ?></td>

                        <td class="text-sm font-light px-6 py-3 whitespace-nowrap">
                          <a class="hover:text-violet-400" href="{{ route('guild.raiderio',  $guild_members['members'][$i]['character']['name'] ) }}">
                            {{ $guild_members['members'][$i]['character']['name'] }}
                          </a>
                        </td>

                        <td class="text-sm font-light px-6 py-3 whitespace-nowrap">
                          {{ $guild_members['members'][$i]['character']['level'] }}
                        </td>

                        <td class="text-sm font-light px-6 py-3 whitespace-nowrap">
                          @if ($rank === 0)
                            <?= 'A Kemál' ?>
                          @elseif ($rank === 2)
                            <?= 'Császárbáttya' ?>
                          @elseif ($rank === 3)
                            <?= '300 Testvér' ?>
                          @elseif ($rank === 5)
                            <?= 'Dzsanázó' ?>
                          @else
                            <?php echo $rank ?>
                          @endif
                        </td>

                        <td class="text-sm font-light px-6 py-3 whitespace-nowrap">
                         @for($r=0; $r<count($races['races']); $r++)
                          @if ($guild_members['members'][$i]['character']['playable_race']['id'] === $races['races'][$r]['id'])
                            {{ $races['races'][$r]['name'] }}
                          @endif
                         @endfor
                        </td>

                        <td class="text-sm font-light px-6 py-3 whitespace-nowrap">
                          @for($c=0; $c<count($classes['classes']) ; $c++)
                            @if ($guild_members['members'][$i]['character']['playable_class']['id'] === $classes['classes'][$c]['id'])
                              {{ $classes['classes'][$c]['name'] }}
                            @endif
                          @endfor
                        </td>

                      </tr>  
                      @endif
                    @endfor
                    
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