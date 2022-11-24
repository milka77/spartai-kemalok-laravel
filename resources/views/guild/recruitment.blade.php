<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg bg-zinc-800 text-white">
      <h1 class="text-2xl text-center mb-4 py-2">Guild Tagfelvétel</h1>

      <div class="border-t border-zinc-600 pt-2">
        <div class="w-1/2 text-center mx-auto mb-3 pt-3">
          <p class="p-2 py-4 bg-zinc-700 rounded-lg mb-3">
            Ha szeretnél egy jó hangulatú guild tagja lenni, de a progress is érdekel és ismered a class-od vedd fel a kapcsolatot valamelyik officerrel a játékban vagy discordon. 
          </p>
          
          <p class="p-2 mb-3 text-lg">Az alábbi class-okból keresünk embereket.</p>
        </div>

        <div id="recruitment" class="overflow-x-auto relative flex justify-center mb-4">
          <table class="w-1/2 text-center">
            <thead class="uppercase bg-zinc-700">
              <tr class="border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Class</th>
                <th scope="col" class="py-2 px-6">Spec</th>
                <th scope="col" class="py-2 px-6">Priority</th>
                <th scope="col" class="py-2 px-6">Státusz</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recruits as $rec)
                <tr class="border-b border-t border-zinc-500">
                  <th scope="col" class="py-2 px-6">{{ $rec->playable_class->name }}</th>
                  <th scope="col" class="py-2 px-6">{{ $rec->is_active ? $rec->comment : '-' }}</th>
                  <th scope="col" class="py-2 px-6">
                    @if($rec->is_active)
                        @if($rec->priority)
                        <span class="text-green-500">
                          <small><i class="fas fa-angle-double-up"></i></small> High <small><i class="fas fa-angle-double-up"></i></small>
                        </span>
                        @else
                        <span class="text-orange-500">Normal</span>
                        @endif
                      @else
                        -
                      @endif
                  </th>
                  <th scope="col" class="py-2 px-6">
                    <span class="{{ $rec->is_active ? 'text-green-500' : 'text-red-600' }}">
                      @if($rec->is_active)
                        @if($rec->priority)
                        <span class="text-green-500">
                          <small><i class="fas fa-angle-double-up"></i></small> Open <small><i class="fas fa-angle-double-up"></i></small>
                        </span>
                        @else
                        <span class="text-orange-500">Open</span>
                        @endif
                      @else
                        Closed
                      @endif
                    </span>
                  </th>
                </tr>
              @endforeach
             
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
</x-home-master>