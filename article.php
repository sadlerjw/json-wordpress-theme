<?php
$hasTitle = isset( $post->post_title ) && strlen($post->post_title) > 0;
?>
<div <?php post_class('article h-entry' . ($hasTitle ? '' : ' micro')); ?>>
	<?php if ($hasTitle): ?>
		<div class="front-matter">
			<h1 class="title p-name"><?php the_title(); ?></h1>
			<?php if (function_exists('get_the_subtitle') && strlen(get_the_subtitle(get_the_ID(), '', '', false)) > 0): ?>
				<h2 class="subtitle"><?php the_subtitle(); ?></h2>
			<?php endif; ?>
			<a rel="author" class="p-author h-card" href="<?php bloginfo( 'url' ); ?>"><?php the_author() ?></a>
			<?php if ( has_post_format( 'link' )) : ?>
				<a class="linkpost" href="<?= get_post_meta(get_the_ID(), 'link', true); ?>"><?= get_post_meta(get_the_ID(), 'link', true); ?></a>
			<?php endif; ?>
			<?php if (get_post_type() != 'page'): ?>
			<h5 class="date"><time class="dt-published" datetime="<?= get_the_date('c'); ?>"><?php the_date(); ?></time></h5>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<div class="e-content">
<?php the_content(); ?>
</div>

<?php if (!$hasTitle): ?>
	<div class="date"><time class="dt-published" datetime="<?= get_the_date('c'); ?>"><?php echo  get_the_date() . ' ' . get_the_time(); ?></time> <a href="<?= the_permalink() ?>" class="u-url permalink">∞</a></div>
	<a rel="author" class="p-author h-card" href="<?php bloginfo( 'url' ); ?>"><?php the_author() ?></a>
<?php else: ?>
	<a href="<?= the_permalink() ?>" class="u-url permalink">∞</a>
<?php endif; ?>
</div>
