<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg bg-zinc-800 text-white">
      <h1 class="text-2xl text-center mb-4">Kemál Kisokos</h1>

      {{-- Content Body --}}
      <div class="border-t border-b border-zinc-600 flex flex-col lg:flex-row gap-4">
      {{-- Left side --}}
      <div class="w-full lg:w-1/2">
        <h2 class="text-xl text-center py-2">Beugró - Raid előtt</h2>

      {{-- Section Jatekon kivul --}}
      <div class="mb-4">
        <p class="w-full text-2xl bg-zinc-700 rounded-lg p-2 pl-4 mb-2">Játékon kívül</p>

        <div class="pl-4">
          <p class="text-lg">Discord</p>
          <ul class="list-disc ml-5 mb-4">
            <li>
              <a class="hover:text-yellow-600" class="list-disc" href="https://discord.gg/cbthD2FYjz" target="_blank">Discord Szerverunk</a>
            </li>
          </ul>

          <p class="text-lg">Addonok</p>
          <ul class="list-disc ml-5 mb-4">
            <li>Valamilyen bossmod, amelyiket jobban szereted / megszoktad (
              DBM, 
              BigWigs
              )</li>
            <li><a class="hover:text-yellow-600" href="https://www.curseforge.com/wow/addons/method-raid-tools" target="_blank">Method Raid Tools</a></li>
            <li>WeakAuras
              <ul class="list-decimal ml-5">
                <li><a class="hover:text-yellow-600" href="https://wago.io/slraid3" target="_blank" rel="noopener noreferrer">Sepulcher of the First Ones</a></li>
                <li><a class="hover:text-yellow-600" href="https://wago.io/dW5U0N3HP" target="_blank" rel="noopener noreferrer">Aeon Remnants - Among Us Helper</a></li>
                <li><a class="hover:text-yellow-600" href="https://wago.io/ERT_Note_Timers" target="_blank" rel="noopener noreferrer">ERT Timers </a></li>
                <li><a class="hover:text-yellow-600" href="https://www.curseforge.com/wow/addons/sharedmedia_causese" target="_blank" rel="noopener noreferrer">SharedMedia</a></li>
              </ul>
            </li>
          </ul>

          <p>
            Abban az esetben ha nem tudsz raidre jönni, semmi gond, csak <strong class="text-red-400">légyszíves jelezd előre 
            <a class="hover:text-yellow-600" href="https://discord.com/channels/478499711263703070/966305714912002058" target="_blank" rel="noopener noreferrer">
               Discordon az #ellenőrző</a> csatiban.</strong> Köszike!
          </p>

        </div>
      </div>
      {{-- End Of Section Jatekon kivul --}}


      {{-- Section - Jatekon belul --}}
      <div>
        <p class="w-full text-2xl bg-zinc-700 rounded-lg p-2 pl-4 mb-2">Játékon belül</p>

        <div class="pl-4">
          {{-- Itemek --}}
          <p class="text-xl pt-2 mb-1">Itemek</p>
          <p class="py-2">
            Törekszünk arra, hogy ezeknek az itemeknek nagyrésze elérhető legyen a guild bank első oldalán ha esetleg netán véletlenül kifogynál, akkor raid alatt egyszerűen lehessen orvosolni a problémát, de mindenki legyen szíves ezekből raid előtt bevásárolni.
          </p>
          <p class="py-2">
            Ha a guild bankból csemegélsz, akkor legyél szíves ezt golddal kompenzálni, ugyanis a banknak nincs más rendszeres bevételi forrása. Támogatásra mindig van mód, akik szerencsésebbek golddal legyenek szívesek élni vele!
          </p>
          
          {{-- Itemek lista --}}
          <ul class="list-disc ml-5 mb-4">
            <li>
              <a class="hover:text-yellow-600" class="list-disc" href="https://www.wowhead.com/item=171276/spectral-flask-of-power" target="_blank">Spectral Flask of Power</a>
            </li>
            <li>Battle poti (class függvényében)</li>
            <li>
              <a class="hover:text-yellow-600" class="list-disc" href="https://www.wowhead.com/item=172347/heavy-desolate-armor-kit" target="_blank">Heavy Desolate Armor Kit</a>
            </li>
            <li>
              <a class="hover:text-yellow-600" class="list-disc" href="https://www.wowhead.com/ptr/item=187802/cosmic-healing-potion" target="_blank"></i>HP poti</a>
            </li>
            <li>Ideiglenes fegyver enchant (zsír, smithing stone, etc)</li>
            <li>Vantus rúna (legalább 1)</li>
            <li>Augment rúna</li>
          </ul>
          {{-- End Of Itemek --}}

          {{-- Socketek/enchantok --}}
          <p class="text-xl pt-2 mb-1">Socketek / Enchantok</p>
          <ul class="list-disc ml-5 mb-4">
            <li>Amiben lehet gem, abban legyen</li>
            <li>Fegyverek</li>
            <li>Back</li>
            <li>Chest (Eternal Skirmish / Stats)</li>
            <li>Wrist</li>
            <li>Hands</li>
            <li>Feet</li>
            <li>Rings</li>
          </ul>
          {{-- End Of Socketek/enchantok --}}

          <p class="text-xl pt-2 mb-1">Aktuális Blizzard Baromság</p>
          <p class="py-2">Jelen kieg (Shawodlands) esetében ezek a legendaryk meg a szett itemek. Ezek lehetőleg legyenek, legyen rá figyelve etc.</p>
        </div>
      </div>
      {{-- End Of Section - Jatekon belul --}}

      </div>
      {{-- End Of Left side --}}
      
      {{-- Right Side --}}
      <div class="w-full lg:w-1/2">
        <h2 class="text-xl text-center py-2">Beugró - Raid alatt</h2>
        
        {{-- Raid alatt --}}
        <p class="py-2 text-2xl bg-zinc-700 pl-5 rounded-lg mb-2">Viselkedés Raid alatt</p>
        <p class="p-2 mb-3">
          Mindenki legyen szíves raid alatt a következőket szem előtt tartani és viselkedésmódját ezekhez az elvekhez hűen állítani:
        </p>
        
        <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">Azért vagyunk itt, hogy jól érezzük magunkat.</p>
        <p class="p-2 mb-3">
          Ez <span class="italic">néha</span> azt jelenti, hogy sörözve hülyéskedünk, <span class="italic">néha</span> azt jelenti, hogy mindenki fókuszál és a legjobbunkat próbáljuk beletenni a tryba. Ezt úgy lehet szem előtt tartani, hogy nem húzzuk egymás idejét és próbáljuk egymással felvenni a fonalat. Mindenkinek vannak jobb és rosszabb napjai, amikor életbe lép az...
        </p>

        <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">IRL > WoW</p>
        <p class="p-2 mb-3">
          Minden karakter mögött egy ember ül. Legyünk mindig tisztelettudóak egymással, akár voiceon, akár PMben, akár mythicben, akár raidben.
        </p>

        <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">Fun > Progress</p>
        <p class="p-2 mb-3">
          Az tény és való, hogy azért vagyunk itt, hogy haladjunk előre, és ez néha nagyon nehéz, szimplán azért, mert a játék arra lett tervezve, hogy nehéz legyen, vagy mert rossz napunk 
          van, ésatöbbi. <span class="text-red-400">Viszont</span> ez <span class="text-red-400 italic">senkit, semmikor</span> nem jogosít fel arra, hogy ujjal mutogassunk egymásra vagy személyeskedjünk. Ez a viselkedés gyorsvasút a dzsanázó rangra.
        </p>
        <p class=" px-2 mb-5">
          Ez nem azt jelenti, hogy ha probléma van, akkor ne jelezd - viszont az biztos, hogy aki elrontotta a mechanikát vagy túl kevés DPSt vagy healt vagy tauntot tolt, az nem fogja azért 
          jobban csinálni, mert te jól megmondtad a magadét. Ez a hozzáállás egymás ellen uszítja a csapatot, pedig a <span class="text-red-400">kemálok a problémát verik, nem egymást.</span>
        </p>
        {{-- End Of Raid alatt --}}

        {{-- Rangok & Loot --}}
        <div>
          <p class="py-2 text-2xl bg-zinc-700 pl-5 rounded-lg mb-3">Rangok & Loot</p>

          {{-- Rank Table --}}
          <div class="px-4 flex justify-center mb-3">
            <table class="table-auto w-8/12 mb-4">
              <thead class="border-b">
                <tr>
                  <th scope="col">Titulus</th>
                  <th scope="col">Rang</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b text-purple-500">
                  <td>A Kemál</td>
                  <td>GM</td>
                </tr>
                <tr class="border-b text-purple-500">
                  <td>Császárbáttya</td>
                  <td>Officer</td>
                </tr>
                <tr class="border-b">
                  <td>Császárhúgalt</td>
                  <td>Officer Alt</td>
                </tr>
                <tr class="border-b text-purple-500">
                  <td>300 Testvér</td>
                  <td>Raider</td>
                </tr>
                <tr class="border-b">
                  <td>Dzsanázó</td>
                  <td>Újonc</td>
                </tr>
                <tr class="border-b">
                  <td>Karácsonygeri</td>
                  <td>Inaktív</td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- End Of Rank Table --}}

          <p class="py-1 mb-2 text-lg bg-zinc-700 pl-5 rounded-lg">Loot</p>
          <p class="p-2">
            Azok, kik sikeresen kiérdemelték a <span class="text-red-500">300 Testvér</span> vagy netán még nemesebb rangot (<span class="text-purple-500">lilával jelezve</span>), prioritást élveznek lootoláskor main karaktereikkel.
          </p>
          <p class="p-2">
            Rolloláskor az <span class="text-red-500">ÖTÖS</span> roll a joker, <span class="text-red-500">ÖTÖS</span>t csak <span class="text-red-500">ÖTÖS</span>sel lehet ütni. Ezesetben az <span class="text-red-500">ÖTÖS</span>t rolloló szerencsések egymás között bunyózhatják le, akár még egy roll körrel.
          </p>

          <p class="text-xl pl-2 pt-2 mb-1">Loot Priority</p>
          <div class="p-2">
            <p class="p-1 pl-2 mb-3 bg-zinc-300 text-black rounded-lg font-bold">
              5 > 300 Testvér + > Dzsanázó > Alt (rangtól függetlenül)
            </p>
          </div>

        </div>
        {{-- End Of Rangok & Loot --}}
      </div>
      {{-- End Of Right Side --}}
        
      </div>
      {{-- End Of Content Body --}}
      
    </div>
  </div>
  @endsection
</x-home-master>