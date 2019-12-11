<?php
namespace Jenel\Mock;

class GeoMock
{
    /**
     * public function that mocks nominatim.openstretmap
     * will return Dalarna as default
     */
    public function getGeo() : array
    {
        $data = array();
        
        $data[0] = [
            0 => [
            'lat' => 61.06037785,
            'lon' => 14.2150873169591,
            'display_name' => "Dalarna with a mock!"
            ]
        ];
        return $data;
    }
}
