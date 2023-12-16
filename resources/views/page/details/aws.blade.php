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
            <li class="breadcrumb-item active" aria-current="page">Location 1</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="card" style="background-color: transparent;">
        <div class="card-body">
            <form action="" class="form-control">
                <div class="d-flex flex-row">
                    <input type="text" name="dates" id="date" class="form-control w-25 text-black">
                    <button type="submit" class="btn btn-sm btn-gradient-primary ms-2">Filter</button>
                </div>
            </form>
            <div id="aws-chart" class="w-full" style="height:300px"></div>
        </div>
    </div>
</div>

<!-- Pressure & Windspeed -->

@endsection


@section('chart')
<script>
    // Date Range Picker
    $('input[name="dates"]').daterangepicker();
    // Chart
    var data = [{
            timestamp: 1598918400000,
            temperature: 25,
            humidity: 70,
            windSpeed: 10
        },
        {
            timestamp: 1599004800000,
            temperature: 28,
            humidity: 55,
            windSpeed: 40
        },
        {
            timestamp: 1599091100000,
            temperature: 30,
            humidity: 100,
            windSpeed: 20
        },
        // Add more data points here
    ];

    // Convert timestamp to JavaScript Date object
    data.forEach(function(point) {
        point.timestamp = new Date(point.timestamp);
    });

    // Create the chart
    Highcharts.chart('aws-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Temperature, Humidity, and Wind Speed'
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
                    return [point.timestamp.getTime(), point.temperature];
                })
            },
            {
                name: 'Humidity',
                data: data.map(function(point) {
                    return [point.timestamp.getTime(), point.humidity];
                })
            },
            {
                name: 'Wind Speed',
                data: data.map(function(point) {
                    return [point.timestamp.getTime(), point.windSpeed];
                })
            }
        ],
    });
</script>
@endsection