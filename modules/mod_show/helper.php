<?php

defined('_JEXEC') or die;

class ModShowHelper
{

	public static function getUrl($params)
	{
		$ids = ModShowHelper::show_get_img_arr($params);
		
		if(count($ids[1]) == 0)
		{
			return null;
		}
		
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
			$query
			->select(array('id,link'))
			->from($db->quoteName('#__menu'))
			->where($db->quoteName('id').'in('.implode(',',$ids[1]).')');
		
		try{
			$db->setQuery($query);
			
			$ret = $db->loadObjectList();
		}catch(Exception $e)
		{
			return false;
		}
			foreach($ret as $obj)
			{
			
				$data[$obj->id] = $obj->link;
			}
		
		return $data;
	}

	public static function show_get_img_arr($stdClass){
		$suffix = [];				//这里不能够不定义，因为当对象为空时在这里不定义的话，return就会返回未定义变量
		$menu_ids = [];
	   for($i=1;$i<count($stdClass);$i++){
	      $img_url = $stdClass->get('image_'.$i);     
	      if($img_url!==null){   
	      	$suffix[] = $i;
	       	$menu_ids[] = $stdClass->get('direct_'.$i);
	      }
	   } 
	   return [$suffix,$menu_ids];
	}

}