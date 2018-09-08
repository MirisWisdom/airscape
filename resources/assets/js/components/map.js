Vue.component('seascape-map', {

	props: [],

	data() {
		return {
			mapContainer : document.getElementById('map'),
			mapInput : document.getElementById('autocomplete')
		}
	},

	methods: {

		initMap(){

			var self = this 

			map = new google.maps.Map(self.mapContainer, 
				{
				center: {
					lat: -34.397,
					lng: 150.644
				},
				zoom: 8
		    });

		    var input = self.mapInput;

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

		},

		searchLocation(submitEvent){

			var self = this 

			var form = submitEvent.target
            var formData = new FormData(form)

			axios.post('/vue/search/store', formData).then(function(response){

				// Do something here

			})
			.catch(error => {

				console.log(error);

			});

		}

	},

	mounted: function() {

		


	},

	computed: {


	},

	updated: function() {


	},

	watch: {


	}

});