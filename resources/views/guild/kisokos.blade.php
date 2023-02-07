<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="container p-3 rounded-lg bg-zinc-800 text-white">
      <h1 class="text-2xl text-center mb-4">{{ config('app.name') }} Kisokos</h1>

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
                  <a class="hover:text-slate-400" class="list-disc" href="https://discord.gg/cbthD2FYjz" target="_blank">Discord Szerverunk</a>
                </li>
              </ul>

              <p class="text-lg">Addonok</p>
              <ul class="list-disc ml-5 mb-4">
                <li>Valamilyen bossmod, amelyiket jobban szereted / megszoktad (
                  <a class="hover:text-slate-400" href="https://www.curseforge.com/wow/addons/deadly-boss-mods" target="_blank" rel="noopener noreferrer">DBM,</a>  
                  <a class="hover:text-slate-400" href="https://www.curseforge.com/wow/addons/big-wigs" target="_blank" rel="noopener noreferrer">BigWigs</a>  
                  )</li>
                <li><a class="hover:text-slate-400" href="https://www.curseforge.com/wow/addons/method-raid-tools" target="_blank" rel="noopener noreferrer">Method Raid Tools</a></li>
                <li>
                  <a class="hover:text-slate-400" href="https://www.curseforge.com/wow/addons/weakauras-2" target="_blank" rel="noopener noreferrer">WeakAuras</a>  
                  <ul class="list-decimal ml-5">
                    <li><a class="hover:text-slate-400" href="https://wago.io/ERT_Note_Timers" target="_blank" rel="noopener noreferrer">ERT Timers </a></li>
                    <li><a class="hover:text-slate-400" href="https://www.curseforge.com/wow/addons/sharedmedia_causese" target="_blank" rel="noopener noreferrer">SharedMedia</a></li>
                    <li><a class="hover:text-slate-400" href="#" target="_blank" rel="noopener noreferrer">TBD</a></li>
                  </ul>
                </li>
              </ul>

              <p>
                Abban az esetben ha nem tudsz raidre jönni, semmi gond, csak <strong class="text-red-400">légyszíves jelezd előre 
                <a class="hover:text-slate-400" href="https://discord.com/channels/478499711263703070/966305714912002058" target="_blank" rel="noopener noreferrer">
                  Discordon az #ellenőrző</a> csatiban.</strong> Köszike!
              </p>

            </div>
          </div>
          {{-- End Of Section Jatekon kivul --}}


          {{-- Section - Jatekon belul --}}
          <div>
        
            {{-- Raid alatt --}}
            <p class="py-2 text-2xl bg-zinc-700 pl-5 rounded-lg mb-2">Viselkedés Raid alatt</p>
            <p class="p-2 mb-4">
              Mindenki legyen szíves raid alatt a következőket szem előtt tartani és viselkedésmódját ezekhez az elvekhez hűen állítani:
            </p>
            
            <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">Azért vagyunk itt, hogy jól érezzük magunkat.</p>
            <p class="p-2 mb-4">
              Ez <span class="italic">néha</span> azt jelenti, hogy sörözve hülyéskedünk, <span class="italic">néha</span> azt jelenti, hogy mindenki fókuszál és a 
              legjobbunkat próbáljuk beletenni a tryba. Ezt úgy lehet szem előtt tartani, hogy nem húzzuk egymás idejét és próbáljuk egymással felvenni a fonalat. 
              Mindenkinek vannak jobb és rosszabb napjai, amikor életbe lép az...
            </p>

            <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">IRL > WoW</p>
            <p class="p-2 mb-3">
              Minden karakter mögött egy ember ül. Legyünk mindig tisztelettudóak egymással, akár voiceon, akár PMben, akár mythicben, akár raidben.
            </p>

            <p class="p-2 font-bold text-lg mb-3">
              De ha úgy döntöttél, hogy részt veszel a raiden, akkor amikor a pull timer elindul akkor a nem bossal kapcsolatos beszélgetést felfüggesztjük és a 
              maximumot próbáljuk beletenni a tryba!
            </p>

            <p class="py-1 text-lg bg-zinc-700 pl-5 rounded-lg">Hivatalos Raid Napok:</p>
            <ul class="list-inside list-disc p-2">
              <li>Szerda 20:00 - 23:00</li>
              <li>Vasárnap 20:00 - 23:00</li>
            </ul>
            <p class="px-2">További raidnapok megbeszélés tárgyát képzik.</p>

            {{-- End Of Raid alatt --}}



          </div>
          {{-- End Of Section - Jatekon belul --}}

        </div>
        {{-- End Of Left side --}}
      
      {{-- Right Side --}}
      <div class="w-full lg:w-1/2">
        <h2 class="text-xl text-center py-2">Beugró - Raid alatt</h2>

        {{-- Rangok --}}
        <div class="mb-2">
          <p class="py-2 text-2xl bg-zinc-700 pl-5 rounded-lg mb-3">Játékon belül: Rangok</p>

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
                <tr class="border-b text-purple-500">
                  <td>Gigachad</td>
                  <td>Veterán</td>
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
                  <td>Veretőgép</td>
                  <td>Alt</td>
                </tr>
                <tr class="border-b">
                  <td>Dzsanázó</td>
                  <td>Újonc</td>
                </tr>
                <tr class="border-b">
                  <td>Tesó</td>
                  <td>Social</td>
                </tr>
                <tr class="border-b">
                  <td>Karácsonygeri</td>
                  <td>Inaktív</td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- End Of Rank Table --}}


          <div>
            <p class="py-1 mb-2 text-lg bg-zinc-700 pl-5 rounded-lg">300 testvér(Raider) rang megszerzése:</p>
            <div class="p-2">
              Hetente 3 pont szerezhető a következők szerint:
              <ol class="list-decimal list-inside ml-2">
                <li>Szerdai raid 1 pont</li>
                <li>Vasárnapi raid 1 pont</li>
                <li>Megadott szintű mythic+ dungeon teljesítése a resetben 1 pont</li>
                <li>Előzetes jelzés nélküli késés a raidről -0.5 pont (2 től számít a -pont)</li>
                <li>Raiden mutatott teljesítmény, legalább a guild átlagot érje el</li>
                <li>A kiemelkedő teljesítmény felgyorsíthatja a promotálást 300 Testvér rangra</li>
              </ol>
            </div>
            <p class="p-2">
              A heti 3 pont havonta 12 pontot jelent melyből 9 pont elérése esetén jár a raider rang. Ennek ellenőrzése folyamatosan, szerdánként történik és aki elérte a megfelelő mennyiséget az elmúlt 4 hétben, megkaphatja a 300 testvér rangot és annak előnyeit. Aki már 300 testvér rangban van és nem teljesíti a 9 pontot 4 héten belül az elveszíti a rangját.
            </p>
            <p class="p-2">Újoncok 2 hét után lehetnek először raiderek, amennyiben 2 hétre vetítve megvan nekik a 75%-os pont arányuk.</p>
            <p class="p-2">A szabály alól officerek sem kivételek, az ő loot szerinti rangjuk noteban lesz vezetve.</p>

            <p class="py-1 mb-2 text-lg bg-zinc-700 pl-5 rounded-lg">300 Testvér rang előnyei:</p>
            <p class="p-2">
              Mivel a raidben group loot lesz az egyetlen elérhető loot rendszer, ezért a 300 testvér rangban lévők a szerdai és vasárnapi raideken prioritást élveznek
                needelés esetén az újoncokkal/nem raiderekkel szemben, ezzel értékelve a beletett munkájukat.
            </p>
            <p class="p-2">
              Amennyiben vitás kérdés áll fenn, úgy a raidspot tekintetében is prioritást élveznek a Raiderek.
            </p>

          </div>
        </div>
        {{-- End Of Rangok --}}

        {{-- Consumable and Character --}}
        <div class="mb-2">
          <p class="py-1 mb-2 text-lg bg-zinc-700 pl-5 rounded-lg">Consumable és karakter:</p>
          <p class="p-2">
            A karakternek Raid ready állapotban kell lennie, enchantok, gemek és consumable-k használata kötelező, illetve mindenki tartson magánál tartalékot 
            szükség esetére. (dps poti, food buff, phial, fegyver rúna, hp poti, mana poti, augment rúna).
          </p>
        </div>
        {{-- End Of Consumable and Character --}}

        {{-- BoE Loots --}}
        {{-- <div class="mb-2">
          <p class="py-1 mb-2 text-lg bg-zinc-700 pl-5 rounded-lg">BoE lootok:</p>
          <p class="p-2">
            Raidből eső BoE lootok a guild tulajdonát képzik, ezek eladásáról A Kemál gondoskodik. Ezzel a guildbankunk fedezete meglesz arra, hogy mindenkinek biztosítani 
            tudjuk a raidekre az összes szükséges consumable-t. Akinek feltétlenül szüksége van egy boe tárgyra az A Kemál felé jelezheti igényét egyedi elbírálásra
          </p>
        </div> --}}
        {{-- End Of BoE Loots --}}
        
      </div>
      {{-- End Of Right Side --}}
        
      </div>
      {{-- End Of Content Body --}}
      
    </div>
  </div>
  @endsection
</x-home-master>