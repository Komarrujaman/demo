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
                                    <h4><span>12/12/23 - 12:28:22</span></h4>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h2><i class="bi bi-water"></i> <span>{{ isset($wl['water_level_value']) ? number_format($wl['water_level_value'], 2) : 'N/A' }} m</span></h2>
                                            <h6><span>Water Pressure : {{ isset($wl['water_pressure_value']) ? number_format($wl['water_pressure_value'], 2) : 'N/A' }} kPa</span></h6>
                                            <h6><span>Diff Pressure : {{ isset($wl['diff_pressure_value']) ? number_format($wl['diff_pressure_value'], 2) : 'N/A' }} </span></h6>
                                            <h6><span>Water Temperature : {{ isset($wl['water_temperature_value']) ? number_format($wl['water_temperature_value'], 2) : 'N/A' }} °C</span></h6>
                                            <h6><span>Water Flow : {{ isset($wl['water_flow_value']) ? number_format($wl['water_flow_value'], 2) : 'N/A' }} l/s</span></h6>
                                            <h6><span>Barometric Pressure : {{ isset($wl['barometric_pressure_value']) ? number_format($wl['barometric_pressure_value'], 2) : 'N/A' }} kPa</span></h6>
                                            <h6><i class="bi bi-battery-charging"></i> <span>Baterai : {{ isset($wl['battery_value']) ? number_format($wl['battery_value'], 2) : 'N/A' }} V</span></h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-top mb-0 mt-2">
                                        <div class="ms-auto">
                                            <a href="{{url('wl-details')}}" class="btn rounded-pill btn-sm btn-gradient-success shadow">Location</a>
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