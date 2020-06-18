<?php

namespace Sportmonks\SoccerAPI;

use Sportmonks\SoccerAPI\Requests\Bookmaker;
use Sportmonks\SoccerAPI\Requests\Commentary;
use Sportmonks\SoccerAPI\Requests\Continent;
use Sportmonks\SoccerAPI\Requests\Country;
use Sportmonks\SoccerAPI\Requests\Fixture;
use Sportmonks\SoccerAPI\Requests\Head2Head;
use Sportmonks\SoccerAPI\Requests\League;
use Sportmonks\SoccerAPI\Requests\LiveScore;
use Sportmonks\SoccerAPI\Requests\Markets;
use Sportmonks\SoccerAPI\Requests\Odds;
use Sportmonks\SoccerAPI\Requests\Player;
use Sportmonks\SoccerAPI\Requests\Prediction;
use Sportmonks\SoccerAPI\Requests\Round;
use Sportmonks\SoccerAPI\Requests\Season;
use Sportmonks\SoccerAPI\Requests\Squad;
use Sportmonks\SoccerAPI\Requests\Standings;
use Sportmonks\SoccerAPI\Requests\TVStation;
use Sportmonks\SoccerAPI\Requests\Team;
use Sportmonks\SoccerAPI\Requests\TopScorer;
use Sportmonks\SoccerAPI\Requests\Venue;
use Sportmonks\SoccerAPI\Requests\Video;

class SoccerAPI {

    public function bookmakers()
    {
        return new Bookmaker();
    }

    public function commentaries()
    {
        return new Commentary();
    }

    public function leagues()
    {
        return new League();
    }

    public function head2head()
    {
        return new Head2Head();
    }

    public function continents()
    {
        return new Continent();
    }

    public function countries()
    {
        return new Country();
    }

    public function fixtures()
    {
        return new Fixture();
    }

    public function tvstations()
    {
        return new TVStation();
    }

    public function venues()
    {
        return new Venue();
    }

    public function rounds()
    {
        return new Round();
    }

    public function livescores()
    {
        return new LiveScore();
    }

    public function odds()
    {
        return new Odds();
    }

    public function players()
    {
        return new Player();
    }

    public function seasons()
    {
        return new Season();
    }

    public function standings()
    {
        return new Standings();
    }

    public function teams()
    {
        return new Team();
    }

    public function topscorers()
    {
        return new TopScorer();
    }

    public function videos()
    {
        return new Video();
    }

    public function squads()
    {
        return new Squad();
    }

    public function markets()
    {
        return new Markets();
    }

     /**
     * @return Prediction
     */
    public static function predictions()
    {
        return new Prediction();
    }

}