<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package insurance
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title>
		<?php
		/*
        * Print the <title> tag based on what is being viewed.
        */
		global $page, $paged;
		wp_title( '-&nbsp;', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
		?>
	</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Clear+Sans+Thin">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!--logo slider -->
	<script src="<?php bloginfo("template_directory");?>/js/logo-slider/jquery.cycle.all.min.js"></script>
	<script src="<?php bloginfo("template_directory");?>/js/logo-slider/lgs_jquery.cycle2.js"></script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>
	<section style="min-width: 1000px;" id="s-menu">
		<div style="height: 100%" class="insur-container">
				<?php
				wp_nav_menu( array(
					'menu' => 'main menu',
					//'depth' => 2,
					'container' => false,
					'menu_id' => 'top-menu',
					//Process nav menu using our custom nav walker
					'walker' => new wp_bootstrap_navwalker()) //libs/wp-bootstrap
				);
				?>
			<form style="display: inline-block;float: right;margin-top: 5px" action="<?php echo home_url( '/' ); ?>">
				<div class="h-m-block">
					<div class="form-group s-form">
						<input id="s-input-h" type="text" class="form-control" placeholder="Поиск">
					</div>
					<div class="form-group s-form">
						<button id="s-button" type="submit" class="btn btn-default"></button>
					</div>
				</div>
			</form>
	</section>
	<section class="clearfix" style="min-width: 1000px" id="header-content">
		<div class="insur-container">
			<div class="col-xs-3 h-content">
				<img id="h-logo" src="<?php bloginfo("template_directory");?>/image/logo.png" alt="alt">
			</div>
			<div class="col-xs-6 h-content">
				<p id="h-onmarket">НА РЫНКЕ СТРАХОВАНИЯ С 1997 года</p>
				<div id="h-content-info" class="col-xs-12 no-padding">
					<ul>
						<li>
							<p class="h-cont-p no-margin">ЧАСТНЫМ КЛИЕНТАМ</p>
						</li>
						<li>
							<p class="h-cont-p no-margin" >КОРПОРАТИВНЫМ КЛИЕНТАМ</p>
						</li>
						<li>
							<p class="h-cont-p no-margin" >ОБ АГЕНСТВЕ</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xs-3 h-content">
				<div id="h-cont-al-ds">
					<span id="d-sp-p">+7(473)</span><span id="d-sp">239 31 07</span>
				</div>
				<p class="office_n no-margin">+7 (906) 584 28 26</p>
				<p class="saleoffice no-margin">Офис продаж</p>
			</div>
		</div>
	</section>
</header>

<section class="clearfix" style="min-width: 1000px" id="slider-section">
		<?php wd_slider(1); ?>


	<!--
    <div class="container">
        <div class="col-lg-4">
            <p id="s-sec-1">СТРАХОВАНИЕ<br>ВАШЕГО</p>
            <p id="s-sec-2"><b>АВТОМОБИЛЯ</b></p>
            <span class="s-sec-3">КАСКО</span><span class="s-sec-4">Диагностическая карта</span>
            <span class="s-sec-5" >ОСАГО</span><span class="s-sec-4">Зеленые карты</span>
            <button id="b-more-info"><span>УЗНАТЬ ПОДРОБНОСТИ >>></span></button>
        </div>
    </div>
    -->

</section>
