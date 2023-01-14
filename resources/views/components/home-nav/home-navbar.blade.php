{{-- Top Logo and Links --}}
<div class="hidden md:flex items-center guild-logo justify-center bg-center bg-no-repeat" style="background-image: url('{{ URL::to('/') }}/images/header.png')">
  <div class="w-8/12 text-white">
    <h1 class="text-4xl text-center text-zinc-300">{{ config('app.name') }}</h1>
    <h2 class="text-center text-zinc-300">WoW Guild EU-Ragnaros</h2>

  </div>
</div>
{{-- End Of Top Logo and Links --}}

<nav class="sticky top-0 flex flex-wrap items-center justify-between md:justify-center w-full py-4 md:py-0 px-4 z-10 border-t border-b border-pink-100 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700 text-white">
  <div><a class="md:hidden" href="{{ route('home') }}">{{ config('app.name') }}</a></div>
  <svg
  xmlns="http://www.w3.org/2000/svg"
  id="navbar-button"
  class="h-6 w-6 cursor-pointer md:hidden block"
  fill="none"
  viewBox="0 0 24 24"
  stroke="currentColor"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M4 6h16M4 12h16M4 18h16"
    />
  </svg>
  <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar">
    <ul class="pt-4 text-base md:flex md:justify-center md:pt-0">
      <li class="hidden md:inline-flex">
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('home') }}">{{ config('app.name') }}</a>
      </li>
      <li>
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('guild.roster') }}">Taglista</a>
      </li>
      <li>
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('guild.kisokos') }}">Kemál Kisokos</a>
      </li>
      <li>
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('raidtax.index') }}">Raid Taktikák</a>
      </li>
      <li>
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('guild.craft') }}">Guild Craft</a>
      </li>
      <li>
        <a class="md:p-4 py-2 block hover:text-slate-400" href="{{ route('guild.recruitment') }}">Tagfelvétel</a>
      </li>
      <li class=" border-b border-zinc-500 md:hidden">
        <p class="md:p-4 py-2 block">
          @guest
            Tagok
          @endguest

          @auth
            @if(auth()->user()->nickname)  {{ auth()->user()->nickname }} @else {{ auth()->user()->name }} @endif
          @endauth
        </p>
      </li>
      @auth
      <li class="md:hidden"> 
        <a class="md:p-4 py-2 pl-3 block" href="{{ route('admin.index') }}">Adminpanel</a>
      </li>
      <li class="md:hidden">
        <a class="md:p-4 py-2 pl-3 block" href="{{ route('craft.create') }}">Új Craft Recept</a>
      </li>
      <li class="md:hidden">
        <a class="md:p-4 py-2 pl-3 block" href="#">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Logout</button>  
          </form>
        </a>
      </li>
      @endauth

      @guest
      <li class="md:hidden"> 
        <a class="md:p-4 py-2 pl-3 block" href="{{ route('user.login') }}">Login</a>
      </li>
      <li class="md:hidden">
        <a class="md:p-4 py-2 pl-3 block" href="{{ route('user.register') }}">Register</a>
      </li>
      @endguest

      
      <div class="hidden dropdown relative md:inline-block  md:p-4">
        <button class="inline-flex items-center">
          <span class="mr-1 hover:text-slate-400">
            @guest
              Tagok
            @endguest
  
            @auth
              @if(auth()->user()->nickname)  {{ auth()->user()->nickname }} @else {{ auth()->user()->name }} @endif
            @endauth
            </span>
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
        </button>
        <ul class="dropdown-menu absolute hidden  min-w-max border border-zinc-500 rounded-lg">
          @auth
          <li class="">
            <a class="rounded-t-lg bg-zinc-800 hover:bg-zinc-500 py-2 px-4 block whitespace-no-wrap" href="{{ route('admin.index') }}">
              Adminpanel
            </a>
          </li>
          <li class="">
            <a class="bg-zinc-800 hover:bg-zinc-500 py-2 px-4 block whitespace-no-wrap" href="{{ route('craft.create') }}">Új Craft Recept</a>
          </li>
          <li class="">
            <a class="rounded-b-lg bg-zinc-800 hover:bg-zinc-500 py-2 px-4 block whitespace-no-wrap" href="#">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Logout</button>  
              </form>
            </a>
          </li>
          @endauth
  
          @guest
          <li class="">
            <a class="rounded-t-lg bg-zinc-800 hover:bg-zinc-500 py-2 px-4 block whitespace-no-wrap" href="{{ route('user.login') }}">
              Login
            </a>
          </li>
          <li class="">
            <a class="rounded-b-lg bg-zinc-800 hover:bg-zinc-500 py-2 px-4 block whitespace-no-wrap" href="{{ route('user.register') }}">
              Register
            </a>
          </li>
          @endguest
        </ul>
      </div>
    </ul>
  </div>
</nav>

@section('extra-js')
<script>
  const button = document.querySelector('#navbar-button');
  const menu = document.querySelector('#navbar');


  button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
@endsection