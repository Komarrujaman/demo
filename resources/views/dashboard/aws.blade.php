<section id="aws">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card" style="background-color: transparent;">
                <div class="card-body">
                    <h2 class="text-center mb-5 fw-bold">Automatic Weather Station (AWS)</h2>
                    <div class="row">
                        @foreach ($awsHome as $aws )
                        <div class="col-lg-4 grid-margin">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3 class="w-full text-center mb-5 mt-3">
                                        {{$aws['nama']}}
                                    </h3>
                                    <h4><span>{{ isset($aws['scaled_series_timestamp']) ? $aws['scaled_series_timestamp'] : 'N/A' }}</span></h4>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h5><i class="bi bi-thermometer"></i> <span>Temperature : {{ isset($aws['temperature_value']) ? number_format($aws['temperature_value'], 2) : 'N/A' }} °C </span></h5>
                                            <h5><i class="bi bi-moisture"></i> <span>Kelembaban : {{ isset($aws['rh_value']) ? number_format($aws['rh_value'], 2) : 'N/A' }}%</span></h5>
                                            <h5><i class="bi bi-brightness-high-fill"></i> <span>Solar Rad : {{ isset($aws['solar_radiation_value']) ? number_format($aws['solar_radiation_value'], 3) : 'N/A' }} W/m²</span></h5>
                                            <h5><i class="bi bi-wind"></i> <span>Kecepatan Angin : {{ isset($aws['wind_speed_value']) ? number_format($aws['wind_speed_value'], 2) : 'N/A' }} m/s</span></h5>
                                            <h5><i class="bi bi-wind"></i> <span>Gust Speed : {{ isset($aws['gust_speed_value']) ? number_format($aws['gust_speed_value'], 2) : 'N/A' }} m/s</span></h5>
                                            <h5><i class="bi bi-compass"></i> <span>Arah Angin : {{ isset($aws['wind_direction_value']) ? number_format($aws['wind_direction_value'], 2) : 'N/A' }} deg</span></h5>
                                            <h5><i class="bi bi-compass"></i> <span>Dew Point : {{ isset($aws['dew_point_value']) ? number_format($aws['dew_point_value'], 2) : 'N/A' }} °C</span></h5>
                                            <h5><i class="bi bi-cloud-rain-fill"></i> <span>Curah Hujan : {{ isset($aws['rain_value']) ? number_format($aws['rain_value'], 2) : 'N/A' }} mm</span></h5>
                                            <h5><i class="bi bi-battery-charging"></i> <span>Baterai : {{ isset($aws['scaled_series_value']) ? number_format($aws['scaled_series_value'], 2) : 'N/A' }} V</span></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-top mb-0 mt-2">
                                        <div class="ms-auto">
                                            <a href="https://www.google.com/maps?q={{$aws['lat']}},{{$aws['lng']}}" class="btn rounded-pill btn-sm btn-gradient-success shadow" target="_blank">Location</a>
                                            <a href="{{ url('aws-details', ['sn' => $aws['sn']]) }}" class="btn rounded-pill btn-sm btn-gradient-primary shadow">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>