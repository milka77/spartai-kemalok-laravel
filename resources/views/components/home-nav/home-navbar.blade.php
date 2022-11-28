{{-- Top Logo and Links --}}
<div class="flex items-center guild-logo justify-center bg-center bg-no-repeat" style="background-image: url('{{ URL::to('/') }}/images/header.png')">
  <div class="w-8/12 text-white">
    <h1 class="text-4xl text-center text-zinc-300">{{ config('app.name') }}</h1>
    <h2 class="text-center text-zinc-300">WoW Guild EU-Ragnaros</h2>

  </div>
</div>
{{-- End Of Top Logo and Links --}}

<nav class="sticky top-0 w-full py-2 px-16 z-10 border-t border-b border-pink-200 bg-gradient-to-r from-zinc-700 via-red-900 to-zinc-700 text-white flex justify-center mb-4 gap-5">
  <ul class="flex items-center">
    <li class="p-3">
      <a href="{{ route('home') }}">{{ config('app.name') }}</a>
    </li>
    <li class="p-3">
      <a href="{{ route('guild.roster') }}">Taglista</a>
    </li>
    <li class="p-3">
      <a href="{{ route('guild.kisokos') }}">Kemál Kisokos</a>
    </li>
    <li class="p-3">
      <a href="{{ route('raidtax.index') }}">Raid Fight Tactics</a>
    </li>
    <li class="p-3 pr-6">
      <a href="{{ route('guild.recruitment') }}">Tagfelvétel</a>
    </li>
    <div class="dropdown inline-block relative">
      <button class=" inline-flex items-center">
        <span class="mr-1">
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
            Admin
          </a>
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
</nav>
