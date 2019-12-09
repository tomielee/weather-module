<?php

namespace Jenel\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * WeatherController
 * get weather forecast from location.
 * 
 * uses $di "darksky" -> WeatherModel
 * uses $di "curl -> curl functions
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * Initlize the object
     *
     * @return void
     */
    public function initialize() : void
    {
        $this->WeatherModel = $this->di->get("darksky");

        //inject the model with $di service
        $this->WeatherModel->setCurl($this->di->get("curl"));
    }
 
    /**
     * Route for index of WeatherController
     * GET
     * mountpoint weather/
     * mountpoint weather/index
     *
     * @return object   webpage with start content.
     */
    public function indexActionGet() : object
    {
        $title = "Weather";
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $error = $request->getGet("error");

        $data = [
            "title" => $title,
            "content" => "",
            "position" => ""
        ];
        
        $page->add("weather/index", $data);
        if ($error) {
            $page->add("weather/error", ["error" => "No valid geografic position. Try again."]);
            $error = $request->setGet("error", false);
        };
        $page->add("weather/form", []);
        return $page->render(["title" => $title]);
    }

   /**
    * Route for index
    * POST
    */
    public function indexActionPost() : object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");

        $weatherModel = $this->WeatherModel;
        $location = $request->getPost("location");
        $geo = $weatherModel->getGeo($location);

        if (empty($location) || empty($geo)) {
            $response = $this->di->get("response");
            return $response->redirect("weather/?error=true");
        }

        $radio = $request->getPost("radio");
        $data = $weatherModel->getAll($radio);
    
        $page->add("weather/index", $data);
        $page->add("weather/header", []);
        $page->add("weather/map", ["lat" =>$data['lat'], "lon" => $data['lon']]);
        $page->add("weather/result", $data['result']);
        return $page->render($data);
    }

    /**
    * Route for api
    * mountpoint /api
    */
    public function apiActionGet() : object
    {
        $baseURL = $this->di->get("request")->getBaseUrl();

        $data = [
            "title" => "API"
        ];

        $this->di->get("page")->add("weather/api", $data);
        return $this->di->get("page")->render($data);
    }
}
