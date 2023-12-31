@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <div class="">
			<a href="{{ route('form.create') }}" class="btn btn-info my-3"><i class="fas fa-plus"></i> Data Kesehatan </a>
            <a href="{{ route('form.download') }}" class="btn btn-success my-3" target="_blank"><i class="fas fa-file-excel"></i> Excel</a>
        </div>
        <table class="table table-responsive table-bordered table-striped table-sm" id="t_periksa" style="max-width: 100%">
            <thead>
                <tr>
                    <th> Nama </th>
                    <th> Alamat </th>
                    <th> umur </th>
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
                    <td>{{$form->penduduk->nama}}</td>
                    <td>{{$form->penduduk->alamat}}</td>
                    <td>{{$form->umur}}</td>
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
