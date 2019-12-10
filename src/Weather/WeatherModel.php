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
    /** declare variables */
    private $Forecast;
    private $curl;
    private $baseUrl;
    private $exclude;
    private $excpludeMulti;
    private $test;
    private $url;
    private $urls;
    protected $key;

    public function __construct()
    {
        $this->test = false;
    }

    /**
     * setup the basics: key, baseUrl, test, url to curl one, urls to curl multi
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
     *
     * @var lat latitude
     * @var lon longitude
     *
     * @return void
     */
    private function getUrl($lat, $lon) : string
    {
        if ($this->test) {
            $this->url = $this->baseUrl;
        } else {
            $this->url = $this->baseUrl . $this->key . "/{$lat},{$lon}" . $this->exclude;
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
                $url = $this->baseUrl . $this->key . "/{$lat},{$lon},{$date}" . $this->excludeMulti;
                $urls[] = $url;
            };
            $this->urls = $urls;
        }

        return $this->urls;
    }

    /**
     * Return latitude and longitude from a location string.
     * @var location  string of location to get geografic position from
     *
     * @return geo  array with lat and long
     */
    public function getGeo($location)
    {
        $curl = $this->curl;
        if ($this->test) {
            $url = $this->geoUrl;
        } else {
            $url = $this->geoUrl . "&q={$location}";
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
        $week;

        if (array_key_exists('error', $result)) {
            $data = [
                "contentTitle" => "Oops...",
                "result" => $result
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

        $multiresult = $curl->curlMulti($urls);

        foreach ($multiresult as $result) {
            if (array_key_exists('error', $result)) {
                $data = [
                    "contentTitle" => "Oops...",
                    "result" => $result
                ];
                return $data;
            } else {
                $this->Forecast = new Forecast($result);
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
        if ($radio == "week") {
            $forecast = $this->getWeek($lat, $lon);
        } else if ($radio == "past") {
            $forecast = $this->getPast($lat, $lon);
        }
        $data = [
            "title" => "Weather forecast",
            "position" => $this->geo->getDisplayName(),
            "lat" => $lat,
            "lon" => $lon,
            "result" => $forecast,
        ];

        return $data;
    }
}
