<?php

namespace App\Http\Controllers;

use App\Exports\HasilPemeriksaanExport;
use App\Services\Support\Cek_kesehatanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    public function index(){
        $forms = Cek_kesehatanService::all()->get();

        return view('Form.index', compact('forms'));
    }

    public function create(){
        return view('Form.create');
    }

    public function store(Request $request){
        DB::beginTransaction();

        try{
            $data = [
            'nama'=>$request->nama,
			'alamat'=>$request->alamat,
			'umur'=>$request->umur,
			'nama_kk'=>$request->nama_kk,
			'sistolik'=>$request->sistolik,
            'diastolik'=>$request->diastolik,
            'nadi'=>$request->nadi,
            'chol'=>$request->chol,
            'suhu'=>$request->suhu,
            'au'=>$request->au,
            'gds'=>$request->gds,
            'so2'=>$request->so2,
            'lain_lain'=>$request->lain_lain,
            'created_at' => now(),
            'updated_at' => now(),
            ];
            $storeData = Cek_kesehatanService::store($data);

            DB::commit();

            return redirect()->route('form.index');
        }catch(\Throwable $th){
            dd($th);
            echo('form failed to store');
            return redirect()->route('form.index');
        }
    }

    public function excel(Request $request)
    {
        ini_set('max_execution_time', 3600);
		ini_set('memory_limit', '2048M');

        $forms = Cek_kesehatanService::all($request)->get();

        return (new HasilPemeriksaanExport($forms))->download('Hasil Pemeriksaan.xls', \Maatwebsite\Excel\Excel::XLS);
    }
}
