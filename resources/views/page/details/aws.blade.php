@extends('layouts.main')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-chart"></i>
        </span> AWS History & Report
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Location 1</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="card-title">Temperature</h4>
                    </div>
                    <div class="col-md-8">
                        <form class="forms-sample">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm">
                                            <option>Last 24 Hour</option>
                                            <option>Last 7 Days</option>
                                            <option>Last 30 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-gradient-primary me-2">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <canvas id="areaTemp" style="height:250px"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Pressure & Windspeed -->

@endsection


@section('chart')
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Temperature",
            data: [12, 15, 3, 5, 2, 20],
            backgroundColor: [
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(255, 159, 64, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaTemp").length) {
        var areaChartCanvas = $("#areaTemp").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Humidity",
            data: [12, 15, 3, 5, 2, 20],
            backgroundColor: [
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaHum").length) {
        var areaChartCanvas = $("#areaHum").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>


<!-- Pressure -->
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Pressure",
            data: [3, 10, 3, 5, 4, 100],
            backgroundColor: [
                "rgba(184, 98, 207, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 222, 1)",
                "rgba(255, 206, 86, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaPress").length) {
        var areaChartCanvas = $("#areaPress").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>

<!-- Wind Speed -->
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Pressure",
            data: [3, 10, 40, 5, 4, 30],
            backgroundColor: [
                "rgba(69,196,171, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 222, 1)",
                "rgba(255, 206, 86, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaWind").length) {
        var areaChartCanvas = $("#areaWind").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>

<!-- Rainfall -->
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Pressure",
            data: [100, 92, 80, 110, 90, 70],
            backgroundColor: [
                "rgba(241,164,61, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 222, 1)",
                "rgba(255, 206, 86, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaRain").length) {
        var areaChartCanvas = $("#areaRain").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>

<!-- Battery -->
<script>
    var areaData = {
        labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12"],
        datasets: [{
            label: "Pressure",
            data: [80, 100, 120, 79, 90, 70],
            backgroundColor: [
                "rgba(76,122,251, 0.2)",
            ],
            borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 222, 1)",
                "rgba(255, 206, 86, 1)",
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        }, ],
    };

    var areaOptions = {
        plugins: {
            filler: {
                propagate: true,
            },
        },
    };

    if ($("#areaBat").length) {
        var areaChartCanvas = $("#areaBat").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: "line",
            data: areaData,
            options: areaOptions,
        });
    }
</script>
@endsection