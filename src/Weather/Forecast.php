<?php
namespace Jenel\Weather;

/**
 * Return content for WeatherModel.
 */

class Forecast
{
    /**
     * variables
     */
    private $data;

    public function __construct($data)
    {
        $this->data =  $data;
        // var_dump($data);
    }
    /**
     * Return a HTML icon
     * @param string    icon name
     *
     * @return string   HTML compatible string
     */
    public function getIcon($icon) : string
    {
        $res = [
            "clear-day" => '<i class="fas fa-sun"> </i>',
            "clear-night" => '<i class="fas fa-moon"></i>',
            "rain" => '<i class="fas fa-cloud-rain"></i>',
            "snow" => '<i class="fas fa-snowflake"></i>',
            "sleet" => '<i class="fas fa-frown-open"></i>',
            "wind" => '<i class="fas fa-wind"></i>',
            "fog" => '<i class="fas fa-smog"></i>',
            "cloudy" => '<i class="fas fa-cloud"></i>',
            "partly-cloudy-day" => '<i class="fas fa-cloud-sun"></i>',
            "partly-cloudy-night" => '<i class="fas fa-cloud-moon"></i>',
        ];

        
        return $res[$icon] ?? '<i class="fas fa-user-astronaut"></i>';
    }

    /**
     * return an array with:
     * date of the forecast
     * summary for the day
     * temperature for the day
     * icon
     */
    public function getDay($index)
    {
        $tempMin = $this->data['daily']['data'][$index]['temperatureMin'];
        $tempMax = $this->data['daily']['data'][$index]['temperatureMax'];
        $temp = $tempMin + $tempMax / 2;
        $day = [
            "date" => date('D j M Y', intVal($this->data['daily']['data'][$index]['time'])),
            "sum" =>$this->data['daily']['data'][$index]['summary'],
            "temp" => round($temp, 1),
            "icon" => $this->getIcon($this->data['daily']['data'][$index]['icon']),
            "position" => $this->data['timezone']
        ];

        return $day;
    }

    /**
     * return current day forecast
     *
     * date of today
     * summary for the day
     * temperature right now
     * icon
     */
    public function getToday()
    {
        
        $today = [
            "date" => date('D j M Y', intVal($this->data['currently']['time'])),
            "sum" => $this->data['currently']['summary'],
            "temp" => round($this->data['currently']['temperature'], 1),
            "icon" => $this->getIcon($this->data['currently']['icon']),
            "position" => $this->data['timezone']

        ];

        return $today;
    }
}
