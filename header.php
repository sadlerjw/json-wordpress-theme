<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="top">
		<div id="header">
			<div class="headerCode fullSize">
				<div class="codeLine">
					{
				</div>
				<div class="codeLine siteTitle indent1">
					<span class="stringToken">"title"</span>&nbsp;&nbsp;&nbsp;&nbsp;: <span class="stringToken">"<?php echo get_bloginfo('name')?>"</span>,
				</div>
				<div class="codeLine indent1">
					<span class="stringToken">"author"</span>&nbsp;&nbsp;&nbsp;: <span class="stringToken">"Jason Sadler"</span>,
				</div>
				<div class="codeLine indent1">
					<span class="stringToken">"twitter"</span>&nbsp;&nbsp;: <span class="stringToken">"<a href="https://twitter.com/sadlerjw">@sadlerjw"</a></span>,
				</div>
				<div class="codeLine indent1">
					<span class="stringToken">"linkedin"</span>:    <span class="stringToken">"<a href="https://ca.linkedin.com/in/sadlerjw">ca.linkedin.com/in/sadlerjw</a>"</span>,
				</div>
				<div class="codeLine">
					}
				</div>
			</div>
			<div class="headerCode shrinkSize">
				<div class="codeLine siteTitle">
					<span class="stringToken">"title"</span>: <span class="stringToken">"<?php echo get_bloginfo('name')?>"</span>
				</div>
			</div>
			<div class="headerCode mobileSize">
				<div class="codeLine siteTitle">
					<span class="stringToken">"<?php echo get_bloginfo('name')?>"</span>
				</div>
			</div>
			<button id="menu_button" class="closed"><div class="lines"></div></button>
		</div>
		<div id="navContainer">
<?php wp_nav_menu( array( 'menu' => 'MAIN', 'container_id' => 'nav' ) ); ?>
		</div>
	</div>