<?php

/**
 * Template Name: testing-events-page-business-template
 *
 * The business page template displays your posts with a "business"-style
 * content slider at the top.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options, $wp_query;

get_header();
$page_template = woo_get_page_template();

?>
    <!-- #content Starts -->

	<?php woo_content_before(); ?>

	<?php if ((isset($woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset($woo_options['woo_slider_biz_full']) && 'true' == $woo_options['woo_slider_biz_full'])) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>

    <div id="content" class="col-full business">
    	<div id="main-sidebar-container" class="eventsPage">
            <!-- #main Starts -->
		<?php woo_main_before(); ?>
		<?php if ((isset($woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset($woo_options['woo_slider_biz_full']) && 'false' == $woo_options['woo_slider_biz_full'])) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>
		<section id="main">
            <h2 class="greenHeaders">GPSEN Events</h2>
		<?php
        // This is the posts for GPSEN Events category
		woo_loop_before();
		// WP_Query arguments
		$GPSEN_args = array(
			'post_type'              => 'post',
			'category_name'          => 'gpsen-events',
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
			'posts_per_page'         =>  '-1'
		);
		// The Query
		$query = new WP_Query($GPSEN_args);
		// The Loop
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				echo '<div class="entry-content greySections addLiteMarginTop">';
				echo '<div class="whiteCard">';
				echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>'; 
		  		the_content();
		  		echo '</div>';
 		  		echo '</div>';
			}
		}
		?>
            <h2 class="greenHeaders">Community Events</h2>
            <?php
            // This is the posts for Community Events category
            woo_loop_before();
            // WP_Query arguments
            $community_args = array(
                'post_type'              => 'post',
                'category_name'          => 'community-events',
                'order'                  => 'ASC',
                'orderby'                => 'menu_order',
                'posts_per_page'         =>  '-1'
            );
            // The Query
            $query = new WP_Query($community_args);
            // The Loop
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="entry-content greySections addLiteMarginTop">';
                    echo '<div class="whiteCard">';
                    echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                    the_content();
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        <?php
	    if (have_posts()) {
              $count = 0;
              while (have_posts()) {
                   the_post();
                   $count++;
                   woo_get_template_part( 'content', 'page-template-business' ); // Get the page content template file, contextually.
              }
         }
			woo_loop_after();
		?>
		</section><!-- /#main -->

          <?php woo_main_after(); ?>

          <?php get_sidebar(); ?>

     </div><!-- /#main-sidebar-container -->
         <?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
<?php woo_content_after(); ?>
<?php get_footer(); ?>