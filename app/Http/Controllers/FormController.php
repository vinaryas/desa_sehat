<?php

namespace App\Http\Controllers;

use App\Services\Support\Cek_kesehatanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
			'tensi'=>$request->tensi,
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
            echo('form failed to store');
            return redirect()->route('form.index');
        }
    }
}
