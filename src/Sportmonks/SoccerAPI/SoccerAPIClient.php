<?php

namespace Sportmonks\SoccerAPI;

use GuzzleHttp\Client;
use Sportmonks\SoccerAPI\Exceptions\ApiRequestException;

class SoccerAPIClient {

    /* @var $client Client */
    protected $client;

    protected $apiToken;
    protected $withoutData;
    protected $include = [];
    protected $leagues = [];
    protected $perPage = 50;
    protected $page = 1;
    protected $timezone;
    
    public function __construct()
    {
        $options = [
            'base_uri'  => 'https://soccer.sportmonks.com/api/v2.0/',
            'verify'    => app('env') === 'testing' ? false : true,
        ];
        $this->client = new Client($options);

        $this->apiToken = config('soccerapi.api_token');
        if(empty($this->apiToken))
        {
            throw new \InvalidArgumentException('No API token set');
        }
        $this->timezone = empty(config('soccerapi.timezone')) ? config('app.timezone') : config('soccerapi.timezone');

        $this->withoutData = empty(config('soccerapi.without_data')) ? false : config('soccerapi.without_data');
    }

    protected function call($url, $hasData = false)
    {
        $query = [
            'api_token' => $this->apiToken,
            'per_page' => $this->perPage,
            'page' => $this->page
        ];
        if(!empty($this->include))
        {
            $query['include'] = $this->include;
        }
        if ($this->timezone)
        {
            $query['tz'] = $this->timezone;
        }
		if(count($this->leagues))
		{
			$query['leagues'] = $this->leagues;
		}

        $response = $this->client->get($url, ['query' => $query]);

        $body = json_decode($response->getBody()->getContents());

        if(property_exists($body, 'error'))
        {
            if(is_object($body->error))
            {
                throw new ApiRequestException($body->error->message, $body->error->code);
            }
            else
            {
                throw new ApiRequestException($body->error, 500);
            }

            return $response;
        }

        if($hasData && $this->withoutData)
        {
            return $body->data;
        }

        return $body;
    }

    protected function callData($url)
    {
        return $this->call($url, true);
    }

    /**
     * @param $include - string or array of relations to include with the query
     */
    public function setInclude($include)
    {
        if(is_array($include) && !empty($include))
        {
            $include = implode(',', $include);
        }

        $this->include = $include;

        return $this;
    }

    /**
     * @param $perPage - int of per_page limit data in request
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @param $page - int of requested page
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
	 * @param $leagues - string or array of leagues to filter with the query
	 */
	public function setLeagues($leagues)
	{
		if(is_array($leagues) && !empty($leagues))
		{
			$leagues = implode(',', $leagues);
		}

		$this->leagues = $leagues;

		return $this;
	}
}
