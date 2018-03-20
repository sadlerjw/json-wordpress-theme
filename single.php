<?php get_header() ?>

<div id="content">

<?php
if (have_posts()): while (have_posts()): the_post();
 get_template_part('article', get_post_format());

// If comments are open or we have at least one comment, load up the comment template.
 if ( comments_open() || get_comments_number() ) :
 	comments_template();
 endif;
?>
	<hr class="articleDivider" />
<?php
endwhile; endif;
?>

</div>

<?php get_footer() ?>

