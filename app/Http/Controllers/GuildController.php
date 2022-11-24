<?php

namespace App\Http\Controllers;

use App\Models\Wowapi;
use App\Models\News;
use App\Models\Recruitment;
use App\Models\User;

use App\Services\Raiderio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GuildController extends Controller
{

    private function generateAccessToken()
    {
        $params = array(
            'grant_type' => 'client_credentials'
        );
        $tokenUri = 'https://oauth.battle.net/token';

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_USERPWD, env('WOW_API_CLIENT_ID').':'.env('WOW_API_SECRET'));
        curl_setopt( $ch, CURLOPT_URL, $tokenUri );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec( $ch );
        curl_close( $ch );

        $accesTokenResponse = json_decode( $response, true );

        return $accesTokenResponse['access_token'];
    }

    // // Get the Guild roster from BlizzadAPI
    // public function roster()
    // {   
    //     $token = $this->generateAccessToken();

    //     $blizzApi = 'https://eu.api.blizzard.com/data/wow/guild/ragnaros/sp%C3%A1rtai-kem%C3%A1lok/roster?namespace=profile-eu&locale=en_GB&access_token='.$token;
    //     $guild_members = json_decode(file_get_contents($blizzApi), true);

    //     $racesUri = 'https://eu.api.blizzard.com/data/wow/playable-race/index?namespace=static-eu&locale=en_US&access_token='.$token;
    //     $races = json_decode(file_get_contents($racesUri), true);
        
    //     $classesUri = 'https://eu.api.blizzard.com/data/wow/playable-class/index?namespace=static-eu&locale=en_US&access_token='.$token;
    //     $classes = json_decode(file_get_contents($classesUri), true);

    //     $context = [
    //         'guild_members' => $guild_members,
    //         'token' => $token,
    //         'races' => $races,
    //         'classes' => $classes,
    //     ];

    //     return view('guild.roster', $context);
    // }

    // Get the Guild roster from RaiderIO API
    public function roster(Raiderio $raiderio)
    {
       
        
        // Get all memberinfo from RaiderIO API
        $members = $raiderio->getGuildMembers();
        

        // Get all raiding members names for Weeklyhighest dungeon checks
        $members_name_list = [];
        foreach($members['members'] as $member)
        {
            $members_name_list[] = $member->character->name;
        }
                
        // Get the actual weekly highest dungeon key level
        $weeklyHighest = [];
        foreach($members_name_list as $name){
            $wh = $raiderio->getWeeklyHighestRuns($name);
            $weeklyHighest[] = $wh;
        }
        
        // Passing Data to view
        $context = [
            'members' => $members,
            'whd' => $weeklyHighest,
        ];

        return view('guild.rosterio', $context);
    }

    public function kisokos()
    {
        return view('guild.kisokos');
    }

    public function recruitment()
    {
        $recruits = Recruitment::all();

        return view('guild.recruitment', ['recruits' => $recruits]);
    }

    // Receiving the Weekly highest run from Raider.io API
    public function raiderio(Raiderio $raiderio, $name)
    {
        
        $data = $raiderio->getWeeklyHighestRuns($name);

        // dd($data);
        return view('guild.raiderio', ['data' => $data]);
    }

    public function raider()
    {
        return view('guild.raider');
    }

    public function index(Raiderio $raiderio)
    {

        $all_news = News::all()->sortByDesc('id');
        $raid_progress = $raiderio->getGuildRaidProgress();
        $recruits = Recruitment::all();

        $context = [
            'news_index' => $all_news,
            'raid_progress' => $raid_progress,
            'recruits' => $recruits
        ];

        return view('index', $context);
    }
}
