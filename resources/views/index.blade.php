<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg flex flex-col gap-2 bg-zinc-800 lg:container-fluid lg:flex-row">
      
      {{-- Left side News feed --}}
      <div class="w-full lg:w-8/12 xl:w-9/12 text-white rounded-lg p-2">
        <h1 class="text-2xl font-semibold text-center mb-2">Hírek</h1>
        
      
        @foreach ($news_index as $news)
        
        <article class="p-3 py-5 bg-zinc-700 rounded-lg mb-4">
          <div class="flex flex-col  border-b border-zinc-500">
            <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
              
              <p class="text-xl p-2">{{ $news->title  }}</p>

            </div>
            {{-- News Body --}}
            @if($news->category->id == 1)
            <div class="p-4 flex justify-between">
              <div class="w-full">{!! $news->body !!}</div>

              <div class="hidden md:inline-flex">
                <img class="md:shrink-0 object-scale-down max-h-32 max-w-xs" 
                    src="https://assets.worldofwarcraft.com/static/components/Logo/Logo-horde.2a80e0466e51d85c8cf60336e16fe8b8.png" 
                    alt="Horda Logo">
              </div>
            </div>
              {{-- Checking for video url and displaying if exists  --}}
              @if(!empty($news->video_url))
              <div class="w-full md:w-[75%]">
                <div class="iframe-container">
                  <iframe width="560" height="315" src="{{ $news->getEmbedLink($news->video_url) }}" title="YouTube video player" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                  </iframe>
                </div>
              </div>
              @endif

              {{-- Checking for image url and displaying if exists  --}}
              @if(!empty($news->file_path))
              <div class="w-2/3 flex mx-auto">
                <button id="news-img-{{ $news->id }}"  class="modal-btn">
                  <img class="md:shrink-0 rounded-2xl px-2 md:px-32" src="{{ $news->file_path }}" alt="{{ $news->title }}" data-modal-id="{{ $news->id }}">
                </button>
              </div>
              @endif
            @else
            <div class="p-4">
              {!! $news->body !!}
            </div>
            @endif
            {{-- End Of News Body --}}

            <div class=" flex justify-center p-2 py-4">
              @if ( $news->category->id === 2)
                {{-- Checking for video url and displaying if exists  --}}
                @if(!empty($news->video_url))
                <div class="w-full md:w-[75%]">
                  <div class="iframe-container">
                    <iframe width="560" height="315" src="{{ $news->getEmbedLink($news->video_url) }}" title="YouTube video player" 
                      frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                  </div>
                </div>
                @endif

                @if(!empty($news->file_path))
                <button id="news-img-{{ $news->id }}" class="modal-btn">
                  <img class="md:shrink-0 rounded-2xl px-2 md:px-32" src="{{ $news->file_path }}" alt="{{ $news->title }}"  data-modal-id="{{ $news->id }}">
                </button>
                @endif
              @endif
              
            </div>
          </div>
          
          <div class="flex flex-col md:flex-row md:justify-between border-b border-zinc-500 mb-2 px-1">
            <span class="text-sm">{{ $news->created_at }} Szerző: {{ $news->user->nickname }}</span> 
            <span class="text-sm md:order-3">{{ $news->category->name }}</span>
            <span class="text-sm show-comment cursor-pointer" data-news-id="{{ $news->id }}">Kommentek: {{ count($news->comments) }}</span>
          </div>

          {{-- Comment Section  --}}
          <div id='comments-{{ $news->id }}' class="hidden">
            {{-- Displaying Comments if there is any available --}}
            @if($news->comments)
            @foreach($news->comments as $comment)
            <div class="py-1 px-2 mb-2 bg-zinc-800 rounded-lg shadow-md ">
              <p class="pl-1 flex justify-between border-b border-zinc-500">{{ $comment->user->nickname }} <span class="text-sm">{{ $comment->created_at }}</span></p>
              <p class="text-sm p-1 pl-2">{{ $comment->body }}</p>
              @auth
                @if($comment->user->id === auth()->user()->id)
                <div class="flex justify-end gap-2">
                  <span class="flex justify-end text-sm hover:text-slate-300 cursor-pointer edit-comment-btn" data-comment-id="{{ $comment->id }}">Szerkeszt</span>
                  <span class="flex justify-end items-center text-sm text-red-500 hover:text-slate-300 cursor-pointer edit-delete-btn" data-comment-id="{{ $comment->id }}">
                    {{-- Destroy Comment Form  --}}
                    <div id="destroy-form-{{ $comment->id }}">
                      <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                      </form>
                    </div>
                    {{-- End of Destroy Comment Form  --}}
                  </span>
                </div>
                @endif
              @endauth
            </div>

            {{-- Edit Comment form modal --}}
            <div id="update-form-{{ $comment->id }}" class="hidden bg-black bg-opacity-80 fixed inset-0 z-20">              
              <div class="h-full w-full flex ">
                <form action="{{ route('comment.update', $comment->id) }}" method="POST" class="w-full md:w-[40%] mx-auto mt-2 flex flex-col justify-center">
                  @csrf
                  @method('PATCH')

                  <div class="mb-2">
                    <label for="body" class="px-2">Komment:</label>
                    <textarea class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" name="body"  rows="2">{{ $comment->body }}</textarea>
                    
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  
                  {{-- Submit Button --}}
                  <div class="mb-4 flex justify-end gap-2 pr-2">
                    <span class="btn px-4 py-2 cursor-pointer edit-comment-close-btn" data-comment-id="{{ $comment->id }}">Vissza</span>
                    <button type="submit" class="btn px-4 py-2">Komment frissitése</button>
                  </div>
                  {{-- End of Submit Button --}}
                </form>
              </div>
            </div>
            {{-- End of Edit Comment form modal --}}
            @endforeach
            @endif
            
            @auth
            <div>
              <div class="w-full flex justify-center pt-1">
                <button id="comment-btn-{{ $news->id }}"
                  data-comment-id="{{ $news->id }}" 
                  class="btn px-4 py-2 add-comment-btn hover:text-slate-400">
                  Kommentelek
                </button>
              </div>
              
              {{-- New Comment Form  --}}
              <div id="comment-form-{{ $news->id }}" class="hidden mt-2">
                <form action="{{ route('comment.store', $news->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="news_id" value="{{ $news->id }}">

                  <div class="mb-2">
                    <label for="body" class="px-2">Komment:</label>
                    <textarea class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" name="body"  rows="2"></textarea>
                    
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  
                  {{-- Submit Button --}}
                  <div class="mb-4 flex justify-end gap-2 pr-2">
                    <span class="btn px-4 py-2 cursor-pointer comment-close-btn" data-comment-id="{{ $news->id }}">Mégse</span>
                    <button type="submit" class="btn px-4 py-2">Komment elküldése</button>
                  </div>
                  {{-- End of Submit Button --}}
                </form>
              </div>
              {{-- End of New Comment Form  --}}

            </div>
            @endauth
          </div>
          {{-- End of Comment Section  --}}
          
          {{-- Image Modal --}}
         
          <div id="overlay-{{ $news->id }}" class="bg-black bg-opacity-90 fixed inset-0 z-20 hidden flex-col justify-center items-center p-30">
            <div class="text-right w-4/5 py-1 pr-1"><i id="modal-close-{{ $news->id }}" data-modal-id="{{ $news->id }}" class=" modal-close-btn cursor-pointer fa-solid fa-xmark hover:text-stone-500"></i></div>
            <div class="w-4/5 h-[90%] flex justify-center">
              <img class="rounded-xl" src="{{ $news->file_path }}" >
            </div>
            <div class="text-left w-4/5 p-1">
              <a class="hover:text-stone-500" href="{{ $news->file_path }}" target="_blank" rel="noopener noreferrer">Eredeti kep mutatasa</a>
            </div>
          </div>
         
          {{-- End of Image Modal --}}
        </article>
        @endforeach
        
        <div class="p-2">{{ $news_index->links()->total }}{{ $news_index->links('pagination::tailwind') }}</div>       

      
        
      </div>
      
      {{-- End Of Left side News feed --}}

      {{-- Right side --}}
      <div class="w-full lg:w-4/12 xl:w-3/12 pt-12 p-2">
        {{-- Recruitment --}}
        <div class="bg-zinc-700 text-white rounded-lg mb-4 pt-5">

          <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
            <h2 class="text-center font-semibold text-xl p-2">Tagfelvétel</h2>
          </div>

          <div class="px-4 py-2 border-t border-zinc-500">
            @if($recruits_is_active)
              @foreach ($recruits as $rec)
                <div class="flex justify-between border-b border-zinc-500">
                  <span class="{{ strtolower($rec->playable_class->name) }}">{{ $rec->playable_class->name }}: </span>
                  <span class="font-semibold {{ $rec->is_active ? 'text-green-500' : 'text-red-600' }}">
                    @if($rec->is_active)
                      @if($rec->priority)
                        <a href="{{ route('guild.recruitment') }}">Open <small><i class="fas fa-angle-double-up"></i></small></a>
                      @else
                        <a href="{{ route('guild.recruitment') }}" class="text-orange-500">Open <small><i class="fas fa-angle-up"></i></small> </a>
                      @endif
                    @else
                      Closed <small><i class="fas fa-times"></i></small> 
                    @endif
                  </span>
                </div>
              @endforeach
              <p class="py-2 text-sm">Tobb infoert kattints barmelyik nyitott class-ra.</p>
            @else
              <div class=" border-b border-zinc-500">
                <p class="p-2 text-center">
                  Jelenleg kiemelten egyetlen classt sem keresünk, viszont kiemelkedő teljesítményű raiderek és mythic+ orientált játékosok jelentkezését továbbra is szívesen fogadjuk.
                </p>
                <p class="p-2 text-center">
                  Vedd fel a kapcsolatot valamelyik officerrel a játékban vagy discordon.
                </p>
              </div>
            @endif
          </div>
        </div>
        {{-- End Of Recruitment --}}

        {{-- Progress --}}
        <div class="w-auto min-w-fit bg-zinc-700 rounded-lg text-white pt-5 mb-4">
          {{-- Declare shorthand version for raid progression arrays --}}
          <?php $voti_prog = $raid_progress['raid_progression']['vault-of-the-incarnates']?>

          <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
            <h2 class="text-center font-semibold text-xl p-2">Guild Progress</h2>
          </div>
          
          <div class="flex  p-2 px-4">
            <table class="w-full">
              <thead>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="capitalize">Vault of the Incarnates:</td>
                  <td class="text-right">{{ $voti_prog['summary'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">Normal:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['normal_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">Heroic:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['heroic_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
                <tr>
                  <td class="pl-3 capitalize">mythic:</td>
                  <td class="pr-3 text-right">{{ $voti_prog['mythic_bosses_killed'] }} / {{ $voti_prog['total_bosses'] }}</td>
                </tr>
              </tbody>
            </table>            
          </div>
        </div>
        {{-- End Of Progress --}}

        <div class="w-auto min-w-fit bg-zinc-700 rounded-lg text-white pt-5 mb-4">
          {{-- Declare shorthand version for raid progression arrays --}}
          <?php $voti_prog = $raid_progress['raid_progression']['vault-of-the-incarnates']?>

          <div class="text-center border-t border-b border-zinc-500 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700">
            <h2 class="text-center font-semibold text-xl p-2">Heti Affixek</h2>
          </div>

          <div class="flex  p-2 px-4">
            <ul>
              @foreach ($affixes->affix_details as $affix)
              <li class="flex justify-center items-center gap-2">
                <a class="hover:text-slate-400" href="{{ $affix->wowhead_url }}" target="_blank" rel="noopener noreferrer">{{ $affix->name }}</a>
                <img src="https://wow.zamimg.com/images/wow/icons/small/{{ $affix->icon }}.jpg" alt="{{ $affix->name }}">
              </li>
              <li class="text-sm p-2">{{ $affix->description }}</li>
              @endforeach
            </ul>
              
          </div>
          
          
        </div>
        
        {{-- Discord Widget--}}
        <div class="w-auto mt-2">
          <iframe src="https://discord.com/widget?id=478499711263703070&theme=dark" width="100%" height="500px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

        </div>
        {{-- End Of Discord Widget--}}
        </div>
        
      </div>
      {{-- End Of Right side --}}
    </div>
  </div>
  {!! Toastr::message() !!}
  @endsection

  @section('extra-js')
  <script>
      const newsImages = document.querySelectorAll('.modal-btn');
      const modalCloseBtn = document.querySelectorAll('.modal-close-btn')

      const toggleImageClasses = (overlayId) => {
        const overlay = document.querySelector('#overlay-' + overlayId);

        overlay.classList.toggle('hidden')
        overlay.classList.toggle('flex')
      }

      // Adding Eventlistener to all elements and calling toggle function
      newsImages.forEach(el => el.addEventListener('click', event => {
        const overlayId = event.target.dataset.modalId
        toggleImageClasses(overlayId)
      }))

      // Adding Eventlistener to all elements and calling toggle function
      modalCloseBtn.forEach(el => el.addEventListener('click', event => {
        const overlayId = event.target.dataset.modalId
        toggleImageClasses(overlayId)
        
      }))

  </script>

  <script>
    const newsCommentBtn = document.querySelectorAll('.add-comment-btn')
    const newsCommentCloseBtn = document.querySelectorAll('.comment-close-btn')

    const toggleAddComment = (id) => {
      const commentForm = document.querySelector('#comment-form-' + id)

      commentForm.classList.toggle('hidden')
    }

    // Adding Eventlistener to all elements and calling toggle function
    newsCommentBtn.forEach(el => el.addEventListener('click', event => {
      const id = event.target.dataset.commentId
      toggleAddComment(id)
      event.target.classList.add('hidden')
    }))

    // Adding Eventlistener to all elements and calling toggle function
    newsCommentCloseBtn.forEach(el => el.addEventListener('click', event => {
      const id = event.target.dataset.commentId
      toggleAddComment(id)
      document.querySelector('#comment-btn-' + id).classList.remove('hidden')
    }))
  </script>

  <script>
    const editCommentBtn = document.querySelectorAll('.edit-comment-btn')
    const editCommentColseBtn = document.querySelectorAll('.edit-comment-close-btn')

    const toggleEditComment = (commentId) => {
      const commentEditForm = document.querySelector('#update-form-' + commentId)
      commentEditForm.classList.toggle('hidden')
    }

    // Adding Eventlistener to all elements and calling toggle function
    editCommentBtn.forEach(el => el.addEventListener('click', event => {
      const commentId = event.target.dataset.commentId
      toggleEditComment(commentId)
    }))

    // Adding Eventlistener to all elements and calling toggle function
    editCommentColseBtn.forEach(el => el.addEventListener('click', event => {
      const commentId = event.target.dataset.commentId
      toggleEditComment(commentId)
    }))
  </script>

  {{-- Toggle Comment section --}}
  <script>
    const showComment = document.querySelectorAll('.show-comment')

    const toggleComment = (id) => {
      const commentWindow = document.querySelector('#comments-' + id)
      commentWindow.classList.toggle('hidden')
    }

    // Adding Eventlistener to all elements and calling toggle function
    showComment.forEach(el => el.addEventListener('click', event => {
      const id = event.target.dataset.newsId
      toggleComment(id)
    })) 
  </script>
  {{-- End of Toggle Comment section --}}
  @endsection
</x-home-master>