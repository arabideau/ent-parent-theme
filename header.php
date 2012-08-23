<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
$options = get_option('plugin_options');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * boilerplate_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<? if($options['pageWrapper']) echo '<div id="pageWrapper"'; ?>
		<header role="banner">
			<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<!-- <p><?php bloginfo( 'description' ); ?></p> -->
			<div id="headerLinks">
				<a class="home" href="<? home_url('/') ?>">Home</a>
				<a class="call" href="#">Call</a>
				<a class="tools" href="#">Tools</a>
			</div>
			<div id="higherDiv" style="position: static; z-index: 3000">
			  <div id="dropDownPhone" style="z-index: 3000">
			    <a href="javascript:void(0)" class="close-tooltip" style="float:right; margin:-15px 0 23px 0; color:#555; font-size:16px;"></a> 
			    <h4>Glendale</h4>
			    <h3>(818) 241-2101</h3>
			    <h4>Pasadena</h4>
				<h3>(626) 577-5550</h3>
			  </div>
			  
			  <div id="dropDown" style="z-index: 3000">
			    <a href="javascript:void(0)" class="close-tooltip" style="float:right; margin:-15px 0 23px 0; color:#555; font-size:16px;"></a> 
				<h3>New Patient</h3>
		        <ul class="iconLinks">
		          <li><a class="pdf" href="<? bloginfo('stylesheet_directory'); ?>/documents/PatientRegistrationPrivacyPolicy.pdf" target="_blank">Patient Registration & Privacy Policy</a></li>
		          <li><a class="pdf" href="<? bloginfo('stylesheet_directory'); ?>/documents/adultQuestionnaire.pdf" target="_blank">Adult Questionnaire</a></li>
		          <li><a class="pdf" href="<? bloginfo('stylesheet_directory'); ?>/documents/pediatricQuestionnaire.pdf" target="_blank">Pediatric Questionnaire</a></li>
		        </ul>
			  </div>
			</div>
		</header>
		<nav id="access" role="navigation">
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			<?php get_search_form(); ?>
		</nav><!-- #access -->

		<section id="content" role="main">
