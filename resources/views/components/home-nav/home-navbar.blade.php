{{-- Top Logo and Links --}}
<div class="flex items-center guild-logo justify-center bg-center bg-no-repeat" style="background-image: url('{{ URL::to('/') }}/images/header.png')">
  <div class="w-8/12 text-white">
    <h1 class="text-4xl text-center text-zinc-300">{{ config('app.name') }}</h1>
    <h2 class="text-center text-zinc-300">WoW Guild EU-Ragnaros</h2>

  </div>
</div>
{{-- End Of Top Logo and Links --}}
<nav class="sticky top-0 w-full py-2 px-16 z-10 border-t border-b border-pink-200 bg-gradient-to-b from-red-900 via-red-800 to-red-900 text-white flex justify-between mb-4 ">
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
    <li class="p-3">
      <a href="{{ route('guild.recruitment') }}">Tagfelvétel</a>
    </li>
  </ul>

  <ul class="flex items-center">
    @auth
      <li class="p-3">
        <a href="">Welcome @if(auth()->user()->nickname)  {{ auth()->user()->nickname }} @else {{ auth()->user()->name }} @endif</a>
      </li>
      <li class="p-3">
        <a href="{{ route('admin.index') }}">Admin</a>
      </li>
      <li class="p-3">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button>Logout</button>  
        </form>
      </li>
    @endauth
    
    @guest
      <li class="p-3">
        <a href="{{ route('user.login') }}">Login</a>      
      </li>
      <li class="p-3">
        <a href="{{ route('user.register') }}">Register</a>  
      </li>
    @endguest
  </ul>
</nav>
