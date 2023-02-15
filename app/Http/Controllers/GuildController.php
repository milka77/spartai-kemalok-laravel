<?php

namespace App\Http\Controllers;

use App\Models\Wowapi;
use App\Models\News;
use App\Models\Recruitment;
use App\Models\User;
use App\Models\WeeklyMythic;
use Illuminate\Support\Arr;
use Exception;

use App\Services\Raiderio;
use App\Services\Warcraftlogs;
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
        try {      
            // Get all memberinfo from RaiderIO API
            $members = $raiderio->getGuildMembers();
            
            $members_only = $members['members'];
            $members_sorted = array_values(Arr::sort($members_only, function ($value) {
                return $value;
            }));
            
            // Get all raiding members names for Weeklyhighest dungeon checks
            // Adding alliance member to $members_name_list
            $members_name_list = ['Karlos', 'Hësing', 'Subgecixd'];
            foreach($members['members'] as $member)
            {
                $members_name_list[] = $member->character->name;
            }

            // Get the weekly limits
            $limits = WeeklyMythic::where('id', 1)->first();
            $prev_limit = $limits->prev_week;
            $current_limit = $limits->current_week;
                    
            // Get the actual weekly highest dungeon key level
            $weeklyHighest = [];
            foreach($members_name_list as $name){
                $wh = $raiderio->getWeeklyHighestRuns($name);
                $weeklyHighest[] = $wh;
            }
            
            // Passing Data to view
            $context = [
                'members' => $members,
                'members_sorted' => $members_sorted,
                'whd' => $weeklyHighest,
                'prev_limit' => $prev_limit,
                'current_limit' => $current_limit,
            ];
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code = $e->getCode();         
            $string = $e->__toString();  
  
            $context = [
                'message' => $message,
                'code' => $code,
                'string' => $string,
            ];
        }

        return view('guild.rosterio', $context);
    }

    public function kisokos()
    {
        return view('guild.kisokos');
    }

    public function recruitment()
    {
        $recruits = Recruitment::all();
        $recruits_is_active = $this->checkRecruitment();

        $context = [
            'recruits' => $recruits,
            'recruits_is_active' => $recruits_is_active,
        ];

        return view('guild.recruitment', $context);
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

        $all_news = News::orderBy('id', 'desc')->paginate(7);
        $raid_progress = $raiderio->getGuildRaidProgress();
        $recruits = Recruitment::all();
        $recruits_is_active = $this->checkRecruitment();

        $context = [
            'news_index' => $all_news,
            'raid_progress' => $raid_progress,
            'recruits' => $recruits,
            'recruits_is_active' => $recruits_is_active,
        ];

        return view('index', $context);
    }

    // Cheking Recrutment status
    public function checkRecruitment()
    {
        $recruit_status = Recruitment::where('is_active', 1)->first();
        $is_active = false;
        if(!empty($recruit_status)) {
            $is_active = true;
        }
       
        return $is_active;
    }
}
