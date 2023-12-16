@extends('layouts.main', ['title' => 'Riwayat Water Level'])

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-chart"></i>
        </span> Laporan & Riwayat Tinggi Muka Air
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
            <div id="wl-chart" class="w-full" style="height:300px"></div>
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
            level: 25,
        },
        {
            timestamp: 1599004800000,
            level: 28,
        },
        {
            timestamp: 1599091100000,
            level: 30,
        },
        // Add more data points here
    ];

    // Convert timestamp to JavaScript Date object
    data.forEach(function(point) {
        point.timestamp = new Date(point.timestamp);
    });

    // Create the chart
    Highcharts.chart('wl-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Tinggi Muka Air Lokasi 1'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                format: '{value:%d/%m/%Y}' // Format the x-axis labels as desired
            }
        },
        yAxis: {
            title: {
                text: 'Ketinggian'
            }
        },
        series: [{
            name: 'Water Level',
            data: data.map(function(point) {
                return [point.timestamp.getTime(), point.level];
            })
        }, ],
    });
</script>
@endsection