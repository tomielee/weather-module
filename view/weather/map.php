<?php

namespace Anax\View;

/**
 * template for map
 */


?>
  <p style="display: none;" id="lat"><?= $lat ?></p>
  <p style="display: none;" id="lon"><?= $lon ?></p>

<div class="map" id="mapid" style="position: relative; height:250px"></div>
<br>
<br>
<script type="text/javascript">
    var lat = document.getElementById('lat').innerText;
    var lon = document.getElementById('lon').innerText;
    var mymap = L.map('mapid').setView([lat, lon], 13);

    L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
    }).addTo(mymap);

    var circle = L.circle([lat, lon], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);

    L.marker([lat, lon]).addTo(map)
        .bindPopup("WEATHER EXACTLY HERE")
        .openPopup();
    

</script>

