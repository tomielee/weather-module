<?php
/**
 * sample.
 * set your
 * baseUrl
 * geoUrl
 *
 * should be http://localhost:{port}/{projectname}/htdocs/weather/
 *
 * to run tests.
 * return [
 *    "key" => "yoursecretkey",
 *    "baseUrl" => "https://api.darksky.net/forecast/",
 *    "exclude" => "",
 *    "excludeMulti" => "",
 *    "test" => false,
 *    "geoUrl" => "https://nominatim.openstreetmap.org/?addressdetails=1&format=json&email=asdf@hotmail.se&limit=1"
 *];
*/

return [
    "key" => "yoursecretkey",
    "baseUrl" => "http://localhost:8080/me/htdocs/weather/mock",
    "exclude" => "",
    "excludeMulti" => "",
    "test" => true,
    "geoUrl" => "ttp://localhost:8080/me/htdocs/weather/geomock"
];
