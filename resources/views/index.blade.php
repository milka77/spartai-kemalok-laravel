<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg flex gap-2 bg-zinc-800 md:container-fluid">
      
      {{-- Left side News feed --}}
      <div class="w-9/12 text-white rounded-lg p-2">
        <h1 class="text-2xl font-semibold text-center mb-2">Hírek</h1>
      
        @foreach ($news_index as $news)
            
        <article class="p-3 py-5 bg-zinc-700 rounded-lg mb-4">
          <div class="flex flex-col  border-b border-zinc-500">
            <div class="text-center border-t border-b border-zinc-500">
              
              <p class="text-xl p-2 pl-4 ">{{ $news->title  }}</p>
              {{-- <p class="capitalize text-lg p-2">{{ $news->category->name }}</p> --}}
            </div>
            <div class="py-4">
              @foreach (explode(';', $news->body) as $body)
                  <p class="p-2 first-of-type:pt-5 last-of-type:pb-5">{!! $body !!}</p>
              @endforeach
            </div>
            <div class=" border-b border-zinc-500 flex justify-center p-2 py-4">
              @if ( $news->category->id === 2)
                {{-- <img class="md:shrink-0 rounded-2xl grayscale hover:grayscale-0 transition-all ease-in-out duration-300 px-32" 
                src="{{ $news->file_path }}" alt="{{ $news->title }}"> --}}
                <img class="md:shrink-0 rounded-2xl grayscale hover:grayscale-0 transition-all ease-in-out duration-300 px-32" 
                src="http://wow-screenshots.com/upl/img/full_1460234631.6807454240.jpg" alt="">

              @else
                <img class="md:shrink-0 object-scale-down max-h-xs max-w-xs" src="https://assets.worldofwarcraft.com/static/components/Logo/Logo-horde.2a80e0466e51d85c8cf60336e16fe8b8.png" alt="">
                
              @endif
              
            </div>
          </div>
          
          <div class="flex justify-between border-b border-zinc-500">
            <span class="text-sm">{{ $news->created_at }} - Szerző: {{ $news->user->nickname }}</span> <span class="text-sm">{{ $news->category->name }}</span>
          </div>
        </article>
        @endforeach
        
        
        
      </div>
      
      {{-- End Of Left side News feed --}}

      {{-- Right side --}}
      <div class="w-3/12 pt-12 p-2">
        {{-- Recruitment --}}
        <div class="bg-zinc-700 text-white rounded-lg mb-4">
          <h2 class="text-center font-semibold text-xl p-2">Tagfelvétel</h2>
          <div class="px-4 py-2 border-t border-zinc-500">
            @foreach ($recruits as $rec)
              <div class="flex justify-between border-b border-zinc-500">
                <span>{{ $rec->playable_class->name }}: </span>
                <span class="font-semibold {{ $rec->is_active ? 'text-green-500' : 'text-red-600' }}">
                  @if($rec->is_active)
                    <a href="{{ route('guild.recruitment') }}">Open</a>
                  @else
                    Closed
                  @endif
                </span>
              </div>
            @endforeach
          </div>
        </div>
        {{-- End Of Recruitment --}}

        {{-- Progress --}}
        <div class="bg-zinc-700 rounded-lg text-white">
          <h2 class="text-center font-semibold text-xl p-2">Guild Progress</h2>
          
          <div class=" border-t border-zinc-500 flex  p-2 px-4">
            <table class="w-full">
              <thead>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="capitalize">Castle Nathia:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['castle-nathria']['summary'] }}</td>
                </tr>
                <tr>
                  <td class="capitalize">Fated castle nathria:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['fated-castle-nathria']['summary'] }}</td>
                </tr>
                <tr>
                  <td class="capitalize">Sanctum of domination:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['sanctum-of-domination']['summary'] }}</td>
                </tr>
                <tr>
                  <td class="capitalize">fated sanctum of domination:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['fated-sanctum-of-domination']['summary'] }}</td>
                </tr>
                <tr>
                  <td class="capitalize">sepulcher of the first ones:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['sepulcher-of-the-first-ones']['summary'] }}</td>
                </tr>
                <tr>
                  <td class="capitalize">fated sepulcher of the first ones:</td>
                  <td class="text-right">{{ $raid_progress['raid_progression']['fated-sepulcher-of-the-first-ones']['summary'] }}</td>

                </tr>
              </tbody>
            </table>
            
            
          </div>
        </div>
        {{-- End Of Progress --}}
        
        {{-- Discord Widget--}}
        <div class="w-auto mt-2">
          <iframe src="https://discord.com/widget?id=874016016483627038&theme=dark" width="100%" height="500px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

        </div>
        {{-- End Of Discord Widget--}}
        </div>
        
      </div>
      {{-- End Of Right side --}}
    </div>
  </div>
  @endsection
</x-home-master>