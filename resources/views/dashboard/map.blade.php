<section id="maps">
    <div class="row">
        <div class="col-12 grid-margin">
            <h2 class="text-center mb-5 fw-bold">Sebaran Pos Hidrologi</h2>
            <div class="card shadow">
                <div class="p-2">
                    <div id="map">
                    </div>
                    <div class="card p-1 col-lg-3 col-md-3 col-sm-2 bg-white position-absolute mx-2" style="opacity: 0.7; top: 40%;">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <input type="checkbox" name="pos-PCH" id="pos-PCH" checked>
                                    <label for="pos-PCH">
                                        <i class="mdi mdi-map-marker text-danger"></i>
                                        Pos Stasiun PCH
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>



@section('chart')
<script>
    var map = L.map('map', {
        center: [-9.8038293, 122.9561344],
        zoom: 7.75,
        zoomControl: true,
        scrollWheelZoom: false,
        minZoom: 6
    });
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 16,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap </a>Contributor'
    }).addTo(map);

    var myIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<i class="mdi mdi-map-marker text-danger" style="font-size: 30px;"></i>',
        iconSize: [40, 30]
    });
    var marker = L.marker([-10.1708106, 123.7428295], {
        icon: myIcon,
    }).addTo(map);

    // Mendengarkan perubahan pada checkbox
    var checkbox = document.getElementById('pos-PCH');
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // Checkbox dicentang, tambahkan marker
            map.addLayer(marker);
        } else {
            // Checkbox tidak dicentang, hilangkan marker
            map.removeLayer(marker);
        }
    });

    var detailAws = `
    <div id="pop-up-details">
        <h4>Nama Lokasi</h4>
        <ul>
            <li>Waktu Sensor: <span>12/12/23 - 12:12</span></li>
            <li>Temperatur: <span>30° C</span></li>
            <li>Kelembaban: <span>20 %</span></li>
            <li>Kecepatan Angin: <span>21.2 m/s</span></li>
            <li>Arah Angin: <span>90 deg(T)</span></li>
            <li>Curah Hujan: <span>50 mm</span></li>
            <li>Solar Rad: <span>0.02 W/m2</span></li>
            <li>Tekanan: <span>1.222 mbar</span></li>
        </ul>
    </div>
    `;
    marker.bindPopup(detailAws).closePopup();
</script>
@endsection