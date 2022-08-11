<?php

namespace App\Http\Controllers;

use App\Exports\HasilPemeriksaanExport;

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
            $storeData = Cek_kesehatanService::store($request->except('_token'));

            DB::commit();

            return redirect()->route('form.index');
        }catch(\Throwable $th){
            dd($th);
            echo('form failed to store');
            return redirect()->route('form.index');
        }
    }

    public function downloadExcel(Request $request)
    {
        ini_set('max_execution_time', 3600);
		ini_set('memory_limit', '2048M');

        $forms = Cek_kesehatanService::all($request)->get();

        return (new HasilPemeriksaanExport($forms))->download('Hasil Pemeriksaan.xls', \Maatwebsite\Excel\Excel::XLS);
    }
}
