<?php

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Class GPSEN_posts
*/

class GPSEN_posts {


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Factory for WP_QUERY global
	 * @link https://codex.wordpress.org/Class_Reference/WP_Query
	 * @param string $post_type
	 * @param string $category
	 * @param string $number
	 * @param string $order
	 * @return array $args
	*/

	static function gpsen_posts_query_factory ( $post_type, $category, $number = '-1', $order = 'ASC', $menu_order = 'menu_order title' ) {

		$args = [
			'post_type' => [$post_type],
			'category' => $category,
			'posts_per_page' => $number,
			'order' => $order,
			'orderby' => $menu_order,
		];

		return $args;

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Factory for WP_QUERY global - Get custom tax
	 * @link https://codex.wordpress.org/Class_Reference/WP_Query
	 * @param array $tax - Custom tax_query array
	 * @param string $post_type - Type of post ie post, resources_post
	 * @param string $number - Number of posts
	 * @param string $order - Order of the posts @example 'ASC' && 'DESC'
	 * @param string $menu_order - Order by Page Order. Used most often for Pages (Order field in the Edit Page Attributes box) and for Attachments
	 * @return array $args
	 */

	static function gpsen_posts_tax_query_factory ( $tax, $post_type = 'post', $number = '-1', $order = 'ASC', $menu_order = 'menu_order title' ) {

		$args = [
			'post_type' => $post_type,
			'posts_per_page' => $number,
			'order' => $order,
			'orderby' => $menu_order,
			'tax_query' => $tax,
		];

		return $args;

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Factory for WP_QUERY global - Get custom tax
	 * @link https://codex.wordpress.org/Class_Reference/WP_Query
	 * @link https://developer.wordpress.org/reference/functions/get_terms/
	 * @param array $tax - Custom tax_query array
	 * @param object $term - Custom tax terms
	 * @return void
	 */

	public function gpsen_build_partners_posts ( $tax, $term ) {

		$gpsen_partners_posts_args = GPSEN_posts::gpsen_posts_tax_query_factory( $tax, 'gpsen_partners', '-1', 'ASC', 'name' );
		$gpsen_partners_posts_query = new WP_Query( $gpsen_partners_posts_args );


//		echo '<pre>';
//		var_dump($gpsen_partners_posts_query);
//		echo '</pre>';

		echo '<section class="civilSociety addLiteMarginTop">';
        echo '	<article>';
        echo '		<div class="greySections">';
		echo '			<div class="whiteCard">';
		echo "          	<h3 class=\"blueHeaders\">{$term->name}</h3>";
		if ( $gpsen_partners_posts_query->have_posts() ) {

			while ( $gpsen_partners_posts_query->have_posts() ) {

				$website = '';
				$gpsen_partners_posts_query->the_post();

				$id = get_the_ID();
				$title = get_the_title();
				$metadata = get_post_meta( $id );
				$metadata = array_change_key_case($metadata);

				if ( isset($metadata['website']) ) {

					$website = $metadata['website'][0];

				}

				echo '<div class="col-md-6">';
				echo "  <a href=\"{$website}\" target=\"_blank\" rel=\"noopener\">{$title}</a><i class=\"fa fa-map-marker\"></i>";
				echo '</div>';


			}
			wp_reset_postdata();
		}

		echo '          	<div class="clearBoth"></div>';
		echo '			</div>';
		echo '		</div>';
		echo '	</article>';
		echo '</section>';
	}

}
