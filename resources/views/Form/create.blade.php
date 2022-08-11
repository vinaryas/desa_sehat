@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark">Form</h1>
@stop

@section('content')
<form class="card" action="{{ route('form.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group">
            <div class="row">
				<div class="col-md-12">
                    <label> NAMA/NIK </label>
                    <select name="nik" id="nik" class="select2" style="width: 100%;" required></select>
                </div>
                <div class="col-md-12">
                    <label> Alamat </label>
                    <textarea class="form-control form-control-sm" id="alamat" name="alamat" cols="20" rows="5" disabled></textarea>
                </div>
                <div class="col-md-6">
                    <label> Umur </label>
                    <input type="text" name="umur" class="form-control form-control-sm" max="200" maxlength="3" id="umur" readonly>
                </div>
                <div class="col-md-6">
                    <label> Nama KK </label>
                    <input type="text" id="nama_kk" name="nama_kk"class="form-control form-control-sm">
                </div>
                <div class='col-md-6'>
                    {{-- <label class='row justify-content-center'> Tensi </label> --}}
                    <div class='row'>
                        <div class="col-md-6">
                            <label> Tensi Darah Sistolik </label>
                            <input type="number" name="sistolik" class="form-control form-control-sm" max="200" maxlength="3">
                        </div>
                        <div class="col-md-6">
                            <label> Tensi Darah Diastolik </label>
                            <input type="number" name="diastolik" class="form-control form-control-sm" max="100" maxlength="3">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label> Nadi </label>
                    <input type="number" name="nadi" class="form-control form-control-sm" max="200" maxlength="3">
                </div>
                <div class="col-md-3">
                    <label> Kolesterol </label>
                    <input type="number" name="chol" class="form-control form-control-sm" max="300" maxlength="3">
                </div>
                <div class="col-md-3">
                    <label> Suhu </label>
                    <input type="number" name="suhu" class="form-control form-control-sm" max="40" maxlength="2">
                </div>
                <div class="col-md-3">
                    <label> Auris Utro </label>
                    <input type="number" name="au" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label> Gula Darah </label>
                    <input type="number" name="gds" class="form-control form-control-sm" max="300" maxlength="3">
                </div>
                <div class="col-md-3">
                    <label> SO2 dalam tubuh </label>
                    <input type="number" name="so2" i class="form-control form-control-sm">
                </div>
                <div class="col-md-12">
                    <label> Lain-lain </label>
                    <textarea class="form-control form-control-sm" name="lain_lain" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('form.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> <b>Batal</b> </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> <b>Simpan</b>
            </button>
        </div>
    </div>
</form>

@stop

@section('css')
@stop

@section('js')
@include('components.select2')
<script>
	$(document).ready(function () {
		setSelect2('#nik', '{{ route('penduduk.select2') }}', '...', _data = function (params) {
			return {
				input: $.trim(params.term)
			};
		});

		$('#nik').change(function (e) { 
			e.preventDefault();
			
			$.ajax({
				type: "GET",
				url: "{{ route('penduduk.find') }}",
				data: {
					'nik': $('#nik').val(),
				},
				success: function (response) {
					console.log(response.alamat);
					$('#alamat').html(response.alamat);
					$('#umur').val(response.umur);
				}
			});
		});
	});
</script>
@stop
