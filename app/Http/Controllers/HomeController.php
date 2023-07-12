<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spd;
use App\Models\User;
use App\Models\Golongan;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        $bulanan = DB::table('permintaans')
            ->join('spds', 'permintaans.spd_id', '=', 'spds.id')
            ->where('spds.status_spd', '=', 'selesai')
            ->whereMonth('permintaans.updated_at', $currentMonth)
            ->sum('permintaans.jumlah');
        $tahunan = DB::table('permintaans')
            ->join('spds', 'permintaans.spd_id', '=', 'spds.id')
            ->where('spds.status_spd', '=', 'selesai')
            ->whereYear('permintaans.updated_at', $currentYear)
            ->sum('permintaans.jumlah');
        $spdUsulan = Spd::where('status_spd', 'usulan')->count();
        $spdVerifikasi = Spd::where('status_spd', 'verifikasi')->count();
        $spdPelaksanaan = Spd::where('status_spd', 'pelaksanaan')->count();
        $spdSelesai = Spd::where('status_spd', 'selesai')->count();
        $spdDitolak = Spd::where('status_spd', 'ditolak')->count();
        $userPerjalanan = User::whereNotNull('spd_id')->count();

        return view('dashboard.index', [
            'title'             => 'Dashboard Page',
            'countUser'         => User::all()->count(),
            'countGolongan'     => Golongan::all()->count(),
            'countSpd'          => Spd::all()->count(),
            'bulanan'           => $bulanan,
            'tahunan'           => $tahunan,
            'spdUsulan'         => $spdUsulan,
            'spdVerifikasi'     => $spdVerifikasi,
            'spdPelaksanaan'    => $spdPelaksanaan,
            'spdSelesai'        => $spdSelesai,
            'spdDitolak'        => $spdDitolak,
            'userPerjalanan'    => $userPerjalanan,
        ]);
    }
}
