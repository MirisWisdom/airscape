<seascape-map inline-template ref="map">
    <div>
        <div class="container-fluid" id="mapContainer">
            <div class="row">
                <div class="col-md-3 full-height text-light text-center py-5 shadow"
                     id="sidebar"
                     v-bind:class="{ 'col-md-9': results != null }">
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
                    <div v-if="results != null">
                        <table class="table table-hover">
                            <tr>
                                <td>Longitude</td>
                                <td>@{{ results.long }}</td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td>@{{ results.lat }}</td>
                            </tr>
                            <tr>
                                <td>Wind Direction</td>
                                <td>@{{ results.wind_direction ? results.wind_direction : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Particulant Matter 10</td>
                                <td>@{{ results.pm10 ? results.pm10 : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Particulant Matter 2.5</td>
                                <td>@{{ results.pm2_5 ? results.pm2_5 : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Carbon Dioxide</td>
                                <td>@{{ results.co ? results.co : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Nitrogen Dioxide</td>
                                <td>@{{ results.no2 ? results.no2 : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td>Ozone</td>
                                <td>@{{ results.o3 ? results.o3 : 'N/A' }}</td>
                            </tr>
                        </table>
                        {{--@{{ results }}--}}
                    </div>

                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-secondary btn-block text-light position-absolute"
                           style="bottom: 0; left: 0; border-radius: 0"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @endauth
                </div>
                <div class="col-md full-height" id="map">
                </div>
            </div>
        </div>
    </div>
</seascape-map>