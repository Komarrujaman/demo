@extends('layouts.main', ['title' => 'Riwayat AWS'])

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-chart"></i>
        </span> Laporan & Riwayat AWS
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$aws->nama}}</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="card col-12" style="background-color: transparent;">
        <div class="card-body">
            <!-- <form action="" class="form-control">
                <div class="d-flex flex-row">
                    <input type="text" name="dates" id="date" class="form-control w-25 text-black">
                    <button type="submit" class="btn btn-sm btn-gradient-primary ms-2">Filter</button>
                </div>
            </form> -->
            <div id="temp" class="w-full" style="height:300px"></div>
        </div>
    </div>

    <div class="card col-12" style="background-color: transparent;">
        <div class="card-body">
            <!-- <form action="" class="form-control">
                <div class="d-flex flex-row">
                    <input type="text" name="dates" id="date" class="form-control w-25 text-black">
                    <button type="submit" class="btn btn-sm btn-gradient-primary ms-2">Filter</button>
                </div>
            </form> -->
            <div id="hum" class="w-full" style="height:300px"></div>
        </div>
    </div>

    <div class="card col-12" style="background-color: transparent;">
        <div class="card-body">
            <!-- <form action="" class="form-control">
                <div class="d-flex flex-row">
                    <input type="text" name="dates" id="date" class="form-control w-25 text-black">
                    <button type="submit" class="btn btn-sm btn-gradient-primary ms-2">Filter</button>
                </div>
            </form> -->
            <div id="solar" class="w-full" style="height:300px"></div>
        </div>
    </div>
</div>

<!-- Pressure & Windspeed -->

@endsection


@section('chart')
<script>
    // Chart
    var temp = <?php echo json_encode($temperature) ?>;
    var data = [];

    // Loop through each element in the PHP array and push it to the JavaScript array
    temp.forEach(function(tempItem) {
        var timestamp = new Date(tempItem.timestamp);
        var temperature = parseFloat(tempItem.si_value).toFixed(2);

        // Store timestamp and temperature as an object
        var dataPoint = {
            timestamp: timestamp,
            temperature: temperature
        };

        data.push(dataPoint);
    });

    // Sort data based on timestamp in ascending order
    data.sort(function(a, b) {
        return a.timestamp - b.timestamp;
    });

    // Create the chart
    Highcharts.chart('temp', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Temperature'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                format: '{value:%d/%m/%Y}' // Format the x-axis labels as desired
            }
        },
        yAxis: {
            title: {
                text: 'Value'
            }
        },
        series: [{
            name: 'Temperature',
            data: data.map(function(point) {
                return [point.timestamp.getTime(), parseFloat(point.temperature)];
            })
        }],
    });
</script>

<!-- Hum -->
<script>
    // Chart
    var hum = <?php echo json_encode($hum) ?>;
    var data = [];

    // Loop through each element in the PHP array and push it to the JavaScript array
    hum.forEach(function(humItem) {
        var timestamp = new Date(humItem.timestamp);
        var humidity = parseFloat(humItem.si_value).toFixed(2);

        // Store timestamp and humerature as an object
        var dataPoint = {
            timestamp: timestamp,
            humidity: humidity
        };

        data.push(dataPoint);
    });

    // Sort data based on timestamp in ascending order
    data.sort(function(a, b) {
        return a.timestamp - b.timestamp;
    });

    // Create the chart
    Highcharts.chart('hum', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Humidity'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                format: '{value:%d/%m/%Y}' // Format the x-axis labels as desired
            }
        },
        yAxis: {
            title: {
                text: 'Value'
            }
        },
        series: [{
            name: 'Humidity',
            data: data.map(function(point) {
                return [point.timestamp.getTime(), parseFloat(point.humidity)];
            })
        }],
    });
</script>
<!-- End Hum -->


<!-- Solar Radiation -->
<script>
    // Chart
    var solar = <?php echo json_encode($solar_rad) ?>;
    var data = [];

    // Loop through each element in the PHP array and push it to the JavaScript array
    solar.forEach(function(solarItem) {
        var timestamp = new Date(solarItem.timestamp);
        var solar_rad = parseFloat(solarItem.si_value).toFixed(2);

        // Store timestamp and solarerature as an object
        var dataPoint = {
            timestamp: timestamp,
            solar_rad: solar_rad
        };

        data.push(dataPoint);
    });

    // Sort data based on timestamp in ascending order
    data.sort(function(a, b) {
        return a.timestamp - b.timestamp;
    });

    // Create the chart
    Highcharts.chart('solar', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Solar Radiation',
        },
        xAxis: {
            type: 'datetime',
            labels: {
                format: '{value:%d/%m/%Y}' // Format the x-axis labels as desired
            }
        },
        yAxis: {
            title: {
                text: 'Value'
            }
        },
        series: [{
            name: 'solar radiation',
            data: data.map(function(point) {
                return [point.timestamp.getTime(), parseFloat(point.solar_rad)];
            })
        }],
    });
</script>
<!-- End Solar -->
@endsection