<?php

namespace Jenel\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * WeatherController
 * get weather forecast from location.
 * 
 * uses $di "weather" -> WeatherModel
 * uses $di "curl -> curl functions
 */
class WeatherApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * @var IPWeatherModel
     */
    private $WeatherModel;


     /**
     * The initialize the class.
     *
     * @return void
     */
    public function initialize() : void
    {
        $this->WeatherModel = $this->di->get("weather");
        $this->WeatherModel->setCurl($this->di->get("curl"));
    }

    /**
     * Return json for method get
     * GET mountpoint api/json?=<location>
     * @param location
     * 
     * @return array
     */
    public function jsonActionGet() : array 
    {
        $request = $this->di->get("request");
        $weatherModel = $this->WeatherModel;

        $location = $request->getGet("location", "");
        $radio = $request->getGet("forecast", "week");
        $geo = $weatherModel->getGeo($location);
        $data = $weatherModel->getAll($radio);
        // var_dump($data);
        return [$data];
    }


    /**
     * Try to access a forbidden resource.
     * ANY mountpoint/forbidden
     *
     * @return array
     */
    public function forbiddenAction() : array
    {
        // Deal with the action and return a response.
        $json = [
            "message" => __METHOD__ . ", forbidden to access.",
        ];
        return [$json, 403];
    }

}