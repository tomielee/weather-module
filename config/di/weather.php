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
                $config = $cfg->load("weather_sample.php");
                var_dump($config);

                $dataset = $config["config"] ?? null;
                var_dump($dataset);
                if (!$dataset) {
                    throw new Exception("Configuration file '$config' is missing.");
                }
                $weatherModel->setConfig($config['config']);
                return $weatherModel;
            }
        ],
    ],
];
