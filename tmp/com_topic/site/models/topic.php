<?php
defined('_JEXEC') or die;

class TopicModelTopic extends JModelItem{
    /**
     * @var array messages
     */
    protected $messages;
    /**
     * get a table object   laod it if necessary
     * @param string $type The table name. Optional
     * @param string $prefix The class prefix. Optional
     * @param array $config Configuration array for model. Optional
     * @return JTable  A JTable object
     */
    function getTable($type = 'Topic',$prefix = 'TopicTable',$config = array()){
            return JTable::getInstance($type,$prefix,$config);
    }
    /**
     * Get the message
     *
     * @param   integer  $id  Greeting Id
     *
     * @return  string        Fetched String from Table for relevant Id
     */
    function getMsg($id = 1){
        if(!is_array($this->messages)){
            $this->messages = array();
        }
        if(!isset($this->messages[$id])){
            // Request the selected id
            $jinput = JFactory::getApplication()->input;
            $id = $jinput->get('id',1,'INT');
            // Get a TableTopic instance
            $table = $this->getTable();
            // Load the message
            $table->load($id);
            // Assign the message
            $this->messages[$id] = $table->greeting;
        }
        return $this->messages[$id];
    }
}