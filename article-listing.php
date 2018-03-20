<?php
$hasTitle = isset( $post->post_title ) && strlen($post->post_title) > 0;
?>
<div <?php post_class('article' . ($hasTitle ? '' : ' micro')); ?>>
	<?php if ($hasTitle): ?>
		<div class="front-matter">
			<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php if (function_exists('get_the_subtitle') && strlen(get_the_subtitle(get_the_ID(), '', '', false)) > 0): ?>
				<h2 class="subtitle"><?php the_subtitle(); ?></h2>
			<?php endif; ?>
			<?php if ( has_post_format( 'link' )) : ?>
				<a class="linkpost" href="<?= get_post_meta(get_the_ID(), 'link', true); ?>"><?= get_post_meta(get_the_ID(), 'link', true); ?></a>
			<?php endif; ?>			
			<?php if (get_post_type() != 'page'): ?>
			<h5 class="date"><?php the_date(); ?></h5>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
<?php the_content(); ?>

<?php if (!$hasTitle): ?>
	<div class="date"><a href="<?php the_permalink() ?>"><?php echo  get_the_date() . ' ' . get_the_time(); ?></a></div>
<?php else: ?>
	<hr class="articleDivider" />
<?php endif; ?>
</div>
