<?php

namespace Jenel\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the WeatherApiController.
 */
class WeatherModelTest extends TestCase
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
        $this->weatherModel = $di->get("weather");
        $cfg = $this->di->get("configuration");

        // $config = $cfg->load("weathermock.php");
        // $this->weatherModel->setConfig($config['config']);
    }


    /**
     * Test getUrl()
     */
    public function testGetApiUrl()
    {
        $weatherModel = $this->weatherModel;
        $testConfig = [
            "test" => false,
            "baseUrl" => "baseTest/",
            "key" => "keyTest",
            "exclude" => "/excludeTest"
        ];
        $weatherModel->setConfig($testConfig);
        
        $res = $weatherModel->getApiUrl("lat", "lon");
        // var_dump($res);
        $this->assertIsString($res);
        $this->assertEquals("baseTest/keyTest/lat,lon/excludeTest", $res);
    }

    /**
     * Test getUrls()
     */
    public function testGetApiUrls()
    {
        $weatherModel = $this->weatherModel;
        $testConfig = [
            "test" => false,
            "baseUrl" => "baseTest/",
            "key" => "keyTest",
            "excludeMulti" => "/excludeMultiTest"
        ];
        $weatherModel->setConfig($testConfig);
        
        $days = 2;
        $res = $weatherModel->getApiUrls("lat", "lon", $days);
        for ($i=0; $i < $days; $i++) {
            $date[] = time() - ($i * 24 * 60 * 60);
        }
        // var_dump($res);

        $this->assertIsArray($res);
        $this->assertEquals("baseTest/keyTest/lat,lon,$date[0]/excludeMultiTest", $res[0]);
        $this->assertEquals("baseTest/keyTest/lat,lon,$date[1]/excludeMultiTest", $res[1]);
    }
}
