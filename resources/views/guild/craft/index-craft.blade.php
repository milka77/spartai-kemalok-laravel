<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-5/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center">Guild Crafts</h1>

      <p class="p-2 text-center mb-4">Ki, mit, miért tud craftolni</p>
     
      <div class="border-t border-zinc-600">
        <table class="table-auto w-full">
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
            @if (!empty($crafts))
              @foreach ($crafts as $craft)
                <tr class="text-center border-y border-zinc-600">
                  <td>{{ $craft->user->nickname }}</td>
                  <td><a class="hover:text-zinc-400" href="{{ route('guild.prof', $craft->profession_id) }}">{{ $craft->profession->name }}</a></td>
                  <td class="hidden md:table-cell">{{ Str::title($craft->name) }}</td>
                  <td><a href="{{ $craft->wowhead_link }}"></a></td>
                  <td class="md:flex justify-center"><img class="h-10 w-10" src="{{ URL::to('/') }}/images/craft/{{ $craft->quality }}.png" alt="{{ $craft->quality }}"></td>
                  <td>{{ $craft->comment }}</td>
                </tr>
              @endforeach
            @else
                <p class="-2">No records found</p>
            @endif
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
        <div class="p-2">{{ $crafts->links()->total }}{{ $crafts->links('pagination::tailwind') }}</div>       
      </div>
    </div>
  </div>
  @endsection

  @section('extra-js')
  <script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
  <script src="https://wow.zamimg.com/js/tooltips.js"></script>
  @endsection
</x-home-master>