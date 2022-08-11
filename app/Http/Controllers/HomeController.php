<?php

namespace App\Http\Controllers;

use App\Services\Support\Cek_kesehatanService;
use App\Services\Support\PendudukService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countPemeriksaan = 0;
        $countChol = 0;
        $countPenduduk = 0;
        $countDemam = 0;
        $thisMonth = Carbon::now()->month;

        $countPemeriksaan = Cek_kesehatanService::all($thisMonth)->get()->count();
        $countChol = Cek_kesehatanService::getCholesterol($thisMonth)->get()->count();
        $countDemam = Cek_kesehatanService::getDemam($thisMonth)->get()->count();
        $countPenduduk = PendudukService::all()->get()->count();

        return view('home', compact('countPemeriksaan', 'countChol', 'countDemam', 'countPenduduk'));
    }
}
