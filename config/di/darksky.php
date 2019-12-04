<?php
/**
 * Configuration file for DI container.
 */
return [
    "services" => [
        "darksky" => [
            "shared" => true,
            "active" => false,
            "callback" => function () {
                $weatherModel = new \Jenel\Weather\WeatherModel();
                
                $cfg = $this->get("configuration");
                $config = $cfg->load("api.php");
                $weatherModel->setApiKey($config['config']["darksky_key"]);
                $weatherModel->setBaseUrl($config['config']["darksky_url"]);
                return $weatherModel;
            }
        ],
    ],
];
