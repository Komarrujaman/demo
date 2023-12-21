<section id="maps">
    <div class="row">
        <div class="col-12 grid-margin">
            <h2 class="text-center mb-5 fw-bold">Sebaran Perangkat Monitoring</h2>
            <div class="card shadow">
                <div class="p-2">
                    <div id="map">
                    </div>
                    <!-- <div class="card p-1 col-lg-3 col-md-3 col-sm-2 bg-white position-absolute mx-2" style="opacity: 0.7; top: 40%;">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach ($awsHome as $aws)
                                <li id="awsPoint">
                                    <input type="checkbox" checked>
                                    <label for="awsPoint">
                                        <i class="mdi mdi-map-marker text-danger"></i>
                                        {{$aws['nama']}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<hr>



@section('chart')
<script>
    var map = L.map('map', {
        center: [-10.1802349, 123.7354183],
        zoom: 12.29,
        zoomControl: true,
        scrollWheelZoom: true,
        minZoom: 6
    });
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 16,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap </a>Contributor'
    }).addTo(map);

    var awsIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<i class="mdi mdi-map-marker text-danger" style="font-size: 30px;"></i>',
        iconSize: [40, 30]
    });

    var wlIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<i class="mdi mdi-map-marker text-info" style="font-size: 30px;"></i>',
        iconSize: [40, 30]
    });

    var aws = @json($awsHome);
    var wl = @json($wlHome);

    var markers = {};

    wl.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng], {
            icon: wlIcon,
        }).addTo(map);

        markers[location.nama] = marker; // Simpan marker dalam objek markers

        var detailWl = `
        
        <div id="pop-up-details">
        <h4>${location.nama}</h4>
        <ul>
        <li>Water Level: <span>${parseFloat(location.water_level_value).toFixed(2)} m</span></li>
        <li>Water Pressure: <span>${parseFloat(location.water_pressure_value).toFixed(2)} kPa</span></li>
        <li>Diff Pressure: <span>${parseFloat(location.diff_pressure_value).toFixed(2)} kPa</span></li>
        <li>Water Temperature: <span>${parseFloat(location.water_temperature_value).toFixed(2)} °C</span></li>
        <li>Water Flow: <span>${parseFloat(location.water_flow_value).toFixed(2)} l/s</span></li>
        <li>Barometric Pressure: <span>${parseFloat(location.barometric_pressure_value).toFixed(2)} kPa</span></li>
        <li>Baterai: <span>${parseFloat(location.battery_value).toFixed(2)} V</span></li>
        </ul>
        </div>
        `;
        marker.bindPopup(detailWl).closePopup();
    });

    aws.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng], {
            icon: awsIcon,
        }).addTo(map);

        markers[location.nama] = marker; // Simpan marker dalam objek markers

        var detailAws = `
        <div id="pop-up-details">
        <h4>${location.nama}</h4>
        <ul>
        <li>Waktu Sensor: <span>${location.scaled_series_timestamp}</span></li>
        <li>Temperatur: <span>${parseFloat(location.temperature_value).toFixed(2)} °C</span></li>
        <li>Kelembaban: <span>${parseFloat(location.rh_value).toFixed(2)} %</span></li>
        <li>Solar Rad: <span>${parseFloat(location.solar_radiation_value).toFixed(3)} W/m²</span></li>
        <li>Kecepatan Angin: <span>${parseFloat(location.wind_speed_value).toFixed(2)} m/s</span></li>
        <li>Gust Speed: <span>${parseFloat(location.gust_speed_value).toFixed(2)} m/s</span></li>
        <li>Arah Angin: <span>${parseFloat(location.wind_direction_value).toFixed(2)} deg</span></li>
        <li>Dew Point: <span>${parseFloat(location.dew_point_value).toFixed(2)} deg</span></li>
        <li>Curah Hujan: <span>${parseFloat(location.rain_value).toFixed(2)} mm</span></li>
        <li>Baterai: <span>${parseFloat(location.scaled_series_value).toFixed(2)} V</span></li>
        </ul>
        </div>
        `;
        marker.bindPopup(detailAws).closePopup();
    });
    // Mendengarkan perubahan pada checkbox
    var checkbox = document.getElementById('awsPoint');
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // Checkbox dicentang, tambahkan marker
            map.addLayer(markers['awsPoint']);
        } else {
            // Checkbox tidak dicentang, hilangkan marker
            map.removeLayer(markers['awsPoint']);
        }
    });
</script>
@endsection