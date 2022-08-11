@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
@stop

@section('content')
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action={{ route('penduduk.upload') }} enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                UPLOAD EXCEL
            </button>
        </div>
        <br>
        <table class="table table-responsive table-sm" id="t_penduduk" style="width: 100%;">
            <thead>
                <tr>
                    <th> NIK </th>
                    <th> Nomor KK</th>
                    <th> Nama </th>
                    <th> Alamat </th>
                    <th> Dusun </th>
                    <th> Tanggal Lahir </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penduduk as $data)
                <tr>
                    <td>{{$data->id }}</td>
                    <td>{{$data->no_kk}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->dusun}}</td>
                    <td>{{$data->tanggal_lahir}}</td>
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
		var table = $('#t_penduduk').DataTable( {
			rowReorder: {
				selector: 'td:nth-child(2)'
			},
			responsive: true
		} );
	} );
</script>
@stop
