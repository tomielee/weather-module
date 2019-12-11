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

        //setup mock
        $weatherModel = $di->get("weather");
        // $cfg = $this->di->get("configuration");

        // $config = $cfg->load("weathermock.php");
        // $weatherModel->setConfig($config['config']);

        //initialize the controller.
        $this->controller = new WeatherApiController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test route json?location=Dalarna
     */
    public function testJsonActionGet()
    {
        $testLocation = "Dalarna";

        //test valid location
        $this->di->get("request")->setGet("location", $testLocation);

        $res = $this->controller->jsonActionGet();
        $this->assertIsArray($res);
    }

    /**
     * Test route "json?location="
     */
    public function testJsonActionGetBadRequest()
    {
        $testLocation = "";

        $this->di->get("request")->setGet("location", $testLocation);
        $res = $this->controller->jsonActionGet();

        $json = $res[0];
        $status = $res[1];
        $this->assertIsArray($res);
        $this->assertContains("No location provided. Please try again.", $json['message']);
        $this->assertEquals(400, $status);
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
