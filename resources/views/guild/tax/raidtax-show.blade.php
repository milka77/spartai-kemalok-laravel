<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikák</h1>
      <h3 class="text-lg text-center mb-4">{{ $tax->raidTaxCategory->name }} / {{ Str::title($tax->boss_name) }}</h3>

      <div class="border-t border-b border-zinc-600 my-3">
        <article class="mb-4">
          <span class="p-2 flex justify-between mb-3">
            <a class="hover:text-zinc-400" href="{{ route('raidtax.cat.show', $tax->raidTaxCategory->id) }}"><i class="fas fa-arrow-left"></i> Vissza</a>
            <select class="bg-inherit px-2 py-1 rounded-lg border-2 border-zinc-600 focus:border-zinc-500" name="difficulty" id="difficulty">
              <option class="bg-inherit text-black" value="N">Normal/Heroic</option>
              <option class="bg-inherit text-black" value="M">Mythic</option>
            </select>
          </span>
          <h1 class="text-2xl text-center mb-4">{{ Str::title($tax->boss_name) }}</h1>

          <div class="phase-wrapper mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_1 }}</p>
            <p class="py-2 ">{!! $tax->body_1 !!}</p>

            {{-- Mythic extra info --}}
            <div id="mythic_1" class="hidden my-3 border-l-4 border-red-800 px-3">
              <p class="text-xl font-bold">Mythic kiegészítés:</p>
              <p class="py-2">{!! $tax->mythic_1 !!}</p>
            </div>
            {{-- End of Mythic extra info --}}

            @if (!empty($tax->file_path_1))
            <div class="flex justify-center mt-2">
              <div class="w-2/3 ">
                <a href="{{ $tax->file_path_1 }}" target="_blank">
                  <img src="{{ $tax->file_path_1 }}" alt="Phase 1 image">
                </a>
              </div>
            </div>
            @endif
          </div>

          @if($tax->title_2 || $tax->body_2 || $tax->mythic_2)
          <div class="phase-wrapper mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_2 }}</p>
            <p class="py-2">{!! $tax->body_2 !!}</p>

            {{-- Mythic extra info --}}
            <div id="mythic_2" class="hidden my-3 border-l-4 border-red-800 px-3">
              <p class="text-xl font-bold">Mythic kiegészítés:</p>
              <p class="py-2">{!! $tax->mythic_2 !!}</p>
            </div>
            {{-- End of Mythic extra info --}}

            @if (!empty($tax->file_path_2))
              <div class="flex justify-center mt-2">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_2 }}" target="_blank">
                    <img src="{{ $tax->file_path_2 }}" alt="Phase 2 image">
                  </a>
                </div>
              </div>
            @endif
          </div>
          @endif

          @if($tax->title_3 || $tax->body_3 || $tax->mythic_3)
          <div class="phase-wrapper mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_3 }}</p>
            <p class="py-2">{!! $tax->body_3 !!}</p>

            {{-- Mythic extra info --}}
            <div id="mythic_3" class="hidden my-3 border-l-4 border-red-800 px-3">
              <p class="text-xl font-bold">Mythic kiegészítés:</p>
              <p class="py-2">{!! $tax->mythic_3 !!}</p>
            </div>
            {{-- End of Mythic extra info --}}

            @if (!empty($tax->file_path_3))
              <div class="flex justify-center">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_3 }}" target="_blank">
                    <img src="{{ $tax->file_path_3 }}" alt="Phase 3 image">
                  </a>
                </div>
              </div>
            @endif
          </div>
          @endif

          @if($tax->title_4 || $tax->body_4 || $tax->mythic_4)
          <div class="phase-wrapper mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_4 }}</p>
            <p class="py-2">{!! $tax->body_4 !!}</p>

            {{-- Mythic extra info --}}
            <div id="mythic_4" class="hidden my-3 border-l-4 border-red-800 px-3">
              <p class="text-xl font-bold">Mythic kiegészítés:</p>
              <p class="py-2">{!! $tax->mythic_4 !!}</p>
            </div>
            {{-- End of Mythic extra info --}}

            @if (!empty($tax->file_path_4))
              <div class="flex justify-center">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_4 }}" target="_blank">
                    <img src="{{ $tax->file_path_4 }}" alt="Phase 4 image">
                  </a>
                </div>
              </div>
            @endif
          </div>
          @endif

          @if($tax->title_5 || $tax->body_5 || $tax->mythic_5)
          <div class="phase-wrapper mb-4 pb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_5 }}</p>
            <p class="py-2">{!! $tax->body_5 !!}</p>

            {{-- Mythic extra info --}}
            <div id="mythic_5" class="hidden my-3 border-l-4 border-red-800 px-3">
              <p class="text-xl font-bold">Mythic kiegészítés:</p>
              <p class="py-2">{!! $tax->mythic_5 !!}</p>
            </div>
            {{-- End of Mythic extra info --}}

            @if (!empty($tax->file_path_5))
              <div class="flex justify-center">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_5 }}" target="_blank">
                    <img src="{{ $tax->file_path_5 }}" alt="Phase 5 image">
                  </a>
                </div>
              </div>
            @endif
          </div>
          @endif
        </article>
      </div>

      <div class="mb-3 flex justify-center">
        <a class="btn px-4 py-3 rounded-md bg-red-900 hover:text-zinc-400" href="{{ route('raidtax.cat.show', $tax->raidTaxCategory->id) }}">
          <i class="fas fa-arrow-left"></i> Vissza
        </a>
      </div>

      
    </div>
  </div>

  @endsection

  @section('extra-js')
    <script>
      $(document).ready(function() {
        $('#difficulty').on('change', function() {
          if (this.value === 'M') {
            $('#mythic_1').removeClass('hidden')
            $('#mythic_2').removeClass('hidden')
            $('#mythic_3').removeClass('hidden')
            $('#mythic_4').removeClass('hidden')
            $('#mythic_5').removeClass('hidden')
          } else {
            $('#mythic_1').addClass('hidden')
            $('#mythic_2').addClass('hidden')
            $('#mythic_3').addClass('hidden')
            $('#mythic_4').addClass('hidden')
            $('#mythic_5').addClass('hidden')
          }
        });
      });


    </script>
  @endsection
</x-home-master>