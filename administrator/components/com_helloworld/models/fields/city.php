<?php
defined('_JEXEC') or  die;

jimport('joomla.form.formfield');

class JFormFieldCity extends JFormField{
    protected $type = 'City';
    public function getInput()
    {
        // TODO: Implement getInput() method
        $script = 'jQuery("#show-list").bind("click",function(){
		jQuery("#show-list-box").css({"display":"block"});
		});';
        $style = '#show-list-box{display:none;
		position: absolute;
		border: solid red 1px;
		top: 0;
		width: 800px;
		height: 900px;
		z-index: 100;}';
        $document = JFactory::getDocument();
        $document->addStyleDeclaration($style);
        $document->addScriptDeclaration($script);
        $html = '<button type="button" id="show-list" class="btn btn-primary"><span class="icon-list"></span>选择</button><div id="show-list-box"></div>';
        return $html;
    }
}