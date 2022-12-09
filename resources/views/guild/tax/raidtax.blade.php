<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikák</h1>
  

      <div class="border-t border-zinc-600 mt-2 ">
        <div class="grid gap-2 grid-cols-1 place-items-center md:grid-cols-3 md:gap-0 md:gap-y-2 p-2">
          @foreach ($categories as $cat)
          <div>
            <a href="{{ route('raidtax.cat.show', $cat->id) }}">
              <img class="border border-zinc-500 rounded-lg hover:border-zinc-50 hover:brightness-110"
              src="{{ URL::to('/') }}/images/raidtax/{{ $cat->slug }}.webp"
              alt="{{ $cat->name }}">
            </a>
          </div>
          @endforeach
        </div>
        
      </div>

      

      
    </div>
  </div>

  @endsection
</x-home-master>