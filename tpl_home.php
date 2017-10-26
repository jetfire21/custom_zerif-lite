<?php
/*
* Template Name: Custom home
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<?php
	zerif_after_header_trigger();
	$zerif_change_to_full_width = get_theme_mod( 'zerif_change_to_full_width' );
?>

<div id="content" class="site-content">

	<div class="container">

		<?php zerif_before_page_content_trigger(); ?>
		<?php
		// if ( (function_exists( 'is_cart' ) && is_cart()) || (function_exists( 'is_account_page' ) && is_account_page()) || (function_exists( 'is_checkout' ) && is_checkout() ) || ! empty( $zerif_change_to_full_width ) ) {
		// 	echo '<div class="content-left-wrap col-md-12">';
		// } else {
		// 	echo '<div class="content-left-wrap col-md-9">';
		// }
		?>
		<div class="content-left-wrap col-md-12">
		<?php zerif_top_page_content_trigger(); ?>
		<div id="primary" class="content-area">

			<main itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">

				<?php
				// while ( have_posts() ) :
				// 	the_post();

				// 		get_template_part( 'content', 'page' );

				// 	if ( comments_open() || '0' != get_comments_number() ) :

				// 		comments_template();

				// 		endif;

				// 	endwhile;
				?>
<?php
	$params = array('posts_per_page' => 4, 'post_type' => 'product', 'product_tag' => 'хит');
	$products = new WP_Query($params);
	// var_dump($products);

	if ( $products->have_posts() ) {

		?>
		<h1 class="page-title">Xиты продаж</h1>
		<?php //do_action( "woocommerce_shortcode_before_{$loop_name}_loop", $atts ); ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php //do_action( "woocommerce_shortcode_after_{$loop_name}_loop", $atts ); ?>

		<?php
	} else {
		//do_action( "woocommerce_shortcode_{$loop_name}_loop_no_results", $atts );
	}

	woocommerce_reset_loop();
	wp_reset_postdata();

	$params = array('posts_per_page' => 4, 'post_type' => 'product', 'product_tag' => 'new');
	$products = new WP_Query($params);
	// var_dump($products);

	if ( $products->have_posts() ) {

		?>
		<h1 class="page-title">Новинки</h1>
		<?php //do_action( "woocommerce_shortcode_before_{$loop_name}_loop", $atts ); ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

		<?php //do_action( "woocommerce_shortcode_after_{$loop_name}_loop", $atts ); ?>

		<?php
	} else {
		//do_action( "woocommerce_shortcode_{$loop_name}_loop_no_results", $atts );
	}

	woocommerce_reset_loop();
	wp_reset_postdata();

?>
			</main><!-- #main

		</div><!-- #primary -->

	<?php
	if ( (function_exists( 'is_cart' ) && is_cart()) || (function_exists( 'is_account_page' ) && is_account_page()) || (function_exists( 'is_checkout' ) && is_checkout() ) || ! empty( $zerif_change_to_full_width ) ) {
		zerif_bottom_page_content_trigger();
		echo '</div>';
		zerif_after_page_content_trigger();
	} else {
		zerif_bottom_page_content_trigger();
		echo '</div>';
		zerif_after_page_content_trigger();
		// zerif_sidebar_trigger();
	}
		?>
	
		
	</div><!-- .container -->

<?php get_footer(); ?>


