<?php

/**
 * Template Name: Partners Page Template
 * @author Keith Murphy - nomadmystics@gmail.com && Woo-themes
 * The business page template displays your posts with a "business"-style
 * content slider at the top.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options, $wp_query;

require_once( __DIR__ . '/lib/GPSEN_posts.php');

get_header();


if ( class_exists('GPSEN_posts') ) {
	$gpsen_posts = new GPSEN_posts();
}

?>
    <!-- #content Starts -->

<?php woo_content_before(); ?>

<?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'true' == $woo_options['woo_slider_biz_full'] ) ) {
	$saved = $wp_query;
	woo_slider_biz();
	$wp_query = $saved;
} ?>

    <div id="content" class="col-full business">
        <div id="main-sidebar-container">
            <!-- #main Starts -->

			<?php woo_main_before(); ?>

			<?php if ( ( isset( $woo_options['woo_slider_biz'] ) && 'true' == $woo_options['woo_slider_biz'] ) && ( isset( $woo_options['woo_slider_biz_full'] ) && 'false' == $woo_options['woo_slider_biz_full'] ) ) {
				$saved = $wp_query;
				woo_slider_biz();
				$wp_query = $saved;
			} ?>

            <section id="main">
                <div id="partnersPage">
				<?php

				woo_loop_before();

                if ( class_exists('GPSEN_posts') ) {
                    echo "<h2 class=\"greenHeaders\">Sustaining Partners</h2>";
                    $sustaining_tax = [
                        [
	                        'taxonomy' => 'partners_categories',
	                        'field' => 'slug',
	                        'terms' => 'sustaining-partners',
                        ]
                    ];
	                $gpsen_posts->gpsen_build_sustaining_partners_posts( $sustaining_tax );


                    echo "<h2 class=\"greenHeaders\">Contributing Partners</h2>";

                    $custom_terms = get_terms( 'partners_categories' );
                    $reordered_terms = [$custom_terms[1], $custom_terms[0], $custom_terms[2]];

                    if ( !empty($reordered_terms) ) {

                        foreach ( $reordered_terms as $term ) {
	                        wp_reset_query();

	                        $tax = [
                                [
	                                'taxonomy' => 'partners_categories',
	                                'field' => 'slug',
	                                'terms' => $term->slug,
                                ]
	                        ];

	                        $gpsen_posts->gpsen_build_partners_posts( $tax, $term );

                        }

                    }

                }

				woo_loop_after();

				?>
                    <div class="greySections addLiteMarginTop">
                        <div class="whiteCard">
                                <div id="gpsen-partners-map" style="height: 500px;"></div>
                                <div class="clearBoth"></div>
                        </div>
                    </div>
                </div><!--end partnersPage-->
            </section><!-- /#main -->

			<?php woo_main_after(); ?>

			<?php get_sidebar(); ?>

        </div><!-- /#main-sidebar-container -->

		<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->

<?php woo_content_after(); ?>

<?php get_footer(); ?>