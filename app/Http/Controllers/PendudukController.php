<?php

namespace App\Http\Controllers;

use App\Services\Support\PendudukService;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PendudukController extends Controller
{
    public function index(){
        $penduduk = PendudukService::all()->get();

        return view('Penduduk.index', compact('penduduk'));
    }

    public function uploadExcel(Request $request)
	{
		$this->validate($request, ['file' => 'required|mimes:csv,xls,xlsx']);
		$file = $request->file('file');
		$nama_file = rand().$file->getClientOriginalName();
		$file->move('file_penduduk',$nama_file);
		Excel::import(new PendudukImport, public_path('/file_penduduk/'.$nama_file));
		Session::flash('sukses','Data Berhasil Diimport!');
        return redirect()->route('penduduk.index');
	}
}
