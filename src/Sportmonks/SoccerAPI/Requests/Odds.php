<?php

namespace Sportmonks\SoccerAPI\Requests;

use Sportmonks\SoccerAPI\SoccerAPIClient;

class Odds extends SoccerAPIClient {

    public function byMatchId($matchId)
    {
        return $this->callData('odds/fixture/' . $matchId);
    }

    public function byMatchAndBookmakerId($matchId, $bookmakerId)
    {
        return $this->callData('odds/fixture/' . $matchId . '/bookmaker/' . $bookmakerId);
    }
    
    public function byMatchAndMarketId($matchId, $marketId)
    {
        return $this->callData('odds/fixture/' . $matchId . '/market/' . $marketId);
    }    

    public function inplayByMatchId($matchId)
    {

        return $this->callData('odds/inplay/fixture/' . $matchId );
    }

}
