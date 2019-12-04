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
            "info" => "Get your weather",
            "handler" => "\Jenel\Weather\WeatherController",
        ],
    ]
];
