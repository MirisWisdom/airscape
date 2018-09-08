<seascape-map inline-template ref="map">

    <div>
        <div class="container-fluid" id="mapContainer">
            <div class="row">
                <div class="col-sm-5 col-md-4 col-lg-3 full-height text-light text-center py-5 shadow"
                     id="sidebar">
                    <form v-on:submit.prevent="searchLocation($event)" ref="searchForm">
                        <div class="form-group required">
                            <h2>Data Querying</h2>
                            <label for="autocomplete" class="mt-4">
                                Type your location:
                            </label>
                            <input class="geocomplete" name="location" id="autocomplete"/>
                        </div>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-secondary btn-block text-light position-absolute"
                           style="bottom: 0; left: 0; border-radius: 0"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @endauth
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 full-height" id="map">
                </div>
            </div>
        </div>
	</div>

</seascape-map>