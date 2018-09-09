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
                            <small>For a working example, type "Florey ACT" or "Monash ACT"!</small>
                            <hr>
                            <div class="text-left">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="pm10" v-model="pm10" />
                                    <label class="form-check-label" for="pm10">Partic. Matter 10</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="pm2_5" v-model="pm2_5" />
                                    <label class="form-check-label" for="pm2_5">Partic. Matter 2.5</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="co2" v-model="co2" />
                                    <label class="form-check-label" for="co2">Carbon Dioxide</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="no2" v-model="no2" />
                                    <label class="form-check-label" for="no2">Nitrogen Dioxide</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="o2" v-model="o2" />
                                    <label class="form-check-label" for="o2">Ozone</label>
                                </div>
                            </div>
                            <div class="text-center" v-if="results == null">
                                <hr>
                                <h5>Search History</h5>
                                @foreach($searches as $i => $search)
                                    <button class="btn btn-outline-light btn-sm btn-block text-left text-monospace mb-1"
                                            onclick="setSearch({{ $i }})"
                                            id="button{{ $i }}"
                                            disabled>
                                        <small>{{ $search->location }}</small>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <div v-if="loading == true">
                        Loading data...
                    </div>

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
                            <tr v-if="pm10 == true">
                                <td><small>Particulant Matter 10</small></td>
                                <td><small>@{{ results.pm10 ? results.pm10 : 'N/A' }}</small></td>
                            </tr>
                            <tr v-if="pm2_5 == true">
                                <td><small>Particulant Matter 2.5</small></td>
                                <td><small>@{{ results.pm2_5 ? results.pm2_5 : 'N/A' }}</small></td>
                            </tr>
                            <tr v-if="co2 == true">
                                <td><small>Carbon Dioxide</small></td>
                                <td><small>@{{ results.co ? results.co : 'N/A' }}</small></td>
                            </tr>
                            <tr v-if="no2 == true">
                                <td><small>Nitrogen Dioxide</small></td>
                                <td><small>@{{ results.no2 ? results.no2 : 'N/A' }}</small></td>
                            </tr>
                            <tr v-if="o2 == true">
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

                    <div class="text-center my-5">
                        <label for="onoffswitch">Audio:</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" v-model="audio" checked>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>

                    <div class="text-center my-5" v-if="results != null">
                        <button class="btn btn-dark text-white" v-on:click="clearSearch()">Clear Search</button>
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

<script>
    function setSearch(id)
    {
        let text = $('#button' + id).text()
        $('#autocomplete').val(text)
    }
</script>