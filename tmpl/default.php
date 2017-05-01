<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version   mod_basicmodule v1.0
 * @author    Sayga Informatica http://saygainformatica.com/
 * @copyright Copyright (C) 2008 - 2015 Sayga Informatica
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

?>
<div class="<?php echo $instanceClass; ?> <?php echo $moduleclass_sfx ?>">

    <div class="ss-container">
        <div class="ss-marquee" style="height:<?php echo $height; ?>px;width:<?php echo $absoluteWidth; ?>px;">
            <?php foreach ($sponsors as $sponsor) { ?>

                <?php $count++; ?>

                <div class="ss-sponsor <?php echo ($count == 1) ? "first-" . $instanceClass : false; ?>">
                    <a href="<?php echo $sponsor->url; ?>" target="_blank" rel="nofollow">
                        <img src="<?php echo $sponsor->banner ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
                    </a>
                </div>

            <?php } ?>
        </div>
    </div>
</div>