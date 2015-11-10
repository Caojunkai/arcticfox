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
    public function save($key = null, $urlVar = null){
//        var_dump($this->input->post->get('jform', array(), 'array'));die;
        $data = $this->input->post->get('jform',array(),'array');

        $model = $this->getModel();
        $result = $model->save($data['id'],$data['greeting']);
        if($result){
            $this->setRedirect(
                JRoute::_('index.php?option=com_helloworld&view=helloworld&layout=edit&id=4'),false
            );
        }
    }
    public function edit($key = 'id', $urlVar = null)
    {
         parent::edit($key, $urlVar);
    }


    public function cancel($key = null)
    {
        parent::cancel();
    }

}
