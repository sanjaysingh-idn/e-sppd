<?php

namespace App\Http\Controllers;

use App\Models\Spd;
use App\Models\User;
use App\Models\Permintaan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporanDitolak()
    {
        $getUser            = Auth::user()->role;
        $getUserId          = Auth::user()->id;

        if ($getUser == "pegawai") {
            $laporan            = Laporan::where('id', $getUserId)->get();

            return view('dashboard.laporan.laporanDitolak', [
                'title'         => 'Laporan Surat Perjalanan Dinas',
                'laporan'       => $laporan,
            ]);
        } else {
            $laporan        = Laporan::all();

            return view('dashboard.laporan.laporanDitolak', [
                'title'         => 'Laporan Surat Perjalanan Dinas',
                'laporan'       => $laporan,
            ]);
        }
    }

    public function laporanSelesai()
    {
        $getTable = Spd::where('status_spd', 'selesai')->get();
        // dd($getTable);
        $getUser            = Auth::user()->role;
        $getUserId          = Auth::user()->id;

        if ($getUser == "pegawai") {
            $getTable = Spd::where('status_spd', 'selesai')
                ->where('id', $getUserId)
                ->get();

            $totalBiaya = DB::table('permintaans')
                ->join('spds', 'permintaans.spd_id', '=', 'spds.id')
                ->where('spds.status_spd', '=', 'selesai')
                ->where('user_id', $getUserId)
                ->sum('permintaans.jumlah');
            return view('dashboard.laporan.laporanSelesai', [
                'title'         => 'Laporan Surat Perjalanan Dinas',
                'laporan'       => $getTable,
                'totalBiaya'    => $totalBiaya,
            ]);
        } else {
            $totalBiaya = DB::table('permintaans')
                ->join('spds', 'permintaans.spd_id', '=', 'spds.id')
                ->where('spds.status_spd', '=', 'selesai')
                ->sum('permintaans.jumlah');
            return view('dashboard.laporan.laporanSelesai', [
                'title'         => 'Laporan Surat Perjalanan Dinas',
                'laporan'       => $getTable,
                'totalBiaya'    => $totalBiaya,
            ]);
        }
    }

    public function tolak(Request $request, $id)
    {
        $ditolak_oleh = Auth::user()->id;
        $spd = Spd::findOrFail($id);
        $getName = $spd->input_by;
        $getUser = User::where('name', $getName)->first();
        $getSpdId = $spd->id;

        if ($getUser) {
            $getUserId = $getUser->id;
        }

        Laporan::create([
            'user_spd'                      => $getUserId,
            'kode_spd'                      => $spd->kode_spd,
            'maksud'                        => $spd->maksud,
            'status_spd'                    => $spd->status_spd,
            'jenis_transportasi'            => $spd->jenis_transportasi,
            'jenis_perjalanan'              => $spd->jenis_perjalanan,
            'provinsi'                      => $spd->provinsi,
            'kota'                          => $spd->kota,
            'tanggal_mulai'                 => $spd->tanggal_mulai,
            'tanggal_pulang'                => $spd->tanggal_pulang,
            'lama'                          => $spd->lama,
            'malam'                         => $spd->malam,
            'verifikasi_pada'               => $spd->verifikasi_pada,
            'verifikasi_oleh'               => $spd->verifikasi_oleh,
            'verifikasi_pelaksanaan_pada'   => $spd->verifikasi_pelaksanaan_pada,
            'verifikasi_pelaksanaan_oleh'   => $spd->verifikasi_pelaksanaan_oleh,
            'ditolak_oleh'                  => $ditolak_oleh,
            'input_by'                      => $spd->input_by,
            'keterangan'                    => $request->keterangan,
        ]);

        if ($spd->undangan) {
            Storage::delete($spd->undangan);
        }
        Spd::destroy($spd->id);

        // Update the users table where spd_id equals the deleted SPD ID
        User::where('spd_id', $getSpdId)->update(['spd_id' => null, 'permintaan_id' => null]);

        return redirect()->back()->with('message', 'SPD berhasil ditolak. dan dihapus');
    }
}
