<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class=" w-4/6 p-3 rounded-lg bg-zinc-800 text-white mb-4">
      <h1 class="text-2xl text-center mb-4">Raid Taktikak</h1>
  

      <div class="border-t border-zinc-600 mt-2 ">
        <form action="" class="mb-2">
          <div class="p-2 flex justify-evenly gap-3 border-b border-zinc-600">
            <select class="bg-zinc-800 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dynamic" 
                    id="raid_tax_category_id"
                    name="raid_tax_category_id"
                    data-dependent="raid_tax_difficulty_id">
              <option hidden>Select Raid Instance</option>
              @foreach ($categories as $category)
              
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                
              @endforeach
            </select>
            <select class="bg-zinc-800 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" 
                    id="raid_tax_difficulty_id"
                    name="raid_tax_difficulty_id"
                    data-dependent="boss_name">
              <option hidden>Select Difficulty</option>
                @foreach ($difficulties as $difficulty)
                    <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
                @endforeach
              </select>
            
  
            <select class="bg-zinc-800 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    id="boss_name"
                    name="boss_name">
              
              
            </select>
          </div>
        </form>

        
        <div class="p-2">
          @foreach ($tactics as $tax)
            <article class="mb-4 hidden" id="bosstax-{{ $tax->id }}">
              <span class="p-2 flex mb-3">
                {{ $tax->raidTaxCategory->name }} 
                <span class="px-2">/</span> 
                {{ $tax->boss_name }} 
                <span class="px-2">/</span>
                {{ $tax->raidTaxDifficulty->name }}
                </span>
              <h1 class="text-2xl text-center mb-4">{{ $tax->boss_name }}</h1>

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
          
          @endforeach
        </div>
      </div>

      

      
    </div>
  </div>

  @endsection
  @section('extra-js')
    <script>
      $(document).ready(function() {
        $('#raid_tax_difficulty_id').on('change', function() {
            let categoryID = $('#raid_tax_category_id').val();
            let difficultyID = $(this).val();
            if(categoryID) {
                $.ajax({
                    url: '/raidtax/'+categoryID+'/'+difficultyID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                      if(data.length > 0){
                        $('#boss_name').empty();
                        $('#boss_name').append('<option hidden>Select Boss</option>'); 
                        $.each(data, function(key, raidtax){
                            $('select[name="boss_name"]').append('<option value="'+ raidtax.id +'" id="'+ key +'">' + raidtax.boss_name+ '</option>');
                        });
                      }else{
                          $('#boss_name').empty();
                          $('#boss_name').append('<option hidden>No records</option>'); 
                      }
                    }
                });
            }else{
              $('#boss_name').empty();
            }
          });
        });
    </script>
    <script>
      $(document).ready(function() {
        $('#boss_name').on('change', function() {
          let bossNameID = $('#boss_name').val();
          let art = $('article');
          if(art.not('.hidden')){
            art.addClass('hidden');
          }
          $('#'+'bosstax-'+bossNameID+'').removeClass('hidden');
            })
      });
    </script>
  @endsection
</x-home-master>