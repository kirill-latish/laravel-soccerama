<?php
use Sportmonks\SoccerAPI\Facades\SoccerAPI;

/**
 * @group bookmaker
 */
class BookmakerTest extends TestCase {

    /**
     * @test
     */
    public function it_retrieves_all_bookmakers()
    {
        $response = SoccerAPI::bookmakers()->all();

        $this->assertNotEmpty($response->data);
    }

}
