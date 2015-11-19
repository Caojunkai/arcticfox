<?php

class ModIngHelper{
    public static function getIng($params){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
                    ->select($db->quoteName('name').','.$db->quoteName('url'))
                    ->from($db->quoteName('#__ing'));
        $db->setQuery($query);
        $result = $db->loadAssocList();
        return $result;
    }
}