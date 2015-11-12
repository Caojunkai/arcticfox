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
 * HelloWorld Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.9
 */
class HelloWorldControllerHelloWorld extends JControllerForm
{
    /**
     * @param null $key
     * @param null $urlVar
     * @return bool
     * @throws Exception
     */
    public function save($key = null, $urlVar = null){
        $app   = JFactory::getApplication();
        $model = $this->getModel();
        $id = $app->input->get('id',null,'INT');
        $cid   = $this->input->post->get('cid', array(), 'array');
        $context = "$this->option.edit.$this->context";
        if (empty($key))
        {
            $key = $id;
        }

        if (empty($urlVar))
        {
            $urlVar = $key;
        }
        $recordId = (int) (count($cid) ? $cid[0] : $this->input->getInt($urlVar));
        // Access check
        if (!$this->allowEdit(array($key => $recordId), $key))
        {
            $this->setError(JText::_('JLIB_APPLICATION_ERROR_EDIT_NOT_PERMITTED'));
            $this->setMessage($this->getError(), 'error');

            $this->setRedirect(
                JRoute::_(
                    'index.php?option=' . $this->option . '&view=' . $this->view_list
                    . $this->getRedirectToListAppend(), false
                )
            );

            return false;
        }
        $data = $this->input->post->get('jform',array(),'array');
//        if(!$data['greeting']){
//            var_dump($data['greeting']);
//        }   die;
        if($id ){
            $result = $model->save($data);
        }else{
            $result = $model->add($data);
        }
        if($result){
            $this->setRedirect(
                'index.php?option=' . $this->option . '&view=' . $this->view_list
                . $this->getRedirectToListAppend(), false);
        }else{
            $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()));
            $this->setMessage($this->getError(), 'error');
            $this->setRedirect(
                JRoute::_(
                    'index.php?option=' . $this->option . '&view=' . $this->view_item
                    . $this->getRedirectToItemAppend($recordId, $urlVar), false
                )
            );

            return false;
        }
    }

    /**
     * @param null $key
     * @param null $urlVar
     */
    public function edit($key = null, $urlVar = null)
    {
        $cid = $this->input->post->get('cid',array(),'array');
        if(empty($key))
            $key = 'id';
        if(empty($urlVar))
            $urlVar = $key;
        $recordId = (int) (count($cid) ? $cid[0] : $this->input->getInt($urlVar));
        $this->setRedirect(
                JRoute::_('index.php?option='.$this->option.'&view='.$this->view_item.
                    $this->getRedirectToItemAppend($recordId,$urlVar),false)
            );
//       parent::edit('id');
    }


    /**
     * @param null $key
     */
    public function cancel($key = null)
    {
        $this->setRedirect(
            JRoute::_(
                'index.php?option=' . $this->option . '&view=' . $this->view_list, false
            )
        );
    }

}
