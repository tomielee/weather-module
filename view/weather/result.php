<?php

namespace Anax\View;

/**
 * Template for result for for Weather-page.
 */
?>
<h1><?= $contentTitle ?> </h1>
<?php if ($error) { ?> 
    <div class="error-msg"><?= ucFirst($error) ?></div>

<?php } 
    else { ?>
    <?php for ($i=0; $i < count($result); $i++) {?> 
<div class="weatherbox">
    <p class="weatherbox-sum"><?= $result[$i]['sum'] ?></p>
    <p class="weatherbox-date"><?= $result[$i]['date'] ?> </å>
    <p class="weatherbox-degrees"><?= $result[$i]['temp'] ?> </p>
    <p class="weatherbox-icon"><?= $result[$i]['icon'] ?></p>
</div>
    <?php }
} ?> 
</article>
<p>
