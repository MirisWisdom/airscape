
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/map.js');

const app = new Vue({
    el: '#app'
});

var mapContainer = document.getElementById('map');
var mapInput = document.getElementById('autocomplete');

window.initMap = function(){
	map = new google.maps.Map(mapContainer, 
		{
		center: {
			lat: -34.397,
			lng: 150.644
		},
		zoom: 8
    });

    var input = mapInput;

    var autocomplete = new google.maps.places.Autocomplete(input);

    var marker = new google.maps.Marker({
      map: map,
      anchorPoint: new google.maps.Point(-34.397, 150.644)
    });

    autocomplete.addListener('place_changed', function() {
      
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);

      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

    });
}
