<?php

class ModLunboHelper{
    public static function getImg($params){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
                    ->select($db->quoteName('name').','.$db->quoteName('url'))
                    ->from($db->quoteName('#__lunbo'));
        $db->setQuery($query);
        $result = $db->loadAssocList();
        return $result;
    }
}