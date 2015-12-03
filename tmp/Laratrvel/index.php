<?php
defined('_JEXEC') or die;
$app 		= JFactory::getApplication();
$doc 		= JFactory::getDocument();
$user 		= JFactory::getUser();
$this->language = $doc->language;
$this->direation = $doc->direction;

// 从模板获取配置参数
$params 	= 	$app->getTemplate(TRUE)->params;

// 检测动态变量
$option 	= 	$app->input->getCmd('option', '');
$view 		= 	$app->input->getCmd('view', '');
$layout 	= 	$app->input->getCmd('layout', '');
$task 		= 	$app->input->getCmd('task', '');
$itemid 	= 	$app->input->getCmd('Itemid', '');
$sitename 	= 	$app->get('sitename');
$menuSite	=	$params->get('nav-menu');
$menuResult	=	array();//菜单列表
$menu		=	$app->getMenu()->getItems('menutype',$menuSite);
//生成菜单列表数组
if (isset($menu) && !empty($menu)){
	foreach ($menu as $key => $value){
		$menuResult[$key]['title'] = $value->title;
		if($value->alias != $value->route){
			$a = explode('/',$value->route,2);
			$menuResult[$key]['route'] = $a[0];
		}
	}
}
var_dump($menuResult);die;
if ($task == "edit" || $layout == "form") {
	$fullWidth = 1;
} else {
	$fullWidth = 0;
}

// 加载bootstrap 框架
JHtml::_('bootstrap.framework');
//加载模板JS
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// 加载模板css bootstrap css
$doc->addStyleSheet('http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');


JHtml::_('bootstrap.loadCss', FALSE, $this->direction);


// 加载网站标题,LOGO文件
if ($this->params->get('logoFile')) {
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('sitetitle')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:jdoc="http://www.w3.org/1999/XSL/Transform"
	  xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>"
	  dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<jdoc:include type="head"/>
	<?php // 如果有GoogleFont参数 则调用 ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>'
			  rel='stylesheet' type='text/css'/>
		<style type="text/css">
			h1, h2, h3, h4, h5, h6, .site-title {
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif ?>
	<?php // 模板颜色 ?>
	<?php if ($this->params->get('templateColor')) : ?>
		<style type="text/css">
			body.site {
				border-top: 3px solid <?php echo $this->params->get('templateColor'); ?>;
				background-color: <?php echo $this->params->get('templateBackgroundColor');?>
			}

			a {
				color: <?php echo $this->params->get('templateColor'); ?>;
			}

			.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .btn-primary {
				background: <?php echo $this->params->get('templateColor'); ?>;
			}

			.navbar-inner {
				-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
				-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
				box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			}
		</style>
	<?php endif ?>
	<!--    浏览器兼容-->
	<!--[if lt IE 9]>
	<script src="<?php echo JUri::root(TRUE); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>
<!--body布局-->
<body class="site">
<div class="body">
	<div class="container<?php echo($params->get('fluidContainer') ? '' : '-fluid'); ?>">
<!--		顶层-->
		<div class="row top-floor">
			<jdoc:include type="modules" name="top" style="none" />
			<h1>sadsadsadadasd</h1>
		</div>
<!--		搜索框-->
		<div class="row search-floor">
			<jdoc:include type="modules" name="position-1" style="none" />
		</div>
<!--导航栏-->
		<div class="row">
			<!--开始 navbar-->
			<div class="navbar " role="navigation" id="menu-nav">
				<nav class="navbar navbar-default navbar-inverse " role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
									data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo $this->baseurl; ?>/"><?php echo $sitename ?></a>
						</div>
						<div>
							<jdoc:include type="modules" name="position-30" style="none"/>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse navbar-right" id="navbar-select">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">综述</a></li>
								<li><a href="#summary-container">简述</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-left">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">特点<span
											class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#tab-chrome" data-tab="tab-chrome">Chrome</a></li>
										<li><a href="#tab-firefox" data-tab="tab-firefox">Firefox</a></li>
										<li><a href="#tab-safari" data-tab="tab-safari">Safari</a></li>
										<li><a href="#tab-opera" data-tab="tab-opera">Opera</a></li>
										<li><a href="#tab-ie" data-tab="tab-ie">IE</a></li>
									</ul>
								</li>
								<li><a href="#" data-toggle="modal" data-target="#about-modal">关于</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</nav>
			</div>
			<!--结束navbar-->
		</div>
		<!--    第二层-->
		<div class="row sec-floor">
			<div class="sec-floor-content">
				<jdoc:include type="modules" name="position-2" style="none"/>

			</div>
		</div>
		<!--    第三层-->
		<div class="row">
			<jdoc:include type="modules" name="position-3" style="none"/>
		</div>
		<div class="row component-floor">
			<jdoc:include type="component" style="none"/>
		</div>
		<!--    第四层-->
		<div class="row">
			<div class="col-md-4">
				<jdoc:include type="modules" name="position-4" style="none"/>
			</div>
			<div class="col-md-4">
				<jdoc:include type="modules" name="position-5" style="none"/>
			</div>
			<div class="col-md-4">
				<jdoc:include type="modules" name="position-6" style="none"/>
			</div>
		</div>
		<!--    第五层-->
		<div class="row">
			<div class="col-md-3">
				<jdoc:include type="modules" name="position-7" style="none"/>
			</div>
			<div class="col-md-3">
				<jdoc:include type="modules" name="position-8" style="none"/>
			</div>
			<div class="col-md-3">
				<jdoc:include type="modules" name="position-9" style="none"/>
			</div>
			<div class="col-md-3">
				<jdoc:include type="modules" name="position-10" style="none"/>
			</div>
		</div>
		<!--    第六层-->
		<div class="row">
			<div class="col-md-6">
				<jdoc:include type="modules" name="position-11" style="none"/>
			</div>
			<div class="col-md-6">
				<jdoc:include type="modules" name="position-12" style="none"/>
			</div>
		</div>
		<!--    第七层-->
		<div class="row">
			<jdoc:include type="modules" name="position-13" style="none"/>
		</div>
		<div class="row">
			<jdoc:include type="modules" name="footer" style="none"/>
		</div>
	</div>
</body>
</html>