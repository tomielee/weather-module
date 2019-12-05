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

        //initialize the controller.
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

        //test with error
        $this->di->get("request")->setGet("error", true);
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

        //test Valid
        $this->di->get("request")->setPost("location", $locationValid);
        $res = $controller->indexActionPost();
        $body = $res->getBody();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertContains("Weather forecast ", $body);


        //test Not Valid - should be redirect
        $this->di->get("request")->setPost("location", $locationNotValid);

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
