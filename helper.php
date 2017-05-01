<?php defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * @version   mod_basicmodule v1.0
 * @author    Sayga Informatica http://saygainformatica.com/
 * @copyright Copyright (C) 2008 - 2015 Sayga Informatica
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class modSponsorScrollerHelper {

    public static function getSponsors($params) {

        $option = array();

        $option['driver']   = $params->get('dbtype');
        $option['host']     = $params->get('host');
        $option['user']     = $params->get('user');
        $option['password'] = $params->get('password');
        $option['database'] = $params->get('database');

        $type = $params->get('type');
        $fido = $params->get('fido');

        $db = JDatabaseDriver::getInstance($option);
        $query = $db->getQuery(true);

        $query->select('alias, nombre, url, banner'.$type.' AS banner');
        $query->from($db->quoteName('patrocinadores'));
        $query->where($db->quoteName('activeb'.$type) . ' = 1');

        if($fido == 1){
            $query->where($db->quoteName('fido') . ' = 1');
        }

        $query->order('rand()');

        $db->setQuery($query);
        $result = $db->loadObjectList();

        return $result;

    }
}
?>