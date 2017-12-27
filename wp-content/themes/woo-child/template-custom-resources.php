<?php

/**
 * Template Name: resource-page-business-template
 *
 * The business page template displays your posts with a "business"-style
 * content slider at the top.
 *
 * @package WooFramework
 * @subpackage Template
 */
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 1/8/2016
 * Time: 4:12 PM
 */


global $woo_options, $wp_query;

get_header();

$page_template = woo_get_page_template();

?>
     <!-- #content Starts -->
<?php woo_content_before(); ?>

	<?php if ((isset($woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset($woo_options['woo_slider_biz_full']) && 'true' == $woo_options['woo_slider_biz_full'])) {$saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>

     <div id="content" class="col-full business">
          <div id="main-sidebar-container" class="eventsPage">
               <!-- #main Starts -->

               <?php woo_main_before(); ?>
               <?php if ((isset( $woo_options['woo_slider_biz']) && 'true' == $woo_options['woo_slider_biz']) && (isset( $woo_options['woo_slider_biz_full'] ) && 'false' == $woo_options['woo_slider_biz_full'] ) ) { $saved = $wp_query; woo_slider_biz(); $wp_query = $saved; } ?>
               <section id="main">
                    <h2 class="greenHeaders">Resources</h2>
                    <div class="accordion">
                         <h3 class="accordionHeadersGrey">Classes, Workshops &amp; Conferences</h3>
                         <div>
                              <?php
                              /// Starting custom posts
                              // Publications media Opportunities
                              // WP_Query arguments
                              $classesWorkshopsArgs = array(
                                   'post_type'              => 'post',
                                   'category_name'          => 'classes-workshops-and-conferences',
                                   'order'                  => 'ASC',
                                   'orderby'                => 'menu_order',
                                   'posts_per_page'         =>  '-1'
                              );
                              // The Query
                              $classesWorkshopsQuery = new WP_Query($classesWorkshopsArgs);
                              // The Loop
                              if ($classesWorkshopsQuery->have_posts()) {
                                   while ($classesWorkshopsQuery->have_posts()) {
                                        $classesWorkshopsQuery->the_post();
                                        echo '<div class="entry-content greySections addLiteMarginTop">';
                                        echo '<div class="whiteCard">';
                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                        the_content();
                                        echo '</div>';
                                        echo '</div>';
                                   }
                              }
                              ?>
                         </div>
                    <h3 class="accordionHeadersGrey">Jobs, Internships &amp; Volunteer Opportunities</h3>
                        <div>
                         <?php
                         // Jobs and internships
                         // WP_Query arguments
                         $jobsArgs = array(
                              'post_type'              => 'post',
                              'category_name'          => 'jobs-internships',
                              'order'                  => 'ASC',
                              'orderby'                => 'menu_order',
                              'posts_per_page'         =>  '-1'
                         );
                         // The Query
                         $jobsQuery = new WP_Query($jobsArgs);
                         // The Loop
                         if ($jobsQuery->have_posts()) {
                              while ($jobsQuery->have_posts()) {
                                   $jobsQuery->the_post();
                                   echo '<div class="entry-content greySections addLiteMarginTop">';
                                   echo '<div class="whiteCard">';
                                   echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                   the_content();
                                   echo '</div>';
                                   echo '</div>';
                              }
                         }
                         ?>
                        </div>
                         <h3 class="accordionHeadersGrey">Grant &amp; Awards</h3>
                        <div>
                         <?php
                              // Grant Opportunities
                              // WP_Query arguments
                              $grantArgs = array(
                                   'post_type'              => 'post',
                                   'category_name'          => 'grant-and-awards',
                                   'order'                  => 'ASC',
                                   'orderby'                => 'menu_order',
                                   'posts_per_page'         =>  '-1'
                              );
                              // The Query
                              $grantQuery = new WP_Query($grantArgs);
                              // The Loop
                              if ($grantQuery->have_posts()) {
                                   while ($grantQuery->have_posts()) {
                                        $grantQuery->the_post();
                                        echo '<div class="entry-content greySections addLiteMarginTop">';
                                        echo '<div class="whiteCard">';
                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                        the_content();
                                        echo '</div>';
                                        echo '</div>';
                                   }
                              }
                         ?>
                        </div>
<!--                         <h2 class="accordionHeadersGrey">Training Opportunities</h2>-->
<!--                        <div>-->
<!--                         --><?php
//                              // Training Opportunities
//                              // WP_Query arguments
//                              $trainingArgs = array(
//                                   'post_type'              => 'post',
//                                   'category_name'          => 'training-opportunities',
//                                   'order'                  => 'DESC',
//                                   'orderby'                => 'menu_order',
//                                   'posts_per_page'         =>  '-1'
//                              );
//                              // The Query
//                              $trainingQuery = new WP_Query($trainingArgs);
//                              // The Loop
//                              if ($trainingQuery->have_posts()) {
//                                   while ($trainingQuery->have_posts()) {
//                                        $trainingQuery->the_post();
//                                        echo '<div class="entry-content greySections addLiteMarginTop">';
//                                        echo '<div class="whiteCard">';
//                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
//                                        the_content();
//                                        echo '</div>';
//                                        echo '</div>';
//                                   }
//                              }
//                         ?>
<!--                        </div>-->
                         <h3 class="accordionHeadersGrey">Curriculum Resources</h3>
                        <div>
                         <?php
                              // Curriculum Resources
                              // WP_Query arguments
                              $curriculumArgs = array(
                                   'post_type'              => 'post',
                                   'category_name'          => 'curriculum-resources',
                                   'order'                  => 'ASC',
                                   'orderby'                => 'menu_order',
                                   'posts_per_page'         =>  '-1'
                              );
                              // The Query
                              $curriculumQuery = new WP_Query($curriculumArgs);
                              // The Loop
                              if ($curriculumQuery->have_posts()) {
                                   while ($curriculumQuery->have_posts()) {
                                        $curriculumQuery->the_post();
                                        echo '<div class="entry-content greySections addLiteMarginTop">';
                                        echo '<div class="whiteCard">';
                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                        the_content();
                                        echo '</div>';
                                        echo '</div>';
                                   }
                              }
                         ?>
                        </div>
                         <h3 class="accordionHeadersGrey">Publications &amp; Media Opportunities</h3>
                         <div>
                              <?php
                              /// Starting custom posts
                              // Publications media Opportunities
                              // WP_Query arguments
                              $publicationArgs = array(
                                   'post_type'              => 'post',
                                   'category_name'          => 'publications-media-opportunities',
                                   'order'                  => 'ASC',
                                   'orderby'                => 'menu_order',
                                   'posts_per_page'         =>  '-1'
                              );
                              // The Query
                              $publicationQuery = new WP_Query($publicationArgs);
                              // The Loop
                              if ($publicationQuery->have_posts()) {
                                   while ($publicationQuery->have_posts()) {
                                        $publicationQuery->the_post();
                                        echo '<div class="entry-content greySections addLiteMarginTop">';
                                        echo '<div class="whiteCard">';
                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                        the_content();
                                        echo '</div>';
                                        echo '</div>';
                                   }
                              }
                              ?>
                         </div>
                         <h3 class="accordionHeadersGrey">Other Resources</h3>
                         <div>
                              <?php
                              /// Starting custom posts
                              // Publications media Opportunities
                              // WP_Query arguments
                              $otherResourcesArgs = array(
                                  'post_type'              => 'post',
                                  'category_name'          => 'other-resources',
                                  'order'                  => 'ASC',
                                  'orderby'                => 'menu_order',
                                  'posts_per_page'         =>  '-1'
                              );
                              // The Query
                              $otherResourcesQuery = new WP_Query($otherResourcesArgs);
                              // The Loop
                              if ($otherResourcesQuery->have_posts()) {
                                   while ($otherResourcesQuery->have_posts()) {
                                        $otherResourcesQuery->the_post();
                                        echo '<div class="entry-content greySections addLiteMarginTop">';
                                        echo '<div class="whiteCard">';
                                        echo '<h3 class="blueHeaders">' . get_the_title($ID) . '</h3>';
                                        the_content();
                                        echo '</div>';
                                        echo '</div>';
                                   }
                              }
                              ?>
                         </div>
                    </div><!--end accordion-->
                    <?php
                    // This brings in the other content for that page from the text editor
                    if (have_posts()) {
                         $count = 0;
                         while (have_posts()) {
                              the_post();
                              $count++;
                              woo_get_template_part('content', 'page-template-business'); // Get the page content template file, contextually.
                         }
                    }
                    woo_loop_after();
                    ?>

               </section><!-- /#main -->

               <?php woo_main_after(); ?>

               <?php get_sidebar(); ?>

          </div><!-- /#main-sidebar-container -->

          <?php get_sidebar('alt'); ?>

     </div><!-- /#content -->

<?php woo_content_after(); ?>
<?php get_footer(); ?>