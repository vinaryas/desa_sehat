@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-teal">
            <div class="inner text-center">
                <h3> {{ $countPenduduk }} <i class="fas fa-users" style="color: rgba(255, 255, 255, 255);"></i> </h3>
                <p> <b> Penduduk </b> </p>
            </div>
        </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-info">
            <div class="inner text-center">
                <h3> {{ $countPemeriksaan }}   <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 255);"></i> </h3>
                <p> <b> Pemeriksaan </b> </p>
            </div>
        </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-warning">
            <div class="inner text-center">
                <h3> {{ $countChol }}  <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 255);"></i> </h3>
                <p> <b> Pasien Cholesterol tinggi </b> </p>
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-6 col-6">
        <div class="small-box bg-primary">
            <div class="inner text-center">
                <h3> {{ $countDemam }}  <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 255);"></i> </h3>
                <p> <b> Pasien Demam </b> </p>
            </div>
        </div>
        </a>
    </div>
</div>


@stop

@section('css')
@stop

@section('js')
@stop
