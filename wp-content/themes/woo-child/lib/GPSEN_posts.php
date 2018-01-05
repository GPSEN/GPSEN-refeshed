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
	 * @summary Create the partners by tax and term
	 * @link https://codex.wordpress.org/Class_Reference/WP_Query
	 * @link https://developer.wordpress.org/reference/functions/get_terms/
	 * @param array $tax - Custom tax_query array
	 * @param object $term - Custom tax terms
	 * @return void
	 */

	public function gpsen_build_partners_posts ( $tax, $term ) {

		$gpsen_partners_posts_args = GPSEN_posts::gpsen_posts_tax_query_factory( $tax, 'gpsen_partners', '-1', 'ASC', 'name' );
		$gpsen_partners_posts_query = new WP_Query( $gpsen_partners_posts_args );

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
					update_post_meta( $id, 'website', $metadata['website'][0] );
					$website = $metadata['website'][0];
				}

				if ( isset($metadata['address']) ) {
					update_post_meta( $id, 'address', $metadata['address'][0] );
				}

				echo '<div class="col-md-6">';
				echo "  <a href=\"{$website}\" target=\"_blank\" rel=\"noopener\">{$title}</a><i class=\"fa fa-map-marker\"></i>";
				echo '</div>';

			}
			wp_reset_postdata();
		} else {

			echo '<div>';
			echo '  <p>NO POSTS FOUND!!</p>';
			echo '</div>';

		}

		echo '          	<div class="clearBoth"></div>';
		echo '			</div>';
		echo '		</div>';
		echo '	</article>';
		echo '</section>';
	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Create the sustaining partners by tax
	 * @link https://codex.wordpress.org/Class_Reference/WP_Query
	 * @link https://developer.wordpress.org/reference/functions/get_terms/
	 * @param array $sustaining_tax - Custom tax_query array
	 * @return void
	 */

	public function gpsen_build_sustaining_partners_posts ( $sustaining_tax ) {

		$gpsen_sustaining_partners_posts_args = GPSEN_posts::gpsen_posts_tax_query_factory( $sustaining_tax, 'gpsen_partners', '-1', 'ASC', 'name' );
		$gpsen_sustaining_partners_posts_query = new WP_Query( $gpsen_sustaining_partners_posts_args );

		echo '<div class="greySections">';
		echo '	<div class="whiteCard">';

		if ( $gpsen_sustaining_partners_posts_query->have_posts() ) {
			while ($gpsen_sustaining_partners_posts_query->have_posts() ) {
				$gpsen_sustaining_partners_posts_query->the_post();

				$id = get_the_ID();
				$thumbnail = get_the_post_thumbnail_url( $id, 'large' );
				$metadata = get_post_meta( $id );
				$metadata = array_change_key_case($metadata);
				$website = '';

				if ( isset($metadata['website']) ) {
					update_post_meta( $id, 'website', $metadata['website'][0] );
					$website = $metadata['website'][0];
				}

				if ( isset($metadata['address']) ) {
					update_post_meta( $id, 'address', $metadata['address'][0] );
				}

				echo "<div class=\"col-md-4\">";
				echo "	<a href=\"{$website}\" target=\"_blank\" rel=\"noopener\">";
				echo "      <img class=\"img-responsive center-block sesc-sustaining-partner-img\" src=\"{$thumbnail}\" alt=\"\"/>";
				echo '	</a>';
				echo '</div>';

			}

			wp_reset_postdata();
		} else {

			echo '<div>';
			echo '  <p>NO POSTS FOUND!!</p>';
			echo '</div>';

		}

		echo '		<div class="clearBoth"></div>';
		echo '	</div>';
		echo '</div>';

	}

}
