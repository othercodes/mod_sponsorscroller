<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version   mod_basicmodule v1.0
 * @author    usantisteban <usantisteban@othercode.es>
 * @copyright Copyright (C) 2008 - 2015 Sayga Informatica
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * @since 2.0
 */
class modSponsorScrollerHelper
{
    public static function getSponsors($params)
    {
        $type = $params->get('type');
        $fido = $params->get('fido');

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('alias, name, url, banner' . $type . ' AS banner');
        $query->from($db->quoteName('#__sponsors_profile'));
        $query->where($db->quoteName('state') . '= 1');

        if ($fido == 1) {
            $query->where($db->quoteName('fido') . ' = 1');
        }

        $query->order('rand()');

        $db->setQuery($query);
        $result = $db->loadObjectList();

        return $result;
    }
}