<?php
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$this->language = $doc->language;
$this->direation = $doc->direction;

// 从模板获取配置参数
$params = $app->getTemplate(true)->params;

// 检测动态变量
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
    $fullWidth = 1;
}
else
{
    $fullWidth = 0;
}

// 加载bootstrap JS
JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// 加载模板css
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// 加载bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:jdoc="http://www.w3.org/1999/XSL/Transform"
      xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"
      dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <jdoc:include type="head" />
    <?php // 如果有GoogleFont参数 则调用 ?>
    <?php if ($this->params->get('googleFont')) : ?>
    <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
    <style type="text/css">
        h1,h2,h3,h4,h5,h6,.site-title{
            font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
        }
    </style>
    <?php endif ?>
    <?php // 模板颜色 ?>
    <?php if ($this->params->get('templateColor')) : ?>

    <?php endif ?>
</head>
<body class="site">
    <div class="row">
        <div class="span12">
            <jdoc:include type="modules" name="position-1" style="none" />
        </div>
    </div>
    <div class="row">
        <div class="span4">
            <jdoc:include type="modules" name="position-2" style="none" />
            <jdoc:include type="modules" name="position-3" style="none" />
            <jdoc:include type="modules" name="position-4" style="none" />

        </div>
        <div class="span8">
            <jdoc:include type="component" name="position-5" style="none" />
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <jdoc:include type="modules" name="footer" style="none" />
        </div>
    </div>
</body>
</html>