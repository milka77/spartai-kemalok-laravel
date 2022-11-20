<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg bg-zinc-800 text-white">
      <h1 class="text-2xl text-center mb-4">Guild Tagfelvétel</h1>

      <div class="border-t border-zinc-600 pt-2">
        <p class="p-2">
          Ha szeretnél egy jó hangulatú guild tagja lenni, de a progress is érdekel és ismered a class-od vedd fel a kapcsolatot valamelyik officerrel a játékban vagy discordon. 
        </p>
        <p class="px-2 mb-3">Az alábbi class-okból keresünk embereket.</p>

        <div id="recruitment" class="overflow-x-auto relative flex justify-center">
          <table class="w-1/2 text-center">
            <thead class="uppercase bg-zinc-700">
              <tr class="border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Class</th>
                <th scope="col" class="py-2 px-6">Spec</th>
                <th scope="col" class="py-2 px-6">Státusz</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-red-500">Closed</span></th>
              </tr>
              <tr class="border-b border-t border-zinc-500">
                <th scope="col" class="py-2 px-6">Priest</th>
                <th scope="col" class="py-2 px-6">Shadow</th>
                <th scope="col" class="py-2 px-6"><span class="text-green-500">Open</span></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
</x-home-master>