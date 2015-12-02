<div class="uk-container uk-container-center">

<?php

// no direct access
defined('_JEXEC') or die;

foreach ($this->results as $result) {

	$args = array(
        'permalink' => '',
        'image' => '',
        'image_alignment' => '',
        'image_alt' => '',
        'image_caption' => '',
        'title' => $this->escape($result->title),
        'title_link' => '1',
        'author' => '',
        'author_url' => '',
        'date' => '',
        'datetime' => '',
        'category' => ($result->section) ? $this->escape($result->section) : '',
        'category_url' => '',
        'hook_aftertitle' => '',
        'hook_beforearticle' => '',
        'hook_afterarticle' => '',
        'article' => $result->text,
        'tags' => '',
        'edit' => '',
        'url' => ($result->href) ? JRoute::_($result->href) : '',
        'more' => '',
        'previous' => '',
        'next' => ''
    );

	// Render template
	echo $warp['template']->render('article', $args);

}

echo $this->pagination->getPagesLinks();

?>

</div>

