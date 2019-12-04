<?php
/**
 * Configuration file for DI container.
 */
return [
    "services" => [
        "curl" => [
            "shared" => true,
            "active" => false,
            "callback" => function () {
                $curl = new \Jenel\Curl\Curl();
                return $curl;
            }
        ],
    ],
];
