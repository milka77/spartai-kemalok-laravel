<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikák</h1>
      <h3 class="text-lg text-center mb-4">{{ $tax->raidTaxCategory->name }} / {{ $tax->boss_name }}</h3>

      <div class="border-t border-zinc-600 my-3">
        <article class="mb-4">
          <span class="p-2 flex mb-3">
            <a class="hover:text-zinc-400" href="{{ route('raidtax.cat.show', $tax->raidTaxCategory->id) }}"><i class="fas fa-arrow-left"></i> Vissza</a>
          </span>
          <h1 class="text-2xl text-center mb-4">{{ Str::title($tax->boss_name) }}</h1>

          <div class="phase-wrapper border-t border-zinc-600 mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_1 }}</p>
            <p class="py-2">{!! $tax->body_1 !!}</p>
            @if (!empty($tax->file_path_1))
              <div class="flex justify-center">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_1 }}" target="_blank">
                    <img src="{{ $tax->file_path_1 }}" alt="Phase 1 image">
                  </a>
                </div>
              </div>
            @endif
          </div>

          @if($tax->title_2)
          <div class="phase-wrapper border-t border-zinc-600 mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_2 }}</p>
            <p class="py-2">{!! $tax->body_2 !!}</p>
            @if (!empty($tax->file_path_2))
              <div class="flex justify-center">
                <div class="w-2/3 ">
                  <a href="{{ $tax->file_path_2 }}" target="_blank">
                    <img src="{{ $tax->file_path_2 }}" alt="Phase 2 image">
                  </a>
                </div>
              </div>
            @endif
          </div>
          @endif

          @if($tax->title_3)
          <div class="phase-wrapper border-t border-zinc-600 mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_3 }}</p>
            <p class="py-2">{!! $tax->body_3 !!}</p>
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

          @if($tax->title_4)
          <div class="phase-wrapper border-t border-zinc-600 mb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_4 }}</p>
            <p class="py-2">{!! $tax->body_4 !!}</p>
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

          @if($tax->title_5)
          <div class="phase-wrapper border-t border-b border-zinc-600 mb-4 pb-4">
            <p class="text-lg text-center my-4">{{ $tax->title_5 }}</p>
            <p class="py-2">{!! $tax->body_5 !!}</p>
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
</x-home-master>