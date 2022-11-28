<footer class="border-t border-zinc-600  bg-red-900 text-white py-2 mt-auto">
  <div class="flex flex-col gap-2 md:flex-row justify-around">
    <ul class="text-center border-b border-zinc-500 md:border-0 pb-2">
      <li class="text-zinc-400 font-bold italic mb-2">Quick Links</li>
      <li><a class="hover:text-slate-400" href="{{ route('home') }}">Home</a></li>
      <li><a class="hover:text-slate-400" href="{{ route('guild.roster') }}" >Roster</a></li>
      <li><a class="hover:text-slate-400" href="{{ route('raidtax.index') }}">Boss tactics</a></li>
      <li><a class="hover:text-slate-400" href="{{ route('guild.kisokos') }}">Kemál Kisokos</a></li>
      <li><a class="hover:text-slate-400" href="{{ route('guild.recruitment') }}">Tagfelvétel</a></li>
    </ul>
    <ul class="text-center border-b border-zinc-500 md:border-0 pb-2">
      <li class="text-zinc-400 font-bold italic mb-2">Social Links</li>
      <li><a class="hover:text-slate-400" href="https://raider.io/guilds/eu/ragnaros/Sp%C3%A1rtai%20Kem%C3%A1lok" target="_blank">Raider.IO</a></li>
      <li><a class="hover:text-slate-400" href="https://worldofwarcraft.com/en-gb/guild/eu/ragnaros/sp%C3%A1rtai-kem%C3%A1lok" target="_blank">WoW Armory</a></li>
      <li><a class="hover:text-slate-400" href="https://www.wowprogress.com/guild/eu/ragnaros/Sp%C3%A1rtai+Kem%C3%A1lok" target="_blank">Wowprogress</a></li>
    </ul>
    <ul class="text-center border-b border-zinc-500 md:border-0 pb-2">
      <li class="text-zinc-400 font-bold italic mb-2">Member Links</li>
      <li>
      @if (auth()->user())
        <a class="hover:text-slate-400" href="{{ route('logout') }}">Logout</a> 
      @else
        <a class="hover:text-slate-400" href="{{ route('user.login') }}">Login</a>
      @endif
      </li>
      <li>Raids</li>
      
    </ul>
  </div>
  <div class="text-center p-2 text-sm">
    Copyright @ 2022 - {{ config('app.name') }} - WoW Guild  EU-Ragnaros.  Version: {{ config('app.ver') }}. 
    <p>
      Created by: <a class="hover:text-slate-400" href="http://krisztiankeseru.com" target="_blank" rel="noopener noreferrer">milka</a>
    </p>
  </div>
</footer>