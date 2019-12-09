<?php
namespace Jenel\Mock;

class DarkSkyMock
{
    /**
     * public function that mocks nominatim.openstretmap
     * will return Dalarna as default
     */
    public function getWeather() : array
    {
        $weather = [
        "latitude" => 61.06037785,
        "longitude" => 14.2150873169591,
        "timezone" => "Europe/Stockholm MOCK",
        "currently" => [
        "time" => 1575886847,
        "summary" => "Overcast",
        "icon" => "cloudy",
        "precipIntensity" => 0.0377,
        "precipProbability" => 0.06,
        "precipType" => "snow",
        "precipAccumulation" => 0.0458,
        "temperature" => -2.92,
        "apparentTemperature" => -6.68,
        "dewPoint" => -5.08,
        "humidity" => 0.85,
        "pressure" => 982.6,
        "windSpeed" => 2.67,
        "windGust" => 6.18,
        "windBearing" => 326,
        "cloudCover" => 0.94,
        "uvIndex" => 0,
        "visibility" => 16.093,
        "ozone" => 265.1
        ],
        "daily" => [
        "summary" => "Possible light snow on Wednesday and Saturday.",
        "icon" => "snow",
        "data" => [
        [
        "time" => 1575846000,
        "summary" => "Overcast throughout the day.",
        "icon" => "cloudy",
        "sunriseTime" => 1575878640,
        "sunsetTime" => 1575899400,
        "moonPhase" => 0.42,
        "precipIntensity" => 0.0165,
        "precipIntensityMax" => 0.0799,
        "precipIntensityMaxTime" => 1575881940,
        "precipProbability" => 0.2,
        "precipType" => "snow",
        "precipAccumulation" => 0.3,
        "temperatureHigh" => 0.97,
        "temperatureHighTime" => 1575871200,
        "temperatureLow" => -6.67,
        "temperatureLowTime" => 1575961200,
        "apparentTemperatureHigh" => -2.57,
        "apparentTemperatureHighTime" => 1575871200,
        "apparentTemperatureLow" => -11.61,
        "apparentTemperatureLowTime" => 1575934080,
        "dewPoint" => -4.84,
        "humidity" => 0.83,
        "pressure" => 984.7,
        "windSpeed" => 3.28,
        "windGust" => 16.97,
        "windGustTime" => 1575846000,
        "windBearing" => 308,
        "cloudCover" => 0.88,
        "uvIndex" => 0,
        "uvIndexTime" => 1575889020,
        "visibility" => 16.093,
        "ozone" => 271.8,
        "temperatureMin" => -6.53,
        "temperatureMinTime" => 1575932400,
        "temperatureMax" => 1.48,
        "temperatureMaxTime" => 1575866220,
        "apparentTemperatureMin" => -11.6,
        "apparentTemperatureMinTime" => 1575932400,
        "apparentTemperatureMax" => -2.28,
        "apparentTemperatureMaxTime" => 1575867600
        ],
        [
        "time" => 1575932400,
        "summary" => "Windy and foggy overnight.",
        "icon" => "clear-day",
        "sunriseTime" => 1575965100,
        "sunsetTime" => 1575985740,
        "moonPhase" => 0.45,
        "precipIntensity" => 0.0167,
        "precipIntensityMax" => 0.135,
        "precipIntensityMaxTime" => 1576018800,
        "precipProbability" => 0.12,
        "precipType" => "snow",
        "precipAccumulation" => 0.5,
        "temperatureHigh" => -5.05,
        "temperatureHighTime" => 1576000800,
        "temperatureLow" => -5.6,
        "temperatureLowTime" => 1576000800,
        "apparentTemperatureHigh" => -7.17,
        "apparentTemperatureHighTime" => 1575984840,
        "apparentTemperatureLow" => -9.55,
        "apparentTemperatureLowTime" => 1576000800,
        "dewPoint" => -9.41,
        "humidity" => 0.77,
        "pressure" => 1010.3,
        "windSpeed" => 2.79,
        "windGust" => 17.09,
        "windGustTime" => 1575945840,
        "windBearing" => 250,
        "cloudCover" => 0.39,
        "uvIndex" => 0,
        "uvIndexTime" => 1575975420,
        "visibility" => 15.905,
        "ozone" => 268.5,
        "temperatureMin" => -8.23,
        "temperatureMinTime" => 1575971700,
        "temperatureMax" => -1.71,
        "temperatureMaxTime" => 1576018800,
        "apparentTemperatureMin" => -11.61,
        "apparentTemperatureMinTime" => 1575934080,
        "apparentTemperatureMax" => -7.17,
        "apparentTemperatureMaxTime" => 1575984840
        ],
        [
        "time" => 1576018800,
        "summary" => "Possible light snow and windy in the morning.",
        "icon" => "snow",
        "sunriseTime" => 1576051620,
        "sunsetTime" => 1576072140,
        "moonPhase" => 0.49,
        "precipIntensity" => 0.1774,
        "precipIntensityMax" => 0.4564,
        "precipIntensityMaxTime" => 1576052100,
        "precipProbability" => 0.59,
        "precipType" => "snow",
        "precipAccumulation" => 2.7,
        "temperatureHigh" => 3.27,
        "temperatureHighTime" => 1576065540,
        "temperatureLow" => -0.19,
        "temperatureLowTime" => 1576105440,
        "apparentTemperatureHigh" => -0.75,
        "apparentTemperatureHighTime" => 1576066080,
        "apparentTemperatureLow" => -3.17,
        "apparentTemperatureLowTime" => 1576087200,
        "dewPoint" => -1.81,
        "humidity" => 0.86,
        "pressure" => 998.2,
        "windSpeed" => 4.64,
        "windGust" => 18.35,
        "windGustTime" => 1576027680,
        "windBearing" => 182,
        "cloudCover" => 0.82,
        "uvIndex" => 0,
        "uvIndexTime" => 1576061820,
        "visibility" => 9.655,
        "ozone" => 268.7,
        "temperatureMin" => -2.26,
        "temperatureMinTime" => 1576018800,
        "temperatureMax" => 3.27,
        "temperatureMaxTime" => 1576065540,
        "apparentTemperatureMin" => -7.91,
        "apparentTemperatureMinTime" => 1576018800,
        "apparentTemperatureMax" => -0.75,
        "apparentTemperatureMaxTime" => 1576066080
        ],
        [
        "time" => 1576105200,
        "summary" => "Overcast throughout the day.",
        "icon" => "cloudy",
        "sunriseTime" => 1576138080,
        "sunsetTime" => 1576158480,
        "moonPhase" => 0.52,
        "precipIntensity" => 0.0194,
        "precipIntensityMax" => 0.0629,
        "precipIntensityMaxTime" => 1576105200,
        "precipProbability" => 0.34,
        "precipType" => "snow",
        "precipAccumulation" => 0.3,
        "temperatureHigh" => 0.89,
        "temperatureHighTime" => 1576130400,
        "temperatureLow" => -1.62,
        "temperatureLowTime" => 1576220400,
        "apparentTemperatureHigh" => -2.21,
        "apparentTemperatureHighTime" => 1576130400,
        "apparentTemperatureLow" => -5.1,
        "apparentTemperatureLowTime" => 1576217940,
        "dewPoint" => -1.62,
        "humidity" => 0.88,
        "pressure" => 997.1,
        "windSpeed" => 2.4,
        "windGust" => 9.69,
        "windGustTime" => 1576105200,
        "windBearing" => 182,
        "cloudCover" => 1,
        "uvIndex" => 0,
        "uvIndexTime" => 1576148220,
        "visibility" => 15.893,
        "ozone" => 297.8,
        "temperatureMin" => -0.93,
        "temperatureMinTime" => 1576191600,
        "temperatureMax" => 1.28,
        "temperatureMaxTime" => 1576121400,
        "apparentTemperatureMin" => -3.88,
        "apparentTemperatureMinTime" => 1576191600,
        "apparentTemperatureMax" => -1.88,
        "apparentTemperatureMaxTime" => 1576122300
        ],
        [
        "time" => 1576191600,
        "summary" => "Foggy throughout the day.",
        "icon" => "fog",
        "sunriseTime" => 1576224600,
        "sunsetTime" => 1576244880,
        "moonPhase" => 0.56,
        "precipIntensity" => 0.1112,
        "precipIntensityMax" => 0.2848,
        "precipIntensityMaxTime" => 1576259040,
        "precipProbability" => 0.31,
        "precipType" => "snow",
        "precipAccumulation" => 2.6,
        "temperatureHigh" => -1.01,
        "temperatureHighTime" => 1576216800,
        "temperatureLow" => -2.04,
        "temperatureLowTime" => 1576271160,
        "apparentTemperatureHigh" => -4.83,
        "apparentTemperatureHighTime" => 1576260000,
        "apparentTemperatureLow" => -5.91,
        "apparentTemperatureLowTime" => 1576287600,
        "dewPoint" => -3.68,
        "humidity" => 0.85,
        "pressure" => 990.4,
        "windSpeed" => 2.94,
        "windGust" => 9.19,
        "windGustTime" => 1576278000,
        "windBearing" => 120,
        "cloudCover" => 0.99,
        "uvIndex" => 0,
        "uvIndexTime" => 1576234680,
        "visibility" => 5.651,
        "ozone" => 293.4,
        "temperatureMin" => -2.32,
        "temperatureMinTime" => 1576248600,
        "temperatureMax" => -0.38,
        "temperatureMaxTime" => 1576191600,
        "apparentTemperatureMin" => -6,
        "apparentTemperatureMinTime" => 1576240080,
        "apparentTemperatureMax" => -3.88,
        "apparentTemperatureMaxTime" => 1576191600
        ],
        [
        "time" => 1576278000,
        "summary" => "Possible light snow in the afternoon.",
        "icon" => "snow",
        "sunriseTime" => 1576311060,
        "sunsetTime" => 1576331220,
        "moonPhase" => 0.59,
        "precipIntensity" => 0.2731,
        "precipIntensityMax" => 0.5003,
        "precipIntensityMaxTime" => 1576316280,
        "precipProbability" => 0.54,
        "precipType" => "snow",
        "precipAccumulation" => 6,
        "temperatureHigh" => 0.37,
        "temperatureHighTime" => 1576324740,
        "temperatureLow" => -3.38,
        "temperatureLowTime" => 1576393200,
        "apparentTemperatureHigh" => -2.36,
        "apparentTemperatureHighTime" => 1576325340,
        "apparentTemperatureLow" => -4.97,
        "apparentTemperatureLowTime" => 1576384680,
        "dewPoint" => -3.55,
        "humidity" => 0.84,
        "pressure" => 984.3,
        "windSpeed" => 2.45,
        "windGust" => 10.21,
        "windGustTime" => 1576288500,
        "windBearing" => 64,
        "cloudCover" => 0.98,
        "uvIndex" => 0,
        "uvIndexTime" => 1576321140,
        "visibility" => 0.63,
        "ozone" => 319.7,
        "temperatureMin" => -1.97,
        "temperatureMinTime" => 1576360680,
        "temperatureMax" => 0.37,
        "temperatureMaxTime" => 1576324740,
        "apparentTemperatureMin" => -5.91,
        "apparentTemperatureMinTime" => 1576287600,
        "apparentTemperatureMax" => -2.36,
        "apparentTemperatureMaxTime" => 1576325340
        ],
        [
        "time" => 1576364400,
        "summary" => "Mostly cloudy throughout the day.",
        "icon" => "fog",
        "sunriseTime" => 1576397520,
        "sunsetTime" => 1576417620,
        "moonPhase" => 0.63,
        "precipIntensity" => 0.0323,
        "precipIntensityMax" => 0.212,
        "precipIntensityMaxTime" => 1576367400,
        "precipProbability" => 0.32,
        "precipType" => "snow",
        "precipAccumulation" => 0.8,
        "temperatureHigh" => -2.73,
        "temperatureHighTime" => 1576389600,
        "temperatureLow" => -6.73,
        "temperatureLowTime" => 1576479600,
        "apparentTemperatureHigh" => -2.9,
        "apparentTemperatureHighTime" => 1576390620,
        "apparentTemperatureLow" => -9.61,
        "apparentTemperatureLowTime" => 1576479600,
        "dewPoint" => -7.67,
        "humidity" => 0.76,
        "pressure" => 989.2,
        "windSpeed" => 1.44,
        "windGust" => 2.96,
        "windGustTime" => 1576364400,
        "windBearing" => 329,
        "cloudCover" => 0.63,
        "uvIndex" => 0,
        "uvIndexTime" => 1576407540,
        "visibility" => 14.725,
        "ozone" => 323.5,
        "temperatureMin" => -6.25,
        "temperatureMinTime" => 1576448520,
        "temperatureMax" => -1.38,
        "temperatureMaxTime" => 1576364400,
        "apparentTemperatureMin" => -8.52,
        "apparentTemperatureMinTime" => 1576446060,
        "apparentTemperatureMax" => -2.9,
        "apparentTemperatureMaxTime" => 1576390620
        ],
        [
        "time" => 1576450800,
        "summary" => "Clear throughout the day.",
        "icon" => "clear-day",
        "sunriseTime" => 1576483980,
        "sunsetTime" => 1576504020,
        "moonPhase" => 0.66,
        "precipIntensity" => 0.0045,
        "precipIntensityMax" => 0.0099,
        "precipIntensityMaxTime" => 1576509420,
        "precipProbability" => 0.09,
        "precipType" => "snow",
        "precipAccumulation" => 0.2,
        "temperatureHigh" => -3.93,
        "temperatureHighTime" => 1576498500,
        "temperatureLow" => -6.02,
        "temperatureLowTime" => 1576531980,
        "apparentTemperatureHigh" => -5.52,
        "apparentTemperatureHighTime" => 1576509060,
        "apparentTemperatureLow" => -8.79,
        "apparentTemperatureLowTime" => 1576545060,
        "dewPoint" => -11.29,
        "humidity" => 0.65,
        "pressure" => 998.1,
        "windSpeed" => 1.35,
        "windGust" => 2.62,
        "windGustTime" => 1576481220,
        "windBearing" => 247,
        "cloudCover" => 0.35,
        "uvIndex" => 0,
        "uvIndexTime" => 1576493940,
        "visibility" => 16.093,
        "ozone" => 356.3,
        "temperatureMin" => -7.13,
        "temperatureMinTime" => 1576485480,
        "temperatureMax" => -3.93,
        "temperatureMaxTime" => 1576498500,
        "apparentTemperatureMin" => -9.99,
        "apparentTemperatureMinTime" => 1576485120,
        "apparentTemperatureMax" => -4.86,
        "apparentTemperatureMaxTime" => 1576464120
        ]
        ]
        ],
        "alerts" => [
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575625393,
        "expires" => 1576057508,
        "description" => "When => Night towards Saturday until Saturday afternoon. Where => The southern part Intensity => Total amount 10-15 cm of fresh snow Comment => Most intense during late night and Saturday morning.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575815108,
        "expires" => 1576247108,
        "description" => "When => Until late tonight Where => The whole area Intensity => 5-15 cm with the highest values in the northern part Comment => In the southern part, the snowfall turns into rain towards the evening whcih may freeze on on cold roads.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575712028,
        "expires" => 1576144209,
        "description" => "When => Where => Intensity => Comment =>\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575712209,
        "expires" => 1576144209,
        "description" => "When => On Saturday Where => The southern part Intensity => - Comment => Rain or snow followed by freezing.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575711290,
        "expires" => 1576143308,
        "description" => "When => From Sunday dinner snowfall and in the rest of Sunday Where => The whole area Intensity => 10-15 cm Comment =>\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575690907,
        "expires" => 1576122907,
        "description" => "When => Saturday morning Where => The southern part Intensity => - Comment => Freezing rain that can cause slippery conditions.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575745510,
        "expires" => 1576177510,
        "description" => "When => Sunday Where => The whole area Intensity => 5-15 cm with the highest values in the northern part Comment => In the southern part, the snowfall turns into rain during the evening\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575625393,
        "expires" => 1576057508,
        "description" => "When => Tonight and night towards Saturday Where => The southern part Intensity => - Comment => Freezing rain that can cause slippery conditions.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575593708,
        "expires" => 1576025708,
        "description" => "When => During night to Friday Where => In the northern part, from Siljan and north. Intensity => - Comment => Rain or snow-mixed rain on cold roads\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575571244,
        "expires" => 1576003244,
        "description" => "When => Until Friday morning Where => In the northern part, from Siljan and north. Intensity => - Comment => Rain or snow-mixed rain on cold roads\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575537378,
        "expires" => 1575969611,
        "description" => "When => From night to Friday Where => Northern parts Intensity => Comment => Rain or snow-mixed rain on cold roads\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ],
        [
        "title" => "Dalarnas Län Utom Dalafjällen",
        "regions" => [
        "Dalarna"
        ],
        "severity" => "warning",
        "time" => 1575882353,
        "expires" => 1576314611,
        "description" => "When => During the afternoon Where => In the southern part Intensity => - Comment => Rain or wet snow followed by clear sky and freezing.\n",
        "uri" => "http =>//www.smhi.se/vadret/vadret-i-sverige/Varningar"
        ]
        ],
        "offset" => 1
        ];

        $data = [
            0 => $weather
        ];
        return $data;
    }
}




// $week = [
    //    "contentTitle" => "Forecast for today and next 7 days",
    //     "weather" => [
    //         0 => [
    //             "date" => "Wed 4 Dec 2019",
    //             "sum" => "Mostly Cloudy",
    //             "temp" => -0.1000000000000000055511151231257827021181583404541015625,
    //             "icon" => "<i class=\"fas fa-cloud-sun\"></i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         1 => [
    //             "date" => "Thu 5 Dec 2019",
    //             "sum" => "Windy in the morning and afternoon.",
    //             "temp" => 2.399999999999999911182158029987476766109466552734375,
    //             "icon" => "<i class=\"fas fa-wind\"></i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         2 => [
    //             "date" => "Fri 6 Dec 2019",
    //             "sum" => "Light rain overnight.",
    //             "temp" => -0.8000000000000000444089209850062616169452667236328125,
    //             "icon" => "<i class=\"fas fa-cloud-rain\"></i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         3 => [
    //             "date" => "Sat 7 Dec 2019",
    //             "sum" => "Light snow in the morning and afternoon.",
    //             "temp" => -1.8000000000000000444089209850062616169452667236328125,
    //             "icon" => "<i class=\"fas fa-snowflake\"></i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         4 => [
    //             "date" => "Sun 8 Dec 2019",
    //             "sum" => "Clear throughout the day.",
    //             "temp" => -7,
    //             "icon" => "<i class=\"fas fa-sun\"> </i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         5 => [
    //             "date" => "Mon 9 Dec 2019",
    //             "sum" => "Overcast throughout the day.",
    //             "temp" => -9.0999999999999996447286321199499070644378662109375,
    //             "icon" => "<i class=\"fas fa-cloud\"></i>",
    //             "position" => "Europe/Stockholm"
    //         ],
    //         6 => [
    //             "date" => "Tue 10 Dec 2019",
    //             "sum" => "Clear throughout the day.",
    //             "temp" => -12.5999999999999996447286321199499070644378662109375,
    //             "icon" => "<i class=\"fas fa-sun\"> </i>",
    //             "position" => "Europe/Stockholm"
    //         ]
    //     ]
    //     ];
