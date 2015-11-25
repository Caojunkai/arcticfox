<?php
defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');
class HelloWorldModelScandir extends JModelAdmin{

   public function getForm($data = array(), $loadData = true)
   {
       $form = $this->loadForm('com_helloworld.scandir', 'scandir',
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
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_helloworld.edit.scandir.data', array());
        if (empty($data)) {
            $data = $this->getItem();

            return $data;
        }
    }
    public function getItem($pk = null)
    {
        $searchpath = JPATH_ROOT.DIRECTORY_SEPARATOR."media".DIRECTORY_SEPARATOR."jui";
        $item = JFolder::listFolderTree($searchpath,"",3,0,0);
        return $item;

    }
}