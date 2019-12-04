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

    /**
     * set the baseurl
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }
    /**
     * set the apikey
     */
    public function setApiKey($key)
    {
        $this->api_key = $key;
    }
    /**
     * inject the weathermodel with the $di->service curls
     */
    public function setCurl($curl)
    {
        $this->curl = $curl;
    }

    /**
     * Return form data.
     * @return array
     */
    public function getFormData() : array
    {
        $data = [
            "label" => "Enter location, an address, or a city.",
            "input" => [
                "location" => "",
            ],
            "button" => [
                "getWeather" => "go",
            ]
            ];
        return $data;
    }
    /**
     * return url to fetch
     * @param params    arrays with geografic location (lat and long)
     *
     * @return string
     */
    private function getUrl($lat, $lon) : string
    {
        $url = $this->baseUrl;
        $url .= $this->api_key;
        $url .= "/{$lat},{$lon}";
        $url .= "?exclude=hourly,minutely,flags";
        $url .= "&units=si";
        return $url;
    }

    /**
     * return urls for multi cyrl
     *
     * @return array
     */
    private function getUrls($lat, $lon, $days) : array
    {
        $days = 1; //@TODO REMOVE!!!
        for ($i=0; $i < $days; $i++) {
            $url = $this->baseUrl;
            $url .= $this->api_key;
            $date = time() - ($i * 24 * 60 * 60);
            // echo(date('D j M Y', $date));
            $url .="/{$lat},{$lon},{$date}";
            $url .= "?exclude=hourly,minutely,flags,daily";
            $url .= "&units=si";
            $urls[] = $url;
        };
        return $urls;
    }

    /**
     * Get location
     * @param location  string of location to get geografic position from
     *
     * @return geo  array with lat and long
     */
    public function getGeo($location)
    {
        // $curl = $this->di->get("curl");
        $curl = $this->curl;

        $url = "https://nominatim.openstreetmap.org/?addressdetails=1&q={$location}&format=json&email=asdf@hotmail.se&limit=1";
        $geo = $curl->curlOne($url);
        return $geo;
    }


    /**
     * Return latitude
     * @param geo array holding info
     *
     * @return lat string
     */
    public function getLat($geo) : string
    {
        return $geo[0]['lat'];
    }

    /**
     * Return longitude
     * @param geo array holding info
     *
     * @return lat string
     */
    public function getLon($geo) : string
    {
        return $geo[0]['lon'];
    }

    /**
     * Return displayName
     * @param geo array holding info
     *
     * @return lat string
     */
    public function getDisplayName($geo) : string
    {
        return $geo[0]['display_name'];
    }


    /**
     * Call for data.
     * uses $di service "curl"
     */
    public function getWeek($lat, $lon) : array
    {
        $curl = $this->curl;
        $url = $this->getUrl($lat, $lon);
        $weather = $curl->curlOne($url);

        if (sizeof($weather)<= 2) {
            $data = [
                "contentTitle" => "Oops...",
                "error" => $weather['error'],
            ];
            return $data;
        }

        $this->Forecast = new Forecast($weather);
        $week[0] = $this->Forecast->getToday();

        for ($i=1; $i < 7; $i++) {
            $week[$i] = $this->Forecast->getDay($i);
        }
        $data = [
            "contentTitle" => "Forecast for today and next 7 days",
            "weather" => $week,
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
        // $curl = $this->di->get("curl");
        $urls = $this->getUrls($lat, $lon, 30);
        $forecast = $curl->curlMulti($urls);

        foreach ($forecast as $day) {
            if (sizeof($day) <= 2) {
                $data = [
                    "contentTitle" => "Oops...",
                    "error" => $day['error'],
                ];
                return $data;
            } else {
                $this->Forecast = new Forecast($day);
                $weather[] = $this->Forecast->getToday();
            }
        }

        $data = [
            "contentTitle" => "The weather today and the past 30 days",
            "today" => $weather[0],
            "weather" => $weather,
        ];
        return $data;
    }

    /**
     * Return all
     */
    public function getAll($geo) : array
    {
        if (empty($geo)) {
            return newError("Error", "No location provided");
        };

        $error = false;
        $lat = $this->getLat($geo);
        $lon = $this->getLon($geo);
        $position = $this->getDisplayName($geo);

        $week = $this->getWeek($lat, $lon);
        $past = $this->getPast($lat, $lon);
        $week['error'] = $error;
        $past['error'] = $error;
        $data = [
            "title" => "Weather forecast",
            "position" => $position,
            "lat" => $lat,
            "lon" => $lon,
            "week" => $week,
            "past" => $past,
        ];

        return $data;
    }
}
