<?php

/**
 * Template Name: News Page Template
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

require_once (__DIR__ . '/lib/GPSEN_posts.php');

if ( class_exists('GPSEN_posts') ) {
    $gpsen_posts = new GPSEN_posts();
}

?>
     <!-- #content Starts -->
<?php woo_content_before(); ?>

<?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'true' == $woo_options['woo_slider_biz_full'] ) ) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>

     <div id="content" class="col-full business">
          <div id="main-sidebar-container" class="newsPage">

               <!-- #main Starts -->
               <?php woo_main_before(); ?>

               <?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'false' == $woo_options['woo_slider_biz_full'] ) ) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>

               <section id="main">
                    <h2 class="greenHeaders">News</h2>
                    <?php

                    woo_loop_before();

                    $post_type = 'post';
                    $category = 'news';
                    $number = '-1';
                    $order = 'DESC';
                    $menu_order = 'menu_order';

                    $gpsen_posts->gpsen_build_news_posts( $post_type, $category, $number, $order, $menu_order );


                    // News Archives
                    echo '<h2 class="blueHeaders" id="newsLetterH2">GPSEN Newsletter Archives</h2>';

                    $custom_terms = get_terms( 'gpsen_news_archives_categories' );
//                    echo '<pre>';
//                        var_dump($custom_terms);
//                    echo '</pre>';
//                    $reordered_terms = [$custom_terms[1], $custom_terms[0], $custom_terms[2]];

                    if ( !empty($custom_terms) ) {

                        foreach ( $custom_terms as $term ) {
	                        wp_reset_query();
//                            echo '<pre>';
//                                var_dump($term->slug);
//                            echo '</pre>';
	                        $tax = [
                                [
	                                'taxonomy' => 'gpsen_news_archives_categories',
	                                'field' => 'slug',
	                                'terms' => $term->slug,
                                ]
	                        ];

	                        $gpsen_posts->gpsen_build_news_archives( $tax, $term );

                        }

                    }

//                    if (have_posts()) {
//                         $count = 0;
//                         while (have_posts()) {
//                              the_post();
//                              $count++;
//                              woo_get_template_part( 'content', 'page-template-business' ); // Get the page content template file, contextually.
//                         }
//                    }
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