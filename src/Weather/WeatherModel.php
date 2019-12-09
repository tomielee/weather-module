<?php
namespace Jenel\Weather;

function newError($status, $message)
{
    $error = [
        "status" => $status,
        "message" => $message
    ];
    return $error;
}

/**
 * Return content for weatherController
 * uses $di->get("curl")
 */

class WeatherModel
{
    private $url;
    protected $api_key;

    public function __construct()
    {
        $this->test = false;
    }

    /**
     * setup the basics
     * api-key
     * baseurl
     * test
     * url to curl one
     * urls to curl multi
     */
    public function setConfig($param) : void
    {
        foreach ($param as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * inject the weathermodel with the $di->service curls
     */
    public function setCurl($curl)
    {
        $this->curl = $curl;
    }

    /**
     * set url to fetch
     * @param lat latitude
     * @param lon longitude
     * @param test bool 
     * 
     * @return void
     */
    private function getUrl($lat, $lon) : string
    {
        if($this->test) {
            $this->url = $this->baseUrl;
        } else {
            $this->url = $this->baseUrl . $this->key . "/{$lat},{$lon}?exclude=hourly,minutely,flags&units=si"; 
        }
        return $this->url;
    }

    /**
     * return urls for multi cyrl
     *
     * @return array
     */
    private function getUrls($lat, $lon, $days) : array
    {
        if ($this->test) {
            $this->urls = [ 0 => $this->baseUrl ];

        } else {
            for ($i=0; $i < $days; $i++) {
                $date = time() - ($i * 24 * 60 * 60); // echo(date('D j M Y', $date));
                $url = $this->baseUrl . $this->key . "/{$lat},{$lon},{$date}?exclude=hourly,minutely,flags,daily&units=si";
                $urls[] = $url;
            };
            $this->urls = $urls;

        }

        return $this->urls;
    }

    /**
     * Get location
     * @param location  string of location to get geografic position from
     *
     * @return geo  array with lat and long
     */
    public function getGeo($location)
    {
        $curl = $this->curl;
        if ($this->test) {
           $url = $this->geoUrl; 
        } else {
            $url = "https://nominatim.openstreetmap.org/?addressdetails=1&q={$location}&format=json&email=asdf@hotmail.se&limit=1";
        }

        $result = $curl->curlOne($url);
        $geo = [
            "geo" => new Geo($result)
        ];
        $this->setConfig($geo);
        return $geo["geo"];
    }





    /**
     * Call for data.
     * uses $di service "curl"
     */
    public function getWeek($lat, $lon) : array
    {
        $curl = $this->curl;
        $url = $this->getUrl($lat, $lon);
        $result = $curl->curlOne($url);

        if (sizeof($result) <= 2) {
            $data = [
                "contentTitle" => "Oops...",
                "error" => $result['error'],
            ];
            return $data;
        }

        $this->Forecast = new Forecast($result);
        $week[0] = $this->Forecast->getToday();

        for ($i=1; $i < 7; $i++) {
            $week[$i] = $this->Forecast->getDay($i);
        }
        $data = [
            "contentTitle" => "Forecast for today and next 7 days",
            "result" => $week,
        ];
        return $data;
    }

    /**
     * Call for data.
     * uses $di service "curl"
     */
    public function getPast($lat, $lon) : array
    {
        $curl = $this->curl;
        $urls = $this->getUrls($lat, $lon, 30);
        $result = $curl->curlMulti($urls);

        foreach ($result as $day) {
            if (sizeof($day) <= 2) {
                $data = [
                    "contentTitle" => "Oops...",
                    "error" => $day['error'],
                ];
                return $data;
            } else {
                $this->Forecast = new Forecast($day);
                $data[] = $this->Forecast->getToday();
            }
        }

        $past = [
            "contentTitle" => "The weather today and the past 30 days",
            "today" => $data[0],
            "result" => $data
        ];
        return $past;
    }

    /**
     * Return all
     */
    public function getAll($radio) : array
    {
        if (empty($this->geo)) {
            return newError("Error", "No location provided");
        };

        $lat = $this->geo->getLat();
        $lon = $this->geo->getLon();
        if($radio == "week") {
            $forecast = $this->getWeek($lat, $lon);
        } else if ($radio == "past") {
            $forecast = $this->getPast($lat, $lon);
        } 
        $forecast['error'] = false;
        $data = [
            "title" => "Weather forecast",
            "position" => $this->geo->getDisplayName(),
            "lat" => $lat,
            "lon" => $lon,
            "result" => $forecast,
        ];

        return $data;
    }


    // /**
    //  * set the baseurl
    //  */
    // public function setTest($test)
    // {
    //     $this->test = $test;
    // }

    // /**
    //  * set the baseurl
    //  */
    // public function setBaseUrl($url)
    // {
    //     $this->baseUrl = $url;
    // }
    // /**
    //  * set the apikey
    //  */
    // public function setApiKey($key)
    // {
    //     $this->api_key = $key;
    // }
}
