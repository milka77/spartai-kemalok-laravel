<x-home-master>
    @section('content')
    <div class="flex justify-center">
      <div class="w-full lg:w-4/6 p-3 rounded-lg bg-zinc-800 text-white m-10">
        <div class="p-4 text-center">
          <p class="p-2 text-lg">Hiba: 404</p>
        
          <p class="p-2 mb-9">A keresett oldal nem található.</p>  
          <p class="p-2"><a class="px-4 py-3 rounded-md bg-red-900 hover:text-zinc-400" href="{{ route('home') }}">Vissza</a></p>
        </div>
      </div>
    </div>
    @endsection
  </x-home-master>