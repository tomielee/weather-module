<?php

namespace Anax\View;

/**
 * Template for result for api weather
 */
?>

<h1><?= $title ?></h1>
You can get weather forecast from a specific location.

<h2>Info </h2>
<p>Return weather for a specific location.</p>
<p>The <code>location</code> uses <a href="https://nominatim.openstreetmap.org/"> nominatim at OpenStreetMap</a> to get a geografic position.
Weather is fetchs via <a href="https://darksky.net/dev">Dark sky Api </a><div class="">
<h2>Endpoints </h2>
<code>GET json?location=[location]&forecast=[forecast]</code>
<p><b>location</b> is your choice of location, should be a string.</p>
<p><b>forecast</b> is either week or past. Default is week.</p>
<h2>Results </h2>
Example result for
<code>json?location=dalarna</code>
<pre><code>{
    "title": "Weather forecast",
    "position": "Dalarnas l\u00e4n, Svealand, Sverige",
    "lat": "61.06037785",
    "lon": "14.2150873169591",
    "week": {
        "contentTitle": "Forecast for today and next 7 days",
        "weather": [
            {
                "date": "Thu 28 Nov 2019",
                "sum": "Overcast",
                "temp": -2.9,
                "icon": "<i class=\"fas fa-cloud\"></i>",
                "position": "Europe/Stockholm"
            },
            {
                [...]
            },
            {
                "date": "Wed 4 Dec 2019",
                "sum": "Overcast throughout the day.",
                "temp": -1.5,
                "icon": "<i class=\"fas fa-cloud\"></i>",
                "position": "Europe/Stockholm"
            }
        ],
        "error": false
    }
}
</code>
</pre>
Example result for
<code>json?location=dalarna&forecast="past</code>
<pre><code>{
    "title": "Weather forecast",
    "position": "Dalarnas l\u00e4n, Svealand, Sverige",
    "lat": "61.06037785",
    "lon": "14.2150873169591",
    "past": {
        "contentTitle": "The weather today and the past 30 days",
        "today": {
            "date": "Thu 28 Nov 2019",
            "sum": "Overcast",
            "temp": -2.9,
            "icon": "<i class=\"fas fa-cloud\"></i>",
            "position": "Europe/Stockholm"
        },
        "weather": [
            {
                "date": "Thu 28 Nov 2019",
                "sum": "Overcast",
                "temp": -2.9,
                "icon": "<i class=\"fas fa-cloud\"></i>",
                "position": "Europe/Stockholm"
            },
            {
                [...]
            },
            {
                "date": "Wed 30 Oct 2019",
                "sum": "Mostly Cloudy",
                "temp": 3,
                "icon": "<i class=\"fas fa-cloud-sun\"></i>",
                "position": "Europe/Stockholm"
            }
        ],
        "error": false
    }
}
</code>
</pre>
<h2>Results with error</h2>
Example with error for
<code>json?location=dalarna</code>
<pre>
<code>{
  'title' : string 'Weather forecast' 
  'position' : string 'Dalarnas län, Svealand, Sverige' 
  'lat' : string '61.06037785' 
  'lon' : string '14.2150873169591' 
  'week' : 
      'contentTitle' : string 'Oops...' 
      'error' : string 'daily usage limit exceeded' 

  'past' : 
      'contentTitle' : string 'Oops...' 
      'error' : string 'daily usage limit exceeded' 
    }</code>
</pre>

</div>

<h2>Examples </h2>
<ul>
    <li>With location dalarna default forecast a week: <a href=<?= url("weather/json?location=dalarna")?>>json?location=dalarna</a></li>
    <li>With location x forecast past: <a href=<?=url("weather/json?location=x&forecast=past")?>> json?location=x&forecast=past </a> </li>
</ul>