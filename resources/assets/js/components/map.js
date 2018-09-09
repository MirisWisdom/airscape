Vue.component('seascape-map', {

	props: [],

	data() {
		return {
			location: {},
			results: null,
 		}
	},

	methods: {

		initMap(){

			var self = this 

			map = new google.maps.Map(document.getElementById('map'), 
				{
				center: {
					lat: -34.397,
					lng: 150.644
				},
				zoom: 8
		    });

		    var input = document.getElementById('autocomplete');

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

		      self.location = place
		      self.searchLocation()

		    });

		},

		searchLocation(){
			var self = this

            var formData = {
				'location': self.location.formatted_address,
				'lat': self.location.geometry.location.lat(),
                'lng': self.location.geometry.location.lng()
			}

			axios.post('/vue/search/store', formData).then(function(response){
				self.results = response.data[0]
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
		results(){
            let msg = 'The location you have typed is ' + this.location.formatted_address
                + '. Its Particulant Matter values is ' + this.results.pm10
                + '. Its Nitrogen Dioxide value is' + this.results.no2

            let synth = new SpeechSynthesisUtterance(msg);
            window.speechSynthesis.speak(synth);
		}
	}
});