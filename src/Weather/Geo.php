<?php
namespace Jenel\Weather;

/**
 * Return content for WeatherModel.
 */

class Geo
{
    private $data;
    
    public function __construct($data)
    {
        $this->data =  $data;
    }
    
    public function getLat() : string
    {
        return $this->data[0]['lat'] ?? "Could nog get 'lat'.";
    }

    public function getLon() : string
    {
        return $this->data[0]['lon'] ?? "Could not get 'lon'.";
    }

    public function getDisplayName() : string
    {
        return $this->data[0]['display_name'] ?? "Could not get 'display_name'.";
    }
}
