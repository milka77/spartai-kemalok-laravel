<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg flex flex-col gap-2 bg-zinc-800 lg:container-fluid lg:flex-row">
      
      {{-- Left side News feed --}}
      <div class="w-full lg:w-8/12 xl:w-9/12 text-white rounded-lg p-2">
        <h1 class="text-2xl font-semibold text-center mb-2">Hírek</h1>
        
      
        @foreach ($news_index as $news)
        
        <article class="p-3 py-5 bg-zinc-700 rounded-lg mb-4">
          <div class="flex flex-col  border-b border-zinc-500">
            <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
              
              <p class="text-xl p-2">{{ $news->title  }}</p>

            </div>
            {{-- News Body --}}
            @if($news->category->id == 1)
            <div class="p-4 flex justify-between">
              <div class="w-full">{!! $news->body !!}</div>

              <div class="hidden md:inline-flex">
                <img class="md:shrink-0 object-scale-down max-h-32 max-w-xs" 
                    src="https://assets.worldofwarcraft.com/static/components/Logo/Logo-horde.2a80e0466e51d85c8cf60336e16fe8b8.png" 
                    alt="Horda Logo">
              </div>
            </div>
              @if(!empty($news->file_path))
              <div class="w-2/3 flex mx-auto">
                <button id="news-img-{{ $news->id }}"  class="modal-btn">
                  <img class="md:shrink-0 rounded-2xl px-2 md:px-32" src="{{ $news->file_path }}" alt="{{ $news->title }}" data-modal-id="{{ $news->id }}">
                </button>
              </div>
              @endif
            @else
            <div class="p-4">
              {!! $news->body !!}
            </div>
            @endif
            {{-- End Of News Body --}}

            <div class=" border-b border-zinc-500 flex justify-center p-2 py-4">
              @if ( $news->category->id === 2)
                @if(!empty($news->file_path))
                <button id="news-img-{{ $news->id }}" class="modal-btn">
                  <img class="md:shrink-0 rounded-2xl px-2 md:px-32" src="{{ $news->file_path }}" alt="{{ $news->title }}"  data-modal-id="{{ $news->id }}">
                </button>
                @endif
              @else
                
              @endif
              
            </div>
          </div>
          
          <div class="flex justify-between border-b border-zinc-500">
            <span class="text-sm">{{ $news->created_at }} - Szerző: {{ $news->user->nickname }}</span> 
            {{-- <span class="text-sm">Comments: 0</span> --}}
            <span class="text-sm">{{ $news->category->name }}</span>
          </div>

          {{-- Image Modal --}}
         
          <div id="overlay-{{ $news->id }}" class="bg-black bg-opacity-90 fixed inset-0 z-20 hidden flex-col justify-center items-center p-30">
            <div class="text-right w-4/5 py-1 pr-1"><i id="modal-close-{{ $news->id }}" data-modal-id="{{ $news->id }}" class=" modal-close-btn cursor-pointer fa-solid fa-xmark hover:text-stone-500"></i></div>
            <div class="w-4/5 h-[90%] flex justify-center">
              <img class="rounded-xl" src="{{ $news->file_path }}" >
            </div>
            <div class="text-left w-4/5 p-1">
              <a class="hover:text-stone-500" href="{{ $news->file_path }}" target="_blank" rel="noopener noreferrer">Eredeti kep mutatasa</a>
            </div>
          </div>
         
          {{-- End of Image Modal --}}
        </article>
        @endforeach
        
        
        
      </div>
      
      {{-- End Of Left side News feed --}}

      {{-- Right side --}}
      <div class="w-full lg:w-4/12 xl:w-3/12 pt-12 p-2">
        {{-- Recruitment --}}
        <div class="bg-zinc-700 text-white rounded-lg mb-4 pt-5">

          <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
            <h2 class="text-center font-semibold text-xl p-2">Tagfelvétel</h2>
          </div>

          <div class="px-4 py-2 border-t border-zinc-500">
            @if($recruits_is_active)
              @foreach ($recruits as $rec)
                <div class="flex justify-between border-b border-zinc-500">
                  <span class="{{ strtolower($rec->playable_class->name) }}">{{ $rec->playable_class->name }}: </span>
                  <span class="font-semibold {{ $rec->is_active ? 'text-green-500' : 'text-red-600' }}">
                    @if($rec->is_active)
                      @if($rec->priority)
                        <a href="{{ route('guild.recruitment') }}">Open <small><i class="fas fa-angle-double-up"></i></small></a>
                      @else
                        <a href="{{ route('guild.recruitment') }}" class="text-orange-500">Open <small><i class="fas fa-angle-up"></i></small> </a>
                      @endif
                    @else
                      Closed <small><i class="fas fa-times"></i></small> 
                    @endif
                  </span>
                </div>
              @endforeach
              <p class="py-2 text-sm">Tobb infoert kattints barmelyik nyitott class-ra.</p>
            @else
              <div class=" border-b border-zinc-500">
                <p class="p-2 text-center">
                  Jelenleg kiemelten egyetlen classt sem keresünk, viszont kiemelkedő teljesítményű raiderek és mythic+ orientált játékosok jelentkezését továbbra is szívesen fogadjuk.
                </p>
                <p class="p-2 text-center">
                  Vedd fel a kapcsolatot valamelyik officerrel a játékban vagy discordon.
                </p>
              </div>
            @endif
          </div>
        </div>
        {{-- End Of Recruitment --}}

        {{-- Progress --}}
        <div class="w-auto min-w-fit bg-zinc-700 rounded-lg text-white pt-5 mb-4">
          {{-- Declare shorthand version for raid progression arrays --}}
          <?php $voti_prog = $raid_progress['raid_progression']['vault-of-the-incarnates']?>

          <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
            <h2 class="text-center font-semibold text-xl p-2">Guild Progress</h2>
          </div>
          
          <div class=" border-t border-zinc-500 flex  p-2 px-4">
            <table class="w-full">
              <thead>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="capitalize">Vault of the Incarnates:</td>
                  <td class="text-right">{{ $voti_prog['summary'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">Normal:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['normal_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">Heroic:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['heroic_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">mythic:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['mythic_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
              </tbody>
            </table>
            
            
          </div>
        </div>
        {{-- End Of Progress --}}
        
        {{-- Discord Widget--}}
        <div class="w-auto mt-2">
          <iframe src="https://discord.com/widget?id=478499711263703070&theme=dark" width="100%" height="500px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

        </div>
        {{-- End Of Discord Widget--}}
        </div>
        
      </div>
      {{-- End Of Right side --}}
    </div>
  </div>
  @endsection

  @section('extra-js')
  <script>
      const newsImages = document.querySelectorAll('.modal-btn');
      const modalCloseBtn = document.querySelectorAll('.modal-close-btn')

      const toggleClasses = (overlayId) => {
        const overlay = document.querySelector('#overlay-' + overlayId);

        overlay.classList.toggle('hidden')
        overlay.classList.toggle('flex')
      }

      newsImages.forEach(el => el.addEventListener('click', event => {
        const overlayId = event.target.dataset.modalId
        toggleClasses(overlayId)
      }))

      modalCloseBtn.forEach(el => el.addEventListener('click', event => {
        const overlayId = event.target.dataset.modalId
        toggleClasses(overlayId)
        
      }))

  </script>
  @endsection
</x-home-master>