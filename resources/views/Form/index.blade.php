@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="float-right">
            <a href="{{ route('form.create') }}" class="btn btn-info my-3"><i class="fas fa-file"></i> Form </a>
        </div>
        <div class="">
            <a href="{{ route('form.excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
        </div>
        <div class="float-center">
            <table class="table table-responsive table-bordered table-striped table-sm" id="t_periksa" style="max-width: 100%">
                <thead>
                    <tr>
                        <th> Nama </th>
                        <th> Alamat </th>
                        <th> umur </th>
                        <th> Nama KK </th>
                        <th> Tensi (mmHg)</th>
                        <th> Nadi (denyut/menit)</th>
                        <th> Colesterol (mg/dL)</th>
                        <th> Suhu (celcius)</th>
                        <th> Auris Utro </th>
                        <th> Gula Dalam Darah (mg/dL) </th>
                        <th> SO2 </th>
                        <th> Lain-Lain </th>
                        <th> Tgl Pembuatan </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                    <tr>
                        <td>{{$form->nama}}</td>
                        <td>{{$form->alamat}}</td>
                        <td>{{$form->umur}}</td>
                        <td>{{$form->nama_kk}}</td>
                        <td>{{$form->sistolik}}/ {{$form->diastolik}}</td>
                        <td>{{$form->nadi}}</td>
                        <td>{{$form->chol}}</td>
                        <td>{{$form->suhu}}</td>
                        <td>{{$form->au}}</td>
                        <td>{{$form->gds}}</td>
                        <td>{{$form->so2}}</td>
                        <td>{{$form->lain_lain}}</td>
                        <td>{{$form->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
<script>
    $(document).ready(function() {
    var table = $('#t_periksa').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
    } );
</script>
@stop
