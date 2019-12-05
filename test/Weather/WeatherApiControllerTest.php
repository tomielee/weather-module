<?php

namespace Jenel\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the WeatherApiController.
 */
class WeatherApiControllerTest extends TestCase
{

    /**
     * Setup di
     * Set directory to a test cache.
     */
    public function setUp()
    {
        global $di;

        //setup di.
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");
    
        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        //initialize the controller.
        $this->controller = new WeatherApiController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test route "json"
     */
    public function testJsonActionGet()
    {
        $locationValid = "Stockholm";
        $locationNotValid = "";

        $this->di->get("request")->setGet("location", $locationValid);

        $res = $this->controller->jsonActionGet();
        $this->assertIsArray($res);
    }

    /**
     * Test the route "forbidden".
     */
    public function testForbiddenAction()
    {
        $res = $this->controller->forbiddenAction();
        $this->assertInternalType("array", $res);

        $json = $res[0];
        $status = $res[1];

        $exp = "forbidden to access";
        $this->assertContains($exp, $json["message"]);
        $this->assertEquals(403, $status);
    }
}
