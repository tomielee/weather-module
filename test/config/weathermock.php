<?php
/**
 * sample. set your
 * baseUrl
 * geoUrl
 *
 * should be http://localhost:{port}/{projectname}/htdocs/weather/mock and /geomock
 * after rsync och scaffolding in the project.
 * to run tests on local.
 *
 *
*/


return [
    "key" => "yoursecretkey",
    "baseUrl" => "http://www.student.bth.se/~jelf18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/weather/mock?",
    "exclude" => "",
    "excludeMulti" => "",
    "test" => true,
    "geoUrl" => "http://www.student.bth.se/~jelf18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/weather/geomock?"
];
