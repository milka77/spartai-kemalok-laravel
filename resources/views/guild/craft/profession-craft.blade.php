<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-5/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-1">Guild Crafts</h1>
      <h1 class="text-xl text-center {{ !auth()->user() ? 'mb-4' : 'mb-2' }}">{{ $profession->name }}</h1>

      @if(auth()->user())
      <div class="flex justify-center mb-3">
        <a class="btn px-4 py-2 rounded-md bg-red-900 hover:text-zinc-400" href="{{ route('craft.create') }}">Új Craft Recept Hozzáadása</a>
      </div>
      @endif
     
      <div class="border-t border-zinc-600">
        @if (!empty($crafts))
          <table class="table w-full mb-4">
            <thead>
            <tr class="bg-slate-900">
              <th>Név</th>
              <th>Profession</th>
              <th class="hidden md:table-cell">Recept név</th>
              <th>Item</th>
              <th>Quality</th>
              <th>Comment</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($crafts as $craft)
                <tr class="text-center border-y border-zinc-600">
                  <td>{{ $craft->user->nickname }}</td>
                  <td>{{ $craft->profession->name }}</td>
                  <td class="hidden md:table-cell">{{ Str::title($craft->name) }}</td>
                  <td><a href="{{ $craft->wowhead_link }}"></a></td>
                  <td class="md:flex justify-center"><img class="h-10 w-10" src="{{ URL::to('/') }}/images/craft/{{ $craft->quality }}.png" alt="{{ $craft->quality }}"></td>
                  <td class="whitespace-normal">{{ $craft->comment }}</td>
                </tr>
              @endforeach
            </tbody>
            <thead>
              <tr class="bg-slate-900 border-b border-zinc-600">
               <th>Név</th>
               <th>Profession</th>
               <th class="hidden md:table-cell">Recept név</th>
               <th>Item</th>
               <th>Quality</th>
               <th>Comment</th>
              </tr>
             </thead>
          </table> 
        @else
            <p class="p-2 text-center">No records found</p>
        @endif
        <div class="flex justify-center">
          <a class="btn px-4 py-3 rounded-md bg-red-900 hover:text-zinc-400" href="{{ route('guild.craft') }}">Vissza</a>
        </div>
        @if (!empty($crafts))
        <div class="p-2">{{ $crafts->links()->total }}{{ $crafts->links('pagination::tailwind') }}</div>  
        @endif     
      </div>
    </div>
  </div>
  @endsection

  @section('extra-js')
  <script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
  <script src="https://wow.zamimg.com/js/tooltips.js"></script>
  @endsection
</x-home-master>