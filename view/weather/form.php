<?php

namespace Anax\View;

/**
 * template for form
 */


?>

<div class='form'>
    <form method='post'>
        <p> <label><?= $label?></p>
        <?php foreach ($input as $name => $value) { ?>
            <p><input row='1' columns='1' type='text' name='<?= $name ?>' value='<?= $value ?>'></p>
        <?php } ?>
        <?php foreach ($button as $name => $value) { ?>
               <button name='<?= $name ?>'> <?= $value ?> </button>

        <?php } ?>     
        </div>

