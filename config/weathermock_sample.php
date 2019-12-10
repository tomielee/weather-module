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
    "baseUrl" => "http://www.student.bth.se/~jelf18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/weather/mock?",
    "exclude" => "",
    "excludeMulti" => "",
    "test" => true,
    "geoUrl" => "http://www.student.bth.se/~jelf18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/weather/geomock?"
];
