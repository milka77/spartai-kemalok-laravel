<?php

namespace App\Services;

use stdClass;

class Raiderio
{

  public function getWeeklyHighestRuns($name)
  {
    $httpClient = new \GuzzleHttp\Client();
    
    $raiderioUri = 'https://raider.io/api/v1/characters/profile?region=eu&realm=ragnaros&name='.$name.'&fields=gear%2Ctalents%2Cmythic_plus_scores%2Cmythic_plus_weekly_highest_level_runs%2Cmythic_plus_previous_weekly_highest_level_runs';
    $request =  $httpClient->get($raiderioUri);
    $response = json_decode($request->getBody()->getContents());

    return $response;

  }
   
  public function getGuildMembers()
  {
    $httpClient = new \GuzzleHttp\Client();

    $raiderioUri = 'https://raider.io/api/v1/guilds/profile?region=eu&realm=ragnaros&name=Sp%C3%A1rtai%20Kem%C3%A1lok&fields=members';
    $request =  $httpClient->get($raiderioUri);
    $response = json_decode($request->getBody()->getContents());

    $members_filtered = [
      'members' => [],
      'guild' => [
        'name' => $response->name,
        'faction' => $response->faction,
        'realm' => $response->realm,
        'url' => $response->profile_url,
      ],
    ];
    
    foreach($response->members as $member)
    {
      if($member->rank === 0 || $member->rank === 1 || $member->rank === 3 || $member->rank === 5){
        $members_filtered['members'][] = $member;
      }
    }

    return $members_filtered;
  }

  public function getGuildRaidProgress()
  {
    $httpClient = new \GuzzleHttp\Client();

    $raiderioUri = 'https://raider.io/api/v1/guilds/profile?region=eu&realm=ragnaros&name=Sp%C3%A1rtai%20Kem%C3%A1lok&fields=raid_progression';
    $request =  $httpClient->get($raiderioUri);
    $response = json_decode($request->getBody()->getContents(), true);

    return $response;
  }

  public function getGuildRaidRankings()
  {
    $httpClient = new \GuzzleHttp\Client();

    $raiderioUri = 'https://raider.io/api/v1/guilds/profile?region=eu&realm=ragnaros&name=Sp%C3%A1rtai%20Kem%C3%A1lok&fields=raid_rankings';
    $request =  $httpClient->get($raiderioUri);
    $response = json_decode($request->getBody()->getContents());

    return $response;
  }
}