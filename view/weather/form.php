<?php

namespace Anax\View;

/**
 * template for form
 */


?>
<div class='form'>
    <form method='post'>
        <p> <label>Enter a location, an adress och a city.</p>
        <p><input row='1' columns='1' type='text' name='location' value=''></p>
        
<label class="container">Forecast next week
  <input type="radio" checked="checked" name="radio" value="week">
  <span class="checkmark"></span>

<label class="container">Weather previous month
  <input type="radio" name="radio" value="past">
  <span class="checkmark"></span>
</label>
</label>        <button name='getWeather'> GO </button>
</div>
