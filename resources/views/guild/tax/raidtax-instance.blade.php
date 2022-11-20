<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikak</h1>

      
      <!-- Breadcrumb -->

      <nav class="flex px-4 py-2 border border-zinc-500 rounded-lg" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-white">
              <svg class="w-4 h-4 mr-2 text-violet-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              Home
            </a>
          </li>
          {{-- <li>
            <div class="flex items-center">
              <svg class="w-6 h-6 text-violet-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              <a href="#" class="ml-1 text-sm font-medium text-gray-400 hover:text-white md:ml-2">Templates</a>
            </div>
          </li> --}}
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-6 h-6 text-violet-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              <span class="ml-1 text-sm font-medium text-gray-200 md:ml-2 dark:text-gray-400">Flowbite</span>
            </div>
          </li>
        </ol>
      </nav>

      <div>
        <ul>
          @foreach ($categories as $cat)
              <li>{{ $cat->name }}</li>
          @endforeach
        </ul>
      </div>
      
      

      
    </div>
  </div>

  @endsection
  @section('extra-js')
    <script>
    
    </script>
  @endsection
</x-home-master>