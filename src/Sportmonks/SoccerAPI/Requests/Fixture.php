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

        $link = $this->callData('fixtures/between/' . $fromDate . '/' .$toDate);

        $total_pages = $link->meta->pagination->total_pages;
        $dados = [];

        for($i = 0; $i < $total_pages; $i++){
            $this->setPage($i);
            $link = $this->callData('fixtures/between/' . $fromDate . '/' .$toDate);
            $dados = array_merge($dados, $link->data);
        }

        return $dados;
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
