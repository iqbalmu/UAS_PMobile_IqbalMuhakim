@extends('layouts.main')

@section('title', 'Dashboard')

@section('vendor-styles')
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
@endsection

@section('vendor-scripts')
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
@endsection

@section('page-scripts')
    <script src="../assets/js/dashboards-analytics.js"></script>
@endsection

@section('content')
    @switch($user->id_user)
        @case(1)
            @include('content.dashboard.admin')
        @break

        @case(2)
            @include('content.dashboard.admisi')
        @break

        @case(3)
            @include('content.dashboard.dokter')
        @break

        @case(4)
            @include('content.dashboard.apoteker')
        @break

        @default
            <span>nothing to show</span>
    @endswitch
@endsection
