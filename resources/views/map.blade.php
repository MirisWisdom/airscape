<seascape-map inline-template >

	<div>
		<div class="container-fluid">

			<div class="row">

				<div class="col-sm-5 col-md-4 col-lg-3 full-height bg-light text-black text-center py-5 shadow">

					<form v-on:submit.prevent="searchLocation($event)">

						<div class="form-group required">

							<label for="location">
								<h2>
									Location
								</h2>
							</label>
							<input class="form-control form-control-lg geocomplete" name="location" id="autocomplete" />

						</div>

					</form>

				</div>

				<div class="col-sm-7 col-md-8 col-lg-9 full-height" id="map">

				</div>

			</div>

		</div>
	</div>

</map>