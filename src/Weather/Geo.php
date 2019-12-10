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
        return $this->data[0]['lat'];
    }

    public function getLon() : string
    {
        return $this->data[0]['lon'];
    }

    public function getDisplayName() : string
    {
        return $this->data[0]['display_name'];
    }
}
