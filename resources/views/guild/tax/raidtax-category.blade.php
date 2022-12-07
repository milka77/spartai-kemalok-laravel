<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikák</h1>
      <h3 class="text-lg text-center mb-4">{{ $raidTaxCategory->name }}</h3>
      
      <div class="border-t border-zinc-600 mt-2 ">
        <div class="grid gap-2 grid-cols-1 place-items-center md:grid-cols-3 md:gap-0 md:gap-y-2 p-2">
          @foreach ($tactics as $tax)
          <div>
            <a href="{{ route('raidtax.show', $tax->id) }}">
              <img class="border border-zinc-500 rounded-lg hover:border-zinc-50 hover:brightness-110"
              src="{{ URL::to('/') }}/images/raidtax/{{ $tax->raidTaxCategory->initials }}/{{ $tax->slug }}.webp"
              alt="">
            </a>
          </div>
              
          @endforeach
          
        
      </div>

      

      
    </div>
  </div>

  @endsection
</x-home-master>