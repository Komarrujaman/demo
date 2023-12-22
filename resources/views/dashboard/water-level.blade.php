<section id="water-level">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card" style="background-color: transparent;">
                <div class="card-body">
                    <h2 class="text-center mb-5 fw-bold">Tinggi Muka Air</h2>
                    <div class="row">
                        @foreach ($wlHome as $wl )
                        <div class="col-lg-4 grid-margin">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3 class="w-full text-center mb-5 mt-3">
                                        {{$wl['nama']}}
                                    </h3>
                                    <h4><span>{{ isset($wl['battery_timestamp']) ? $wl['battery_timestamp'] : 'N/A' }}</span></h4>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h2><i class="bi bi-water"></i> <span><?php
                                                                                    if (isset($wl['jenis_water_level']) && $wl['jenis_water_level'] === 'VNOTCH') {
                                                                                        // Jika jenis_water_level adalah VNOTCH, konversi nilai ke cm dan kurangi 21
                                                                                        $converted_value = isset($wl['water_level_value']) ? number_format(($wl['water_level_value'] * 100) - 21, 2) : 'N/A';
                                                                                        echo $converted_value . ' cm';
                                                                                    } else {
                                                                                        // Jika jenis_water_level bukan VNOTCH, tampilkan nilai dalam meter
                                                                                        $value_to_display = isset($wl['water_level_value']) ? number_format($wl['water_level_value'], 2) : 'N/A';
                                                                                        echo $value_to_display . ' m';
                                                                                    }
                                                                                    ?></span></h2>
                                            <h6><span>Water Pressure : {{ isset($wl['water_pressure_value']) ? number_format($wl['water_pressure_value'], 2) : 'N/A' }} kPa</span></h6>
                                            <h6><span>Diff Pressure : {{ isset($wl['diff_pressure_value']) ? number_format($wl['diff_pressure_value'], 2) : 'N/A' }} kPa</span></h6>
                                            <h6><span>Water Temperature : {{ isset($wl['water_temperature_value']) ? number_format($wl['water_temperature_value'], 2) : 'N/A' }} °C</span></h6>
                                            <h6><span>Water Flow : {{ isset($wl['water_flow_value']) ? number_format($wl['water_flow_value'], 2) : 'N/A' }} l/s</span></h6>
                                            <h6><span>Barometric Pressure : {{ isset($wl['barometric_pressure_value']) ? number_format($wl['barometric_pressure_value'], 2) : 'N/A' }} kPa</span></h6>
                                            <h6><i class="bi bi-battery-charging"></i> <span>Baterai : {{ isset($wl['battery_value']) ? number_format($wl['battery_value'], 2) : 'N/A' }} V</span></h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-top mb-0 mt-2">
                                        <div class="ms-auto">
                                            <a href="https://www.google.com/maps?q={{$wl['lat']}},{{$wl['lng']}}" class="btn rounded-pill btn-sm btn-gradient-success shadow" target="_blank">Location</a>
                                            <a href="{{url('wl-details')}}" class="btn rounded-pill btn-sm btn-gradient-primary shadow">Detail</a>
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