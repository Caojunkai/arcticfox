<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die;
/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloWorld extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_helloworld.helloworld',
			'helloworld',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);
		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
				'com_helloworld.edit.helloworld.data', array());
		if (empty($data)) {
			$data = $this->getItem();

			return $data;
		}
	}

	public function getParameter(){
		$jinput = JFactory::getApplication()->input;
		$id = $jinput->get('id',null,'INT');
		return $id;
	}

	public function getItem($id = null){
		$id = $this->getParameter();
		if($id){
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*')
					->from($db->quoteName('#__helloworld','a'))
					->where($db->quoteName('id')."=".$db->quote($id));
			$db->setQuery($query);
			$item = $db->loadAssoc();
			if(!$item){
				$item = array('id'=>'','greeting'=>'','published'=>'');
			}
			$item =  JArrayHelper::toObject($item, 'JObject');
			return $item;
		}else{
			$item = array('id'=>'','greeting'=>'','published'=>'');
			$item = JArrayHelper::toObject($item, 'JObject');
			return $item;
		}

	}

	public function save($data){
		$id = $this->getParameter();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update($db->quoteName('#__helloworld','a'))
				->set($db->quoteName('a.greeting')."=".$db->quote($data['greeting']))
				->where($db->quoteName('a.id')."=".$db->quote($id));
		$db->setQuery($query);
		return $db->execute();
	}
	public function add($data){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$columns = array('greeting','published');
		$values = array($db->quote($data['greeting']),0);
		$query->insert($db->quoteName('#__helloworld'))
				->columns($db->quoteName($columns))
			  	->values(implode(',',$values));
		$db->setQuery($query);
		return $db->execute();
//		try{
//			$result = $db->execute();
//		}catch (ErrorException $e){
//			$e->getMessage();
//		}
	}

	public function delete(&$pks){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$conditions = $db->quoteName('id')." IN (".implode(',',$pks).")";
		$query->delete($db->quoteName('#__helloworld'))
				->where($conditions);
		$db->setQuery($query);
		return $db->execute();
	}

	public function publish(&$pks, $value = 1)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->update($db->quoteName('#__helloworld'))
			->set($db->quoteName('published')."="."ABS({$db->quoteName('published')}-1)")
			->where($db->quoteName('id')."=".$db->quote($pks[0]));
		$db->setQuery($query);
		return $db->execute();
	}

}
