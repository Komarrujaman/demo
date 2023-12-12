@extends('layouts.main')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-dns"></i>
        </span> Automatic Weather Station Device Management
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{('/')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Automatic Weather Station Device</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="col-12 grid-margin">
        <div class="card shadow ">
            <div class="card-body">
                <button class="btn btn-gradient-primary mb-3">Add Device</button>
                <table id="example" class="table table-bordered display table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th>Device Name</th>
                            <th>Add Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Location 1</td>
                            <td>Temperature</td>
                            <td>12/12/2023</td>
                            <td style="width: 200px;">
                                <button class="btn btn-gradient-success">Edit</button>
                                <button class="btn btn-gradient-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Location 2</td>
                            <td>Temperature</td>
                            <td>22/22/2023</td>
                            <td>
                                <button class="btn btn-gradient-success">Edit</button>
                                <button class="btn btn-gradient-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->

@endsection


@section('chart')
<script>
    new DataTable('#example');
</script>
@endsection