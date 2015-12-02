<article class="uk-article" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

<?php if ($this['config']->get('article_style')=='tm-article-blog' && $image) : ?>

<?php
	$blog_overview = (bool) $url;
?>


	<?php if ($blog_overview) : ?>
	<!-- Blog Overview -->

		<?php if ($image_alignment !== 'none') : ?>
		<div class="uk-grid tm-article-grid" data-uk-grid-match="{target:'.uk-panel'}">
			<div class="uk-width-medium-1-2 uk-position-relative <?php echo $image_alignment == 'right' ? 'uk-flex-order-last-medium' : '' ?>">
		<?php endif; ?>

		<div class="uk-cover-background tm-featured-image" style="background-image:url(<?php echo $image; ?>);">

		<?php if ($image_alignment !== 'none') : ?>
			</div>
			</div>
			<div class="uk-width-medium-1-2">
		<?php endif; ?>


		<?php if ($image_alignment == 'none') : ?>
			<div class="uk-overlay-panel uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-text-center">
		<?php else : ?>
			<div class="uk-panel uk-panel-space uk-flex uk-flex-column uk-flex-center">
		<?php endif; ?>

				<?php if ($author || $date || $category) : ?>
				<p class="uk-article-meta tm-article-meta">

					<?php if ($date) : ?>
					<span class="tm-article-date">
						<time datetime="<?php echo $date ?>">
							<?php echo JHtml::_('date', $date, JText::_('d/m/Y')) ?>
						</time>
					</span>
					<?php endif; ?>

					<?php if ($category) : ?>
					<span class="uk-text-primary">+</span>
					<span class="tm-article-category">
						<?php echo ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category; ?>
					</span>
					<?php endif; ?>

				</p>
				<?php endif; ?>

				<?php if ($title) : ?>
				<h1 class="uk-article-title tm-article-title">
					<?php if ($url && $title_link) : ?>
						<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
					<?php else : ?>
						<?php echo $title; ?>
					<?php endif; ?>
				</h1>
				<?php endif; ?>

				<?php if ($image_alignment !== 'none') : ?>
					<?php echo $hook_beforearticle; ?>

					<?php if ($article) : ?>
					<div>
						<?php echo $article; ?>
					</div>
					<?php endif; ?>

					<?php if ($tags) : ?>
					<p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($more) : ?>
					<a <?php echo $image_alignment == 'none' ? 'class="tm-article-more uk-button uk-button-large"' : '' ?> href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
				<?php endif; ?>

				<?php if ($edit) : ?>
				<p class="tm-article-edit"><?php echo $edit; ?></p>
				<?php endif; ?>

			</div>
		</div>
		<?php if ($image_alignment !== 'none') : ?>
		</div>
		<?php endif; ?>

	<?php else: ?>
	<!-- Blog Single -->

		<div class="uk-cover-background tm-featured-image-single" style="background-image:url(<?php echo $image; ?>);"></div>

			<div class="uk-container uk-container-center tm-article-container">

				<div class="tm-article-header">

					<?php if ($title) : ?>
					<h1 class="uk-article-title tm-article-title uk-text-center">
						<?php echo $title; ?>
					</h1>
					<?php endif; ?>

					<p class="uk-article-meta uk-text-center">

						<?php if ($author) : ?>
						<span class="tm-article-author">
							<?php echo ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author; ?>
						</span>
						<?php if ($date || $category) : ?>
							<span class="uk-text-primary">+</span>
						<?php endif; ?>
						<?php endif; ?>

						<?php if ($date) : ?>
						<span class="tm-article-date">
							<time datetime="<?php echo $date ?>">
								<?php echo JHtml::_('date', $date, JText::_('F Y')) ?>
							</time>
						</span>
						<?php if ($category) : ?>
							<span class="uk-text-primary">+</span>
						<?php endif; ?>
						<?php endif; ?>

						<?php if ($category) : ?>
						<span class="tm-article-category">
							<?php echo ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category; ?>
						</span>
						<?php endif; ?>

					</p>

				</div>

				<div <?php echo $this['config']->get('article_columns') ? "class='". $this['config']->get('article_columns') ."'": '' ?> >
					<?php echo $article; ?>
				</div>

				<?php if ($tags) : ?>
				<p class="tm-article-tags"><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
				<?php endif; ?>

			</div>

	<?php endif; ?>

<?php else : ?>

	<?php if ($image && $image_alignment == 'none') : ?>
		<?php if ($url) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($title) : ?>
	<h1 class="uk-article-title">
		<?php if ($url && $title_link) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
		<?php else : ?>
			<?php echo $title; ?>
		<?php endif; ?>
	</h1>
	<?php endif; ?>

	<?php echo $hook_aftertitle; ?>

	<?php if ($author || $date || $category) : ?>
	<p class="uk-article-meta">

		<?php

			$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
			$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
			$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

			if($author && $date) {
				printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
			} elseif ($author) {
				printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
			} elseif ($date) {
				printf(JText::_('TPL_WARP_META_DATE'), $date);
			}

			if ($category) {
				echo ' ';
				printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
			}

		?>

	</p>
	<?php endif; ?>

	<?php if ($image && $image_alignment != 'none') : ?>
		<?php if ($url) : ?>
			<a class="uk-align-<?php echo $image_alignment; ?>" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img class="uk-align-<?php echo $image_alignment; ?>" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php echo $hook_beforearticle; ?>

	<?php if ($article) : ?>
	<div>
		<?php echo $article; ?>
	</div>
	<?php endif; ?>

	<?php if ($tags) : ?>
	<p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
	<?php endif; ?>

	<?php if ($more) : ?>
	<p>
		<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
	</p>
	<?php endif; ?>

	<?php if ($edit) : ?>
	<p><?php echo $edit; ?></p>
	<?php endif; ?>

	<?php if ($previous || $next) : ?>
    <ul class="uk-pagination">
        <?php if ($previous) : ?>
        <li class="uk-pagination-previous">
            <a href="<?php echo $previous; ?>" title="<?php echo JText::_('JPREV') ?>">
                <i class="uk-icon-arrow-left"></i>
                <?php echo JText::_('JPREV') ?>
            </a>
        </li>
        <?php endif; ?>

        <?php if ($next) : ?>
        <li class="uk-pagination-next">
            <a href="<?php echo $next; ?>" title="<?php echo JText::_('JNEXT') ?>">
                <?php echo JText::_('JNEXT') ?>
                <i class="uk-icon-arrow-right"></i>
            </a>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>

	<?php echo $hook_afterarticle; ?>

<?php endif; ?>
</article>