<?php

namespace Jenel\Weather;

use Anax\DI\DIFactoryConfig;
use Anax\Request\Request;
use PHPUnit\Framework\TestCase;

/**
 * Test the WeatherController.
 * Tests routes and that the routes return correct type.
 *
 */
class WeatherControllerTest extends TestCase
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
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    /**
     * Test the GET /weather, /weather/index
     */
    public function testIndexActionGet()
    {
        $controller = $this->controller;

        //testcases
        $res = $controller->indexActionGet();
        $body = $res->getBody();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertContains("<title>Weather ", $body);
    }
    /**
     * Test GET /weather
     * with error
     */
    public function testIndexActionGetError()
    {
        $controller = $this->controller;
        $this->di->get("session")->set("error", true);

        $res = $controller->indexActionGet();
        $body = $res->getBody();
        $this->assertContains("No valid geografic position. Try again.", $body);
    }

    /**
     * Test the POST /weather, /weather/index
     */
    public function testIndexActionPost()
    {
        $controller = $this->controller;
        $locationValid = "Stockholm";
        $locationNotValid = "";

        //test Valid with options week
        $this->di->get("request")->setPost("location", $locationValid);
        $this->di->get("request")->setPost("radio", "week");

        $res = $controller->indexActionPost();
        $body = $res->getBody();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertContains("Weather forecast ", $body);

        //test Valid with options past
        $this->di->get("request")->setPost("location", $locationValid);
        $this->di->get("request")->setPost("radio", "past");

        $res = $controller->indexActionPost();
        $body = $res->getBody();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertContains("Weather forecast ", $body);
    }

    /**
     * Tet the POST /weather, /weather/index
     * with error
     * should redirect
     */
    public function testIndexActionPostRedirect()
    {

        $controller = $this->controller;

        $testLocation = "";
        $this->di->get("request")->setPost("location", $testLocation);

        $res = $controller->indexActionPost();
        $headers = $res->getHeaders();

        $hasLocationHeaders = false;
        foreach ($headers as $header) {
            if (substr($header, 0, 10) === 'Location: ') {
                $hasLocationHeaders = true;
            }
        }
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertTrue($hasLocationHeaders);
    }

    /**
     * Test the GET /weather/api
     */
    public function testApiActionGet()
    {
        $controller = $this->controller;
        $res = $controller->apiActionGet();
        $body = $res->getBody();


        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertContains("API", $body);
    }
}
