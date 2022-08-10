@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-6">
            <div class="small-box bg-info">
                <div class="inner text-center">
                    <h3> {{ $countPemeriksaan }} </h3>
                    <p> <b> Jumlah Pemeriksaan </b> </p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 0.5);"></i>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
                <div class="inner text-center">
                    <h3> {{ $countChol }} </h3>
                    <p> <b> Pasien Cholesterol tinggi </b> </p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 0.5);"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
                <div class="inner text-center">
                    <h3> {{ $countDemam }} </h3>
                    <p> <b> Pasien Demam </b> </p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 0.5);"></i>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>


@stop

@section('css')
@stop

@section('js')
@stop
