
/**
 *
 */

var gpsenPartnerMap = (function() {

	// Check to see if the browser supports passive scrolling
	var supportsPassive = false;

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
						// console.log(JSON.parse(httpRequest.responseText));
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
	 * @summary Build out Promise chain here
	 */

	var getPartners = function() {
		var queryString = 'http://localhost/gpsen/wp-json/wp/v2/gpsen_partners?_embed';

		fetchPromise(queryString)
			.then(function(json) {
				// Return JSON with latitudes and longitudes added to rest response
				json = decodeAddresses(json);
				return json;
			})
			.then(function(json) {
				// Final JSON for maps api
				// var postJSON = JSON.parse(json);
				buildMap(json);
			})
			.catch(function(err) {
				console.log('There was an error in your promise ' + err.message);
			});
	};

	/**
	 *
	 * @param json
	 * @return {object} json - JSON with latitudes and longitudes added to rest response
	 */

	var decodeAddresses = function (json) {

		// @todo find a way to reject promise
		return new Promise(function(resolve, reject) {

			json = JSON.parse(json);
			console.log(json);
			for (var add = 0; add < json.length; add++) {
				(function(add) {
					var currentAddress;
					currentAddress = json[add]['post-meta-fields'].Address[0];

					var geocoder = new google.maps.Geocoder();

					if (geocoder) {

						geocoder.geocode({
							address: currentAddress
						}, function (results, status) {
							if (status === google.maps.GeocoderStatus.OK) {
								if (currentAddress !== undefined) {
									json[add]['post-meta-fields'].Address.push(results[0].geometry.location);
								}

								var isCompleted = json.length;

								if (isCompleted) {
									console.log('completed');
									resolve(json);
								}
							}
							else {
								throw('No results found: ' + status);
							}
						});
					}
				})(add);
			}
		});
	};

	var detectPassive = function() {
		// Test via a getter in the options object to see if the passive property is accessed
		try {
			var opts = Object.defineProperty({}, 'passive', {
				get: function() {
					supportsPassive = true;
				}
			});
			window.addEventListener("testPassive", null, opts);
			window.removeEventListener("testPassive", null, opts);
		} catch (e) {}

	};

	var buildMap = function (json) {

		var infoWindow = new google.maps.InfoWindow;
		var marker, add;

		// Check passive detection
		detectPassive();

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
				console.log(json[add]['post-meta-fields'].Address[1]);
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(json[add]['post-meta-fields'].Address[1].lat(), json[add]['post-meta-fields'].Address[1].lng()),
					map: map,
					id: add

				});

				google.maps.event.addListener(marker, 'click', (function (marker, add) {
					return function () {
						infoWindow.setContent(
							'<img src="' + json[add]._embedded['wp:featuredmedia'][0].source_url + '">'
							+ '<span>'
							+ '<p><strong>' + json[add].title.rendered + '</strong></p>'
							+ '<p><strong>' + json[add]['post-meta-fields'].Address[0] + '</strong></p>'
							+ '<p>Website: ' + '<a href="' + json[add]['post-meta-fields'].Website + '" target="_blank">' + json[add]['post-meta-fields'].Website + '</a>' + '</p>'
							+ '</span>'
							+ '<div class="clearBoth"></div>'
						);
						infoWindow.open(map, marker);
					}; // end return function
				})(marker, add));
			} // end for

			// To add the marker to the map, call setMap();
			marker.setMap(map);
		};

		// When the window is loaded create the map
		google.maps.event.addDomListener(window, 'load', initialize, supportsPassive ? { passive: true } : false);

	};

	return {
		init: init
	}

})();

gpsenPartnerMap.init();