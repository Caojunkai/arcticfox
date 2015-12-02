<?php
defined('_JEXEC') or die;

class WingViewBooks extends JViewLegacy{
    public function display($tpl = null)
    {
        // Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');
        $state = $this->get('State');

        // Check for errors
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }

        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;
        $this->state = $state;

        // Only set the toolbar if not modal
        if ($this->getLayout() !== 'modal') {
            $this->addToolBar();
        }

        // Display the template
        parent::display($tpl);

        // Set the document
//        $this->setDocument();
    }
}