<?php

class GPSEN_admin_mods {


	public function init () {
		add_action('restrict_manage_posts', [$this, 'gpsen_filter_new_archives_by_taxonomy'] );
		add_filter('parse_query', [$this, 'gpsen_convert_news_archives_id_to_term_in_query'] );

		add_action('restrict_manage_posts', [$this, 'gpsen_filter_partners_by_taxonomy'] );
		add_filter('parse_query', [$this, 'gpsen_convert_partners_id_to_term_in_query'] );

	}


	/**
	 * Display a custom taxonomy dropdown in admin
	 * @author Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */

	public function gpsen_filter_new_archives_by_taxonomy() {
		global $typenow;
		$post_type = 'gpsen_news_archives'; // change to your post type
		$taxonomy  = 'gpsen_news_archives_categories'; // change to your taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}
	/**
	 * Filter posts by taxonomy in admin
	 * @author  Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */

	public function gpsen_convert_news_archives_id_to_term_in_query($query) {
		global $pagenow;
		$post_type = 'gpsen_news_archives'; // change to your post type
		$taxonomy  = 'gpsen_news_archives_categories'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

	/**
	 * Display a custom taxonomy dropdown in admin
	 * @author Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */

	public function gpsen_filter_partners_by_taxonomy() {
		global $typenow;
		$post_type = 'gpsen_partners'; // change to your post type
		$taxonomy  = 'partners_categories'; // change to your taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}
	/**
	 * Filter posts by taxonomy in admin
	 * @author  Mike Hemberger
	 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
	 */

	public function gpsen_convert_partners_id_to_term_in_query($query) {
		global $pagenow;
		$post_type = 'gpsen_partners'; // change to your post type
		$taxonomy  = 'partners_categories'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

}