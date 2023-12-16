@extends('layouts.main',['title' => 'Dashboard'])

@section('content')
<section id="index">
  <div class="page-header" id="dashboard">
    <h1 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h1>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
</section>

@include('dashboard.map')
@include('dashboard.aws')
@include('dashboard.water-level')
@endsection