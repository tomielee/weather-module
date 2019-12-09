<?php
/**
 * Load the ip controller
 */
return [
    "mount" => "weather",
    "routes" => [
        [
            "info" => "Get weather forecast from server.",
            "path" => "json",
            "handler" => "\Jenel\Weather\WeatherApiController",
        ],
        [
            "info" => "Mock forecast for tests.",
            "path" => "mock",
            "handler" => ["\Jenel\Mock\DarkSkyMock", "getWeather"],
        ],
        [
            "info" => "Mock geolocation for tests.",
            "path" => "geomock",
            "handler" => ["\Jenel\Mock\GeoMock", "getGeo"],
        ],
        [
            "info" => "Get your weather",
            "handler" => "\Jenel\Weather\WeatherController",
        ],
    ]
];
