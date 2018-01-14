<?php

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Create improvements to SEO
 * Class GPSEN_seo
*/

class GPSEN_seo {

	public function init () {

		add_action( 'wp_head', [$this, 'gpsen_seo_json_ld_head'] );


	}

	public function gpsen_seo_json_ld_head () {

		$json_ld = [
			"@context" => "http://schema.org",
			"@type" => "NGO",
			"address" => [
				"@context" => "http://schema.org",
				"@type" => "PostalAddress",
				"addressLocality" => "Portland",
				"addressRegion" => "OR",
				"addressCountry" => "USA",
				"postalCode" => "97219",
				"streetAddress" => "PCC Sylvania SS 201 12000 SW 49th Ave.",
		    ],
			"email" => "contact@gpsen.org",
			"name" => "Greater Portland Sustainability Education Network",
			"telephone" => "503-956-6283",
			"url" => "http://gpsen.org/",
			"sameAs" => "https://www.rcenetwork.org/portal/rce-greater-portland",
			"logo" => [
				"@context" => "http://schema.org",
				"@type" => "ImageObject",
				"contentUrl" => "http://gpsen.org/wp-content/uploads/2015/07/logoSmall.jpg",
				"name" => "Greater Portland Sustainability Education Network Logo",
			],
			"memberOf" => [
				"@context" => "http://schema.org",
                "@type" => "NGO",
				"name" => "Regional Centres of Expertise on Education for Sustainable Development",
				"logo" => [
					"@context" => "http://schema.org",
                    "@type" => "ImageObject",
					"contentUrl" => "http://gpsen.org/wp-content/uploads/2015/09/RCELogo.jpg",
					"name" => "Regional Centres of Expertise on Education for Sustainable Development Logo"
				]
			],
		];

		$json_ld_encoded = json_encode($json_ld);

		echo "<script type=\"application/ld+json\">{$json_ld_encoded}</script>";

	}


	public function gspen_seo_json_ld_events () {

	}


}
