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
                $config = $cfg->load("weathermock.php");

                $dataset = $config["config"] ?? null;
                if (!$dataset) {
                    throw new Exception("Configuration file '$config' is missing.");
                }
                $weatherModel->setConfig($config['config']);
                return $weatherModel;
            }
        ],
    ],
];
