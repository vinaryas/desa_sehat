<?php

namespace App\Http\Controllers;

use App\Services\Support\PendudukService;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
use Carbon\Carbon;
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

	public function find(Request $request)
	{
		$penduduk = PendudukService::find($request->nik)->first();

		return [
			'alamat' => $penduduk->alamat,
			'umur' => Carbon::parse($penduduk->tanggal_lahir)->age
		];
	}

	public function select2(Request $request)
	{
		$data = PendudukService::select($request);

		$tag = [];
		foreach ($data->get() as $index => $value) {
			$tag[] = ['id' => $value->id, 'text' => $value->nama . ' [' . $value->id . ']'];
		}

		return response()->json($tag);
	}
}
