<?php get_header() ?>

<div id="content">

<?php
if (have_posts()): while (have_posts()): the_post();
 get_template_part('article-listing', get_post_format());
?>
<?php
endwhile; endif;
?>

<div class="pagination">
	<?php
		global $paged, $wp_query;

		$max_page = $wp_query->max_num_pages;

		$nextpage = intval($paged) + 1;

		$newer = get_previous_posts_page_link();
		$older = get_next_posts_page_link();

		if ( !is_single() && ( $nextpage <= $max_page ) ) {
			echo '<a class="nextPage" href="' . $older . '">&lsaquo; Older</a>';
		}
		if ( !is_single() && $paged > 1 ) {
			echo '<a class="previousPage" href="' . $newer . '">Newer &rsaquo;</a>';
		}
	?>
</div>

</div>

<?php get_footer() ?>

