<?php
/*
Template Name: Archives
*/

get_header() 

?>

<div id="content">
	<div class="archive">

<?php
if (have_posts()): while (have_posts()): the_post();
	the_content();
endwhile; endif;
?>
</div>
</div>

<?php get_footer() ?>

