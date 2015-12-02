<?php
defined('_JEXEC') or  die;

jimport('joomla.form.formfield');
jimport( 'joomla.filesystem.folder' );
class JFormFieldChooseFiles extends JFormField{

    protected $type = 'ChooseFiles';
    public function getInput()
    {
        $allowEdit  = ((string) $this->element['edit'] == 'true') ? true : false;
        $allowClear = ((string) $this->element['clear'] != 'false') ? true : false;
        //获取xml配置的路径
        $scanPath = $this->getAttribute('path');
        $exclude = array();//过滤的文件名
        $excludeFilter = array();//生成正则表达式，过滤以上述文件名结尾的文件
        $results = array();//最终生成的数据
        $filterType = array();//option 的Type属性 判断是否包含指定文件
        //遍历option内的值和属性
        foreach ($this->element->option as $key => $value){
            $exclude[] = $value;
            $filterType[] = $value->attributes();
        }
        //生成过滤规则
        for ($i = 0;$i < count($exclude);$i++){
                if(strtolower($filterType[$i]) == 'exclude'){
                    $excludeFilter[] = '\\'.$exclude[$i].'$';
            }
        }
        $result = JFolder::files($scanPath,'.',false,false,$exclude,$excludeFilter);
        foreach ($result as $key => $value){
            $results[$key]['name'] = $value;
            $results[$key]['ext']  = JFile::getExt($value);
        }
        // Load language
        JFactory::getLanguage()->load('com_helloworld', JPATH_ADMINISTRATOR);

        // Load the javascript
        JHtml::_('bootstrap.tooltip');

        // Build the script.
        $script = array();

        // Select button script
        $script[] = '	function jSelectContact_' . $this->id . '(id, name, object) {';
        $script[] = '		document.getElementById("' . $this->id . '_id").value = id;';
        $script[] = '		document.getElementById("' . $this->id . '_name").value = name;';

        if ($allowEdit)
        {
            $script[] = '		jQuery("#' . $this->id . '_edit").removeClass("hidden");';
        }

        if ($allowClear)
        {
            $script[] = '		jQuery("#' . $this->id . '_clear").removeClass("hidden");';
        }

        $script[] = '		jQuery("#modalContact' . $this->id . '").modal("hide");';

        if ($this->required)
        {
            $script[] = '		document.formvalidator.validate(document.getElementById("' . $this->id . '_id"));';
            $script[] = '		document.formvalidator.validate(document.getElementById("' . $this->id . '_name"));';
        }

        $script[] = '	}';

        // Clear button script
        static $scriptClear;

        if ($allowClear && !$scriptClear)
        {
            $scriptClear = true;

            $script[] = '	function jClearContact(id) {';
            $script[] = '		document.getElementById(id + "_id").value = "";';
            $script[] = '		document.getElementById(id + "_name").value = "'
                . htmlspecialchars(JText::_('COM_CONTACT_SELECT_A_CONTACT', true), ENT_COMPAT, 'UTF-8') . '";';
            $script[] = '		jQuery("#"+id + "_clear").addClass("hidden");';
            $script[] = '		if (document.getElementById(id + "_edit")) {';
            $script[] = '			jQuery("#"+id + "_edit").addClass("hidden");';
            $script[] = '		}';
            $script[] = '		return false;';
            $script[] = '	}';
        }

        // Add the script to the document head.
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        // Setup variables for display.
        $html = array();

        if (empty($title))
        {
            $title = JText::_('COM_CONTACT_SELECT_A_CONTACT');
        }

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

        // The active contact id field.
        if (0 == (int) $this->value)
        {
            $value = '';
        }
        else
        {
            $value = (int) $this->value;
        }

        // The current contact display field.
        $html[] = '<span class="input-append">';

        $html[] = ' <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalChooseFiles"'.$this->id.' role="dialog" aria-labelledby="#modalChooseFiles"'.$this->id.'Label" aria-hidden="true" ><span class="icon-list"></span>'.JText::_('JESLECT').'</button> ';
        $html[] = '<div class="modal fade" id="modalChooseFiles"'.$this->id.' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" position:absolute>
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               '.JHtml::tooltipText('COM_HELLOWORLD_CHOOSEFILES_TITLE').'
            </h4>
         </div>
         <div class="modal-body">';
        $html[] = '<h6><table style="text-align: center;z-index: 99"><thead><tr><td width="10%">Name</td><td width="30%">Ext</td></tr></thead>';
        foreach ($results as $value){
            $html[] = '<tr><td>'.$value['name'].'</td><td>'.$value['ext'].'</td></tr>';
        }
        $html[] = '</table></h6>';
        $html[] = '</div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">'.'COM_HELLOWORLD_CLOSE'.'
            </button>
            <button type="button" class="btn btn-primary">
               '.'COM_HELLOWORLD_SUBMIT'.'
            </button>
         </div>
      </div>
</div>
</div>';

        $html[] = '</span>';
        return implode("\n", $html);

    }
}