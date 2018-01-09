/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary All of the functions to build the map
 * @return {object} init
 */

var gpsenPartnerMap = (function() {

	// Check to see if the browser supports passive scrolling
	var supportsPassive = false;

	var modifiedArray = [];
	var counterArray = [];
	var tempArrays;

	var init = function () {
		getPartners();
	};


	/**
	 * @summary Call REST API for posts
	 * @param queryString
	 * @returns {Promise}
	 */

	var fetchPromise = function (queryString) {

		return new Promise(function(resolve, reject) {
			var httpRequest;

			httpRequest = new XMLHttpRequest();

			if (!httpRequest) {
				return false;
			}

			httpRequest.onreadystatechange = function () {
				var checkForRequestDone = httpRequest.readyState === XMLHttpRequest.DONE;
				var checkForStatus200 = httpRequest.status === 200;

				if (checkForRequestDone) {
					if (checkForStatus200) {
						resolve(httpRequest.responseText);
					} else {
						console.warn('There was an issue with the REST request' + httpRequest.err);
					}
				}
			};

			httpRequest.open('GET', queryString);
			// if error reject promise
			httpRequest.onerror = function() {
				reject(httpRequest.statusText);
			};
			httpRequest.send();
		});
	};


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build out Promise chain here
	 * @return void
	 */

	var getPartners = function() {
		var queryString = 'http://gpsen.org/wp-json/wp/v2/gpsen_partners?_embed&per_page=50';

		fetchPromise(queryString)
			.then(function(json) {
				buildMap(json);
			})
			.catch(function(err) {
				console.log('There was an error in your promise: ' + err);
			});
	};


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Change the meta key to lowercase
	 * @param json
	 * @param oldKey
	 * @param newKey
	 * @returns {*}
	 */

	var changeKeysToLower = function (json, oldKey, newKey) {
		for (var add = 0; add < json.length; add++) {

			if (oldKey !== newKey && json[add]['post-meta-fields'][oldKey]) {

				Object.defineProperty(json[add]['post-meta-fields'], newKey,
					Object.getOwnPropertyDescriptor(json[add]['post-meta-fields'], oldKey));
				delete json[add]['post-meta-fields'][oldKey];

			}

		}

		return json;
	};


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build the map here
	 * @param json
	 * @return Promise
	 */

	var buildMap = function (json) {
		var infoWindow = new google.maps.InfoWindow;
		var marker, add;

		json = JSON.parse(json);
		json = changeKeysToLower(json, 'Address', 'address');
		json = changeKeysToLower(json, 'Website', 'website');
		json = changeKeysToLower(json, 'Latitude', 'latitude');
		json = changeKeysToLower(json, 'Longitude', 'longitude');

		var initialize = function () {
			// Create the map
			var map = new google.maps.Map(document.getElementById('gpsen-partners-map'), {
				zoom: 10,
				center: new google.maps.LatLng(45.523375, -122.676201),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			// Set the map back center when the user closes the infoWindow
			google.maps.event.addListener(infoWindow, 'closeclick', function () {
				map.setCenter(this.getPosition());
			});

			// Loop through the JSON and create the markers
			for (add = 0; add < json.length; add++) {
				var isLatDefined;
				var isLngDefined;

				// Make sure key and functions exist
				if (typeof json[add]['post-meta-fields'].address === 'undefined') {
					continue;
				}

				if (typeof json[add]._embedded['wp:featuredmedia'] === 'undefined') {
					continue;
				}

				if (typeof json[add]['post-meta-fields'].latitude[0] === 'string') {
					isLatDefined = json[add]['post-meta-fields'].latitude[0];
				} else {
					continue;
				}

				if (typeof json[add]['post-meta-fields'].longitude[0]  === 'string') {
					isLngDefined = json[add]['post-meta-fields'].longitude[0];
				} else {
					continue;
				}

				// Create each marker
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(Number(isLatDefined), Number(isLngDefined)),
					map: map,
					id: add

				});

				google.maps.event.addListener(marker, 'click', (function (marker, add) {

					// Play defensive
					var featuredImage = json[add]._embedded['wp:featuredmedia'][0].source_url;
					var isFeaturedImage = (featuredImage) ? featuredImage : '';

					var title = json[add].title.rendered;
					var isTitle = (title) ? title : '';

					var address = json[add]['post-meta-fields'].address[0];
					var isAddress = (address) ? address : '';

					var website = json[add]['post-meta-fields'].website;
					var isWebsite = (website) ? website : '';

					return function () {
						infoWindow.setContent(
							'<img src="' + isFeaturedImage + '">'
							+ '<span>'
							+ '<p style="margin: 1em 0 0 0;"><strong>' + isTitle + '</strong></p>'
							+ '<p style="margin: 0 0 0 0;"><strong>' + isAddress + '</strong></p>'
							+ '<p style="margin: 0 0 0 0;"><strong>Website: </strong>' + '<a href="' + isWebsite + '" target="_blank">' + isWebsite + '</a>' + '</p>'
							+ '</span>'
							+ '<div class="clearBoth"></div>'
						);
						infoWindow.open(map, marker);
					}; // end return function
				})(marker, add));
			} // end for

			// To add the marker to the map, call setMap();
			marker.setMap(map);
		}; // End initialize();

		initialize();
		// google.maps.event.addDomListener(window, 'loaded', initialize, supportsPassive ? { passive: true } : false);

	};

	return {
		init: init
	}
})();

gpsenPartnerMap.init();
