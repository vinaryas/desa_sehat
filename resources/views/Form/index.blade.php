@extends('adminlte::page')

@section('title', '')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-footer">
        <div class="float-right">
            <a href="{{ route('form.create') }}" class="btn btn-info btn-sm"><i class="fas fa-file"></i> Form </a>
        </div>
        <div class="float-center">
            <table class="table table-bordered table-striped table-sm" id="table" style="max-width: 100%">
                <thead>
                    <tr>
                        <th> Nama </th>
                        <th> Alamat </th>
                        <th> Tgl Pembuatan </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                    <tr>
                        <td>{{$form->nama}}</td>
                        <td>{{$form->alamat}}</td>
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
    $(document).ready(function () {
        console.log('teast');
        $('#table').DataTable();
    });
</script>
@stop
