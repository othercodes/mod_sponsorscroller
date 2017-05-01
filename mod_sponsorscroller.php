<?php

defined('_JEXEC') or die('Restricted access');

/**
 * @version   mod_basicmodule v2.0
 * @author    usantisteban <usantisteban@othercode.es>
 * @copyright Copyright (C) 2008 - 2015 Sayga Informatica
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
require_once(dirname(__FILE__) . '/helper.php');

$count = 0;
$sponsors = modSponsorScrollerHelper::getSponsors($params);

$instanceClass = "ss-inst-" . count($sponsors) . "-" . $params->get('type');
$time = count($sponsors) * 2;

switch ($params->get('type')) {
    case 1:
        $width = 468;
        $height = 60;
        break;
    case 2:
        $width = 150;
        $height = 80;
        break;
}

$absoluteWidth = count($sponsors) * ($width + 10);

if ($absoluteWidth === 0) {
    $displacement = 0;
} else {
    $displacement = ($absoluteWidth - 1100);
}

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'media/mod_sponsorscroller/css/sponsorscroll.min.css');

$css = "
.first-" . $instanceClass . " {
    -webkit-animation: bannermove-" . $instanceClass . " " . $time . "s linear infinite;
    -moz-animation: bannermove-" . $instanceClass . " " . $time . "s linear infinite;
    -ms-animation: bannermove-" . $instanceClass . " " . $time . "s linear infinite;
    animation: bannermove-" . $instanceClass . " " . $time . "s linear infinite;
}
@keyframes bannermove-" . $instanceClass . " {
    from {margin-left: 0;}to {margin-left: -" . $displacement . "px;}
}
@-moz-keyframes bannermove-" . $instanceClass . " {
    from {margin-left: 0;}to {margin-left: -" . $displacement . "px;}
}
@-webkit-keyframes bannermove-" . $instanceClass . " {
    from {margin-left: 0;}to {margin-left: -" . $displacement . "px;}
}
@-ms-keyframes bannermove-" . $instanceClass . " {
    from {margin-left: 0;}to {margin-left: -" . $displacement . "px;}
}";

$document->addStyleDeclaration($css);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require(JModuleHelper::getLayoutPath('mod_sponsorscroller'));