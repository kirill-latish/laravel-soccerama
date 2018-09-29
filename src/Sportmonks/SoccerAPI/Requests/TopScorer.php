<?php

namespace Sportmonks\SoccerAPI\Requests;

use Sportmonks\SoccerAPI\SoccerAPIClient;

class TopScorer extends SoccerAPIClient {

    public function bySeasonId($seasonId)
    {
        return $this->callData('topscorers/season/' . $seasonId);
    }

    public function aggregatedBySeasonId($seasonId)
    {
        return $this->callData('topscorers/season/' . $seasonId . '/aggregated');
    }

}