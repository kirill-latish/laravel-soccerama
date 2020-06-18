<?php

namespace Sportmonks\SoccerAPI\Requests;

use Sportmonks\SoccerAPI\SoccerAPIClient;

class Prediction extends SoccerAPIClient {

	/**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getLeagues()
    {
        $url = "predictions/leagues";
        return $this->callData($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getProbabilities()
    {
        $url = "predictions/probabilities/next";
        return $this->callData($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function byFixtureId(int $fixtureId)
    {
        $url = "predictions/probabilities/fixture/{$fixtureId}";
        return $this->callData($url);
    }

    /**
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getValueBets()
    {
        $url = "predictions/valuebets/next";
        return $this->call($url);
    }

    /**
     * @param int $fixtureId
     * @return stdClass
     * @throws ApiRequestException
     */
    public function getValueBetsByFixtureId(int $fixtureId)
    {
        $url = "predictions/valuebets/fixture/{$fixtureId}";
        return $this->call($url);
    }

}

?>