<?php

namespace Anax\View;

/**
 * Template for result for for Weather-page.
 */
?>
<h1><?= $contentTitle ?> </h1>
<?php if ($error) { ?> 
    <div class="error-msg"><?= ucFirst($error) ?></div>

<?php } else { ?>
    <?php for ($i=0; $i < count($weather); $i++) {?> 
<div class="weatherbox">
    <p class="weatherbox-sum"><?= $weather[$i]['sum'] ?></p>
    <p class="weatherbox-date"><?= $weather[$i]['date'] ?> </å>
    <p class="weatherbox-degrees"><?= $weather[$i]['temp'] ?> </p>
    <p class="weatherbox-icon"><?= $weather[$i]['icon'] ?></p>
</div>
    <?php }
} ?> 
</article>
<p>
