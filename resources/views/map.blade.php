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
                            <small>For a working example, type "Canberra"!</small>
                        </div>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div v-if="results != null">
                        <table class="table table-hover text-monospace">
                            <tr>
                                <td><small>Longitude</small></td>
                                <td><small>@{{ results.long }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Latitude</small></td>
                                <td><small>@{{ results.lat }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Wind Direction</small></td>
                                <td><small>@{{ results.wind_direction ? results.wind_direction : 'N/A' }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Particulant Matter 10</small></td>
                                <td><small>@{{ results.pm10 ? results.pm10 : 'N/A' }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Particulant Matter 2.5</small></td>
                                <td><small>@{{ results.pm2_5 ? results.pm2_5 : 'N/A' }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Carbon Dioxide</small></td>
                                <td><small>@{{ results.co ? results.co : 'N/A' }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Nitrogen Dioxide</small></td>
                                <td><small>@{{ results.no2 ? results.no2 : 'N/A' }}</small></td>
                            </tr>
                            <tr>
                                <td><small>Ozone</small></td>
                                <td><small>@{{ results.o3 ? results.o3 : 'N/A' }}</small></td>
                            </tr>
                            <tr v-if="results.site < 33" class="bg-success">
                                <td><small>Pollution Score</small></td>
                                <td><small>@{{ results.site ? results.site : 'N/A' }} (Very good)</small></td>
                            </tr>
                            <tr v-if="results.site > 33 && results.site < 66" class="bg-success">
                                <td><small>Pollution Score</small></td>
                                <td><small>@{{ results.site ? results.site : 'N/A' }} (Good)</small></td>
                            </tr>
                            <tr v-if="results.site > 67 && results.site < 99" class="bg-warning">
                                <td><small>Pollution Score</small></td>
                                <td><small>@{{ results.site ? results.site : 'N/A' }} (Fair)</small></td>
                            </tr>
                            <tr v-if="results.site > 100 && results.site < 149" class="bg-warning">
                                <td><small>Pollution Score</small></td>
                                <td><small>@{{ results.site ? results.site : 'N/A' }} (Poor)</small></td>
                            </tr>
                            <tr v-if="results.site > 150" class="bg-danger">
                                <td><small>Pollution Score</small></td>
                                <td><small>@{{ results.site ? results.site : 'N/A' }} (Very poor)</small></td>
                            </tr>
                        </table>
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