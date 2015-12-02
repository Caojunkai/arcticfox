<?php
defined('_JEXEC') or die;
jimport('joomla.form.formfield');

class JFormFieldModal_Book extends JFormField
{
    protected $type = 'Modal_Book';

    protected function getInput()
    {
        JHtml::_('behavior.modal', 'a.modal');

        // Build the script
        $script = array();
        $script[] = '    function jSelectBook_' . $this->id . '(id, title, object) {';
        $script[] = '        document.id("' . $this->id . '_id").value = id;';
        $script[] = '        document.id("' . $this->id . '_name").value = title;';
        $script[] = '        SqueezeBox.close();';
        $script[] = '    }';

        // Add to document head
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        // Setup variables for display
        $html = array();
        $link = 'index.php?option=com_wing&amp;view=books&amp;layout=modal' .
            '&amp;tmpl=component&amp;function=jSelectBook_' . $this->id;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('name');
        $query->from('#__helloworld');
        $query->where('id=' . (int)$this->value);
        $db->setQuery($query);
        if (!$title = $db->loadResult()) {
            JError::raiseWarning(500, $db->getErrorMsg());
        }
        if (empty($title)) {
            $title = JText::_('COM_LIBRARY_FIELD_SELECT_BOOK');
        }
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

        // The current book input field
        $html[] = '<div class="fltlft">';
        $html[] = '  <input type="text" id="' . $this->id . '_name" value="' . $title . '" disabled="disabled" size="35" />';
        $html[] = '</div>';

        // The book select button
        $html[] = '<div class="button2-left">';
        $html[] = '  <div class="blank">';
        $html[] = '    <a class="modal" title="' . JText::_('COM_LIBRARY_SELECT_BOOK_TITLE') . '" href="' . $link .
            '" rel="{handler: \'iframe\', size: {x:800, y:450}}">' .
            JText::_('COM_LIBRARY_BUTTON_SELECT_BOOK') . '</a>';
        $html[] = '  </div>';
        $html[] = '</div>';

        // The active book id field
        if (0 == (int)$this->value) {
            $value = '';
        } else {
            $value = (int)$this->value;
        }

        // class='required' for client side validation
        $class = '';
        if ($this->required) {
            $class = ' class="required modal-value"';
        }

        $html[] = '<input type="hidden" id="' . $this->id . '_id"' . $class . ' name="' . $this->name . '" value="' . $value . '" />';

        return implode("\n", $html);
    }
}
