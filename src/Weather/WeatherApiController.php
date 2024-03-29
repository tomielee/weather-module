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


    /** Declare variables */
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
     * GET mountpoint /json?=<location>
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
        
        if (empty($location)) {
            $data = [
                "message" => "No location provided. Please try again."
            ];
            return [$data, 400];
        } else {
            $data = $weatherModel->getAll($radio);
        }

        return [$data, 200];
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
