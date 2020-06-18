<?php

namespace Sportmonks\SoccerAPI\Requests;

use Carbon\Carbon;
use Sportmonks\SoccerAPI\SoccerAPIClient;

class Fixture extends SoccerAPIClient {

    public function betweenDates($fromDate,$toDate)
    {
        if($fromDate instanceof Carbon)
        {
            $fromDate = $fromDate->format('Y-m-d');
        }

        if($toDate instanceof Carbon)
        {
            $toDate = $toDate->format('Y-m-d');
        }

        return $this->callData('fixtures/between/' . $fromDate . '/' .$toDate);
    }

    public function betweenDatesTeamId($fromDate,$toDate,$teamId)
    {
        if($fromDate instanceof Carbon)
        {
            $fromDate = $fromDate->format('Y-m-d');
        }

        if($toDate instanceof Carbon)
        {
            $toDate = $toDate->format('Y-m-d');
        }

        return $this->callData('fixtures/between/' . $fromDate . '/' .$toDate.'/'.$teamId);
    }

    public function byDate($date)
    {
        if($date instanceof Carbon)
        {
            $date = $date->format('Y-m-d');
        }

        return $this->callData('fixtures/date/' . $date);
    }

    public function byMatchId($id)
    {
        return $this->call('fixtures/' . $id);
    }

    public function headToHead($firstTeamId,$secondTeamId)
    {
        return $this->call('head2head/' . $firstTeamId . '/' . $secondTeamId);
    }

    public function multi($array)
    {
        return $this->call('fixtures/multi/' . join(',', $array));
    }

}