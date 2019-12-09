<?php
/**
 * Configuration file for DI container.
 */
return [
    "services" => [
        "weather" => [
            "shared" => true,
            "active" => false,
            "callback" => function () {
                $weatherModel = new \Jenel\Weather\WeatherModel();
                
                $cfg = $this->get("configuration");
                $config = $cfg->load("weather.php");
                $weatherModel->setConfig($config['config']);
                return $weatherModel;
            }
        ],
    ],
];
