<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Spd;
use App\Models\User;
use App\Models\Biaya;
use App\Models\Laporan;
use App\Models\Permintaan;
use App\Models\MataAnggaran;
use App\Models\Representasi;
use Illuminate\Http\Request;
use App\Models\BiayaTiketPesawat;
use App\Models\LaporanPermintaan;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SpdController extends Controller
{
    public function index()
    {
        $getUser            = Auth::user()->role;
        $getUserId          = Auth::user()->id;
        $getUserSpdId       = Auth::user()->spd_id;

        if ($getUser == "pegawai") {
            // Jika Pegawai tampilkan SPD nya
            if ($getUserSpdId) {
                $spd            = Spd::where('id', $getUserSpdId)
                    ->whereNotIn('status_spd', ['ditolak', 'selesai'])
                    ->get();
                $getPermintaan  = Permintaan::where('user_id', $getUserId)->first();
                $getSpdId       = $getPermintaan->spd_id;

                $permintaan = Permintaan::where('spd_id', $getSpdId)->get();

                return view('dashboard.spd.index', [
                    'title'         => 'Surat Perjalanan Dinas',
                    'spd'           => $spd,
                    'permintaan'    => $permintaan,
                    'mak'           => MataAnggaran::all(),
                    'data_tiket'    => BiayaTiketPesawat::all(),
                    'bendahara'     => User::where('role', 'bendahara pengeluaran')->get(),
                ]);
            } else {
                return view('dashboard.spd.index', [
                    'title'         => 'Surat Perjalanan Dinas',
                ]);
            }
        } else {
            $spd = Spd::orderBy('id', 'desc')
                ->whereNotIn('status_spd', ['ditolak', 'selesai'])
                ->get();
            $permintaan = Permintaan::all();

            return view('dashboard.spd.index', [
                'title'         => 'Surat Perjalanan Dinas',
                'spd'           => $spd,
                'permintaan'    => $permintaan,
                'mak'           => MataAnggaran::all(),
                'data_tiket'    => BiayaTiketPesawat::all(),
                'bendahara'     => User::where('role', 'bendahara pengeluaran')->get(),
            ]);
        }
    }

    public function detail($id)
    {
        $spd        = Spd::where('id', $id)->first();
        $permintaan = Permintaan::where('spd_id', $id)->get();
        // $getPPK = User::where('role', 'pejabat pembuat komitmen')->first();
        // dd($getPPK);
        $data = [
            'title'         => 'Cetak Surat Tugas',
            'spd'           => $spd,
            'permintaan'    => $permintaan,
        ];

        return view('dashboard.spd.detail', $data);
    }

    public function cetakPermintaan($id)
    {
        $spd        = Spd::where('id', $id)->first();
        $permintaan = Permintaan::where('spd_id', $id)->get();
        $data = [
            'title'         => 'Cetak Surat Tugas',
            'spd'           => $spd,
            'permintaan'    => $permintaan,
        ];

        // return view('dashboard.cetak.cetakPermintaan', $data);

        $pdf = PDF::loadView('dashboard.cetak.cetakPermintaan', $data);
        $pdf->setOrientation('landscape')->setPaper('a4')->setOption('enable-local-file-access', true);
        $kode_spd = $spd->kode_spd;
        return $pdf->stream('Permintaan_' . $kode_spd . '.pdf');
    }

    public function cetakSuratTugas($id)
    {
        $spd        = Spd::where('id', $id)->first();
        $permintaan = Permintaan::where('spd_id', $id)->get();
        $data = [
            'title'         => 'Cetak Surat Tugas',
            'spd'           => $spd,
            'permintaan'    => $permintaan,
        ];

        // return view('dashboard.cetak.cetakSuratTugas', $data);

        $pdf = PDF::loadView('dashboard.cetak.cetakSuratTugas', $data);
        $pdf->setOrientation('portrait')->setPaper('a4')->setOption('enable-local-file-access', true);
        $kode_spd = $spd->kode_spd;
        return $pdf->stream('Surat_Tugas_' . $kode_spd . '.pdf');
    }

    public function cetakSuratSpd($id)
    {
        $getUserID          = Auth::user()->id;
        $spd                = Spd::where('id', $id)->first();
        $permintaan         = Permintaan::where('spd_id', $id)->get();
        $user_permintaan    = User::where('id', $getUserID)->first();

        $data = [
            'title'             => 'Cetak Surat Spd',
            'spd'               => $spd,
            'permintaan'        => $permintaan,
            'user_permintaan'   => $user_permintaan,
        ];
        $pdf = PDF::loadView('dashboard.cetak.cetakSuratSpd', $data);
        $pdf->setOrientation('portrait')->setPaper('a4')->setOption('enable-local-file-access', true);
        $kode_spd = $spd->kode_spd;
        return $pdf->stream('Surat_Spdphp arti_' . $kode_spd . '.pdf');
    }

    public function cetakKwitansi($id)
    {
        $getUserID          = Auth::user()->id;
        $spd                = Spd::where('id', $id)->first();
        $permintaan         = Permintaan::where('spd_id', $id)->get();
        $user_permintaan    = User::where('id', $getUserID)->first();
        $data = [
            'title'         => 'Surat Kwitansi',
            'spd'           => $spd,
            'permintaan'    => $permintaan,
            'user_permintaan'   => $user_permintaan,
        ];
        $pdf = PDF::loadView('dashboard.cetak.cetakKwitansi', $data);
        $pdf->setOrientation('portrait')->setPaper('a4')->setOption('enable-local-file-access', true);
        $kode_spd = $spd->kode_spd;
        return $pdf->stream('Surat_Kwitansi_' . $kode_spd . '.pdf');
    }

    public function create()
    {
        $jenis_perjalanan   = ['luar kota', 'dalam kota', 'diklat'];
        $jenis_transportasi = ['darat', 'udara'];

        $loggedInUser = auth()->user(); // Get the logged-in user

        $nonAdminUsers = User::where('role', '!=', 'admin')
            ->where('id', '!=', $loggedInUser->id) // Exclude the logged-in user
            ->get();

        return view('dashboard.spd.create', [
            'title'                 => 'Formulir Pengajuan Perjalanan Dinas',
            'jenis_perjalanan'      => $jenis_perjalanan,
            'jenis_transportasi'    => $jenis_transportasi,
            'user'                  => $nonAdminUsers
        ]);
    }

    public function store(Request $request)
    {
        if ($request->user !== 0) {
            $countUser = count($request->users);
            if ($countUser > 5) {
                return Redirect::back()->with('message_peserta', 'Peserta Maximal 5');
            };
        };

        $getUserID      = Auth::user()->id;
        $status_spd     = 'usulan';

        $attr = $request->validate([
            'kode_spd'              => 'required|max:255|unique:spds,kode_spd',
            'maksud'                => 'required|max:255',
            'status_spd'            => $status_spd,
            'jenis_perjalanan'      => 'required',
            'jenis_transportasi'    => 'required',
            'provinsi'              => 'required',
            'kota'                  => 'required',
            'tanggal_mulai'         => 'required',
            'tanggal_pulang'        => 'required',
            'malam'                 => 'required',
            'lama'                  => 'required',
            'input_by'              => 'required',
            'undangan'              => 'image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        if ($request->file('undangan')) {
            $attr['undangan'] = $request->file('undangan')->store('undangan');
        }

        // JIKA PERJALANAN DARAT BIAYA TAXI KOSONG
        // JIKA PERJALANAN PESAWAT BIAYA TAXI ADA
        // UANG PENGINAPAN DIUBAH SESUAI PDF 
        // UANG TAXI ADA DI PDF
        // BUAT TABLE MATA ANGGARAN (KODE, AKUN)

        // UPDATE PERMINTAAN TABLE

        // ==============BUAT DAN HITUNG PERJALANAN ORANG KE 1 ======================
        $tujuanP = $attr['provinsi'];
        $tujuanK = $attr['kota'];
        $golongan = Auth::user()->golongan->golongan_name;
        $golonganId = Auth::user()->golongan->golongan_id;

        $getTableBiaya = Biaya::findOrFail($tujuanP);
        $getTableRepresentasi = Representasi::where('pangkat', $golongan)->first();

        // --UANG HARIAN--
        if ($attr['jenis_perjalanan'] == 'luar kota') {
            $uang_harian = $getTableBiaya->luar_kota;
        } elseif ($attr['jenis_perjalanan'] == 'dalam kota') {
            $uang_harian = $getTableBiaya->dalam_kota;
        } elseif ($attr['jenis_perjalanan'] == 'diklat') {
            $uang_harian = $getTableBiaya->diklat;
        };

        $jumlah_uang_harian = $attr['lama'] * $uang_harian;

        // --END OF UANG HARIAN--
        // --UANG REPRESENTASI--
        if ($getTableRepresentasi) {
            if ($attr['jenis_perjalanan'] == 'luar kota') {
                $uang_representasi = $getTableRepresentasi->luar_kota;
            } elseif ($attr['jenis_perjalanan'] == 'dalam kota') {
                $uang_representasi = $getTableRepresentasi->dalam_kota;
            } elseif ($attr['jenis_perjalanan'] == 'diklat') {
                $uang_representasi = 0;
            }
        } else {
            $uang_representasi = 0;
        }

        $jumlah_uang_representasi = $attr['lama'] * $uang_representasi;

        // --END OF UANG REPRESENTASI--
        // --BIAYA PENGINAPAN--
        if ($golonganId == 1) {
            $biaya_penginapan = $getTableBiaya->eselon_1;
        } elseif ($golonganId == 2) {
            $biaya_penginapan = $getTableBiaya->eselon_2;
        } elseif ($golonganId == 3 || $golonganId == 5) {
            $biaya_penginapan = $getTableBiaya->eselon_3_golongan_4;
        } elseif ($golonganId == 4 || $golonganId >= 6) {
            $biaya_penginapan = $getTableBiaya->eselon_4_golongan_3;
        }

        $jumlah_biaya_penginapan = $attr['malam'] * $biaya_penginapan;

        // --END OF BIAYA PENGINAPAN--
        // --BIAYA TAKSI--
        if ($attr['jenis_transportasi'] == 'udara') {
            $biaya_taksi = $getTableBiaya->biaya_taksi;
        } else {
            $biaya_taksi = 0;
        }
        // --END OF BIAYA TAKSI--
        // --TIKET PESAWAT--
        // SEMENTARA 0 KARNA BELUM TAU LOGIC NYA
        // if ($attr['jenis_transportasi'] == 'udara') {
        //     $biaya_taksi = $getTableBiaya->biaya_taksi;
        // } else {
        //     $biaya_taksi = 0;
        // }
        // --END OF TIKET PESAWAT--
        // ==============END BUAT DAN HITUNG PERJALANAN==================

        $jumlah_permintaan = $jumlah_biaya_penginapan + $biaya_taksi + $jumlah_uang_harian + $jumlah_uang_representasi;




        // INSERT SPD
        $insertSpd = Spd::create($attr);

        // AMBIL ID YANG BARU SAJA DI INSERT
        $getIdSPD = $insertSpd->id;

        // INPUT PERMINTAAN
        $insertPermintaan = Permintaan::create([
            'user_id'                   => Auth::user()->id,
            'spd_id'                    => $getIdSPD,
            'nama'                      => Auth::user()->name,
            'nip'                       => Auth::user()->nip,
            'golongan'                  => Auth::user()->golongan->golongan_name,
            'provinsi'                  => $attr['provinsi'],
            'kota'                      => $attr['kota'],
            'lama'                      => $attr['lama'],
            'malam'                     => $attr['malam'],
            'biaya_taksi'               => $biaya_taksi,
            'biaya_transportasi_darat'  => 0,
            'biaya_penginapan'          => $biaya_penginapan,
            'tiket_pesawat'             => 0,
            'uang_harian'               => $uang_harian,
            'uang_representasi'         => $uang_representasi,
            'jumlah_uang_representasi'  => $jumlah_uang_representasi,
            'jumlah_uang_harian'        => $jumlah_uang_harian,
            'jumlah_biaya_penginapan'   => $jumlah_biaya_penginapan,
            'jumlah'                    => $jumlah_permintaan,
        ]);

        $getIdPermintaan = $insertPermintaan->id;
        DB::update('update users set permintaan_id = ? where id = ?', [$getIdPermintaan, $getUserID]);

        // UPDATE DAFTAR PESERTA
        if ($request->users !== 0) {
            foreach ($request->users as $item) {
                $user = User::where('id', $item)->first();

                DB::update('update users set spd_id = ? where id = ?', [$getIdSPD, $item]);
                // ==============BUAT DAN HITUNG PERJALANAN======================
                $tujuanP = $attr['provinsi'];
                $tujuanK = $attr['kota'];
                $golongan = $user->golongan->golongan_name;
                $golonganId = $user->golongan->golongan_id;

                $getTableBiaya = Biaya::findOrFail($tujuanP);
                $getTableRepresentasi = Representasi::where('pangkat', $golongan)->first();
                // $getTableTiketPesawat = BiayaTiketPesawat::where('')
                // $getTableTransportasiDarat

                // --UANG HARIAN--
                if ($attr['jenis_perjalanan'] == 'luar kota') {
                    $uang_harian = $getTableBiaya->luar_kota;
                } elseif ($attr['jenis_perjalanan'] == 'dalam kota') {
                    $uang_harian = $getTableBiaya->dalam_kota;
                } elseif ($attr['jenis_perjalanan'] == 'diklat') {
                    $uang_harian = $getTableBiaya->diklat;
                };

                $jumlah_uang_harian = $attr['lama'] * $uang_harian;

                // --END OF UANG HARIAN--
                // --UANG REPRESENTASI--
                if ($getTableRepresentasi) {
                    if ($attr['jenis_perjalanan'] == 'luar kota') {
                        $uang_representasi = $getTableRepresentasi->luar_kota;
                    } elseif ($attr['jenis_perjalanan'] == 'dalam kota') {
                        $uang_representasi = $getTableRepresentasi->dalam_kota;
                    } elseif ($attr['jenis_perjalanan'] == 'diklat') {
                        $uang_representasi = 0;
                    }
                } else {
                    $uang_representasi = 0;
                }

                $jumlah_uang_representasi = $attr['lama'] * $uang_representasi;

                // --END OF UANG REPRESENTASI--
                // --BIAYA PENGINAPAN--
                if ($golonganId == 1) {
                    $biaya_penginapan = $getTableBiaya->eselon_1;
                } elseif ($golonganId == 2) {
                    $biaya_penginapan = $getTableBiaya->eselon_2;
                } elseif ($golonganId == 3 || $golonganId == 5) {
                    $biaya_penginapan = $getTableBiaya->eselon_3_golongan_4;
                } elseif ($golonganId == 4 || $golonganId >= 6) {
                    $biaya_penginapan = $getTableBiaya->eselon_4_golongan_3;
                }

                $jumlah_biaya_penginapan = $attr['malam'] * $biaya_penginapan;

                // --END OF BIAYA PENGINAPAN--
                // --BIAYA TAKSI--
                if ($attr['jenis_transportasi'] == 'udara') {
                    $biaya_taksi = $getTableBiaya->biaya_taksi;
                } else {
                    $biaya_taksi = 0;
                }

                $jumlah_permintaan = $biaya_penginapan + $biaya_taksi + $jumlah_uang_harian + $uang_representasi;

                $insertPermintaans = Permintaan::create([
                    'user_id'                   => $user->id,
                    'spd_id'                    => $getIdSPD,
                    'nama'                      => $user->name,
                    'nip'                       => $user->nip,
                    'golongan'                  => $user->golongan->golongan_name,
                    'provinsi'                  => $attr['provinsi'],
                    'kota'                      => $attr['kota'],
                    'lama'                      => $attr['lama'],
                    'malam'                     => $attr['malam'],
                    'biaya_taksi'               => $biaya_taksi,
                    'biaya_transportasi_darat'  => 0,
                    'biaya_penginapan'          => $biaya_penginapan,
                    'tiket_pesawat'             => 0,
                    'uang_harian'               => $uang_harian,
                    'uang_representasi'         => $uang_representasi,
                    'jumlah_uang_representasi'  => $jumlah_uang_representasi,
                    'jumlah_uang_harian'        => $jumlah_uang_harian,
                    'jumlah_biaya_penginapan'   => $jumlah_biaya_penginapan,
                    'jumlah'                    => $jumlah_permintaan,
                ]);
                $getIdPermintaans = $insertPermintaans->id;
                DB::update('update users set permintaan_id = ? where id = ?', [$getIdPermintaans, $item]);
            }
        }

        // UPDATE USER SPD_ID
        DB::update('update users set spd_id = ? where id = ?', [$getIdSPD, $getUserID]);
        return redirect('spd')->with('message', 'Form pengajuan berhasil ditambah');
    }

    public function show(Spd $spd)
    {
        //
    }

    public function edit(Spd $spd)
    {
        $jenis_perjalanan = ['luar kota', 'dalam kota', 'diklat'];
        $jenis_transportasi = ['darat', 'udara'];

        return view('dashboard.spd.edit', [
            'title'                 => 'Edit Surat Perjalanan Dinas',
            'spd'                   => $spd,
            'jenis_perjalanan'      => $jenis_perjalanan,
            'jenis_transportasi'    => $jenis_transportasi,
        ]);
    }

    public function update(Request $request, Spd $spd)
    {
        //
    }

    public function destroy(Spd $spd)
    {
        $getSpdId = $spd->id;

        if ($spd->undangan) {
            Storage::delete($spd->undangan);
        }
        // Get the Permintaan related to this Spd
        $permintaan = Permintaan::where('spd_id', $spd->id)->get();
        // dd($permintaan);

        foreach ($permintaan as $singlePermintaan) {
            // Delete the related Nota records for each Permintaan
            Nota::where('permintaan_id', $singlePermintaan->id)->delete();
        }

        Spd::destroy($spd->id);
        Permintaan::where('spd_id', $spd->id)->delete();

        // Update the users table where spd_id equals the deleted SPD ID
        User::where('spd_id', $spd->id)->update(['spd_id' => null, 'permintaan_id' => null]);
        // $spd->delete();

        return back()->with('message', 'Data berhasil dihapus');
    }

    public function verifikasiSpd(Request $request, $id)
    {
        $verifikasi_pada = now();
        $verifikasi_oleh = Auth::user()->id;

        $status = "verifikasi";

        $spd = Spd::findOrFail($id);
        $spd->status_spd    = $status;
        $spd->mata_anggaran = $request->mata_anggaran;
        $spd->verifikasi_pada = $verifikasi_pada;
        $spd->verifikasi_oleh = $verifikasi_oleh;
        $spd->save();

        return redirect('spd')->with('message_verifikasi', 'Spd berhasil diverifikasi');
    }
    public function penugasan(Request $request, $id)
    {
        $verifikasi_pelaksanaan_pada = now();
        $verifikasi_pelaksanaan_oleh = Auth::user()->id;

        $status = "pelaksanaan";

        $spd = Spd::findOrFail($id);
        $spd->status_spd                    = $status;
        $spd->verifikasi_pelaksanaan_pada   = $verifikasi_pelaksanaan_pada;
        $spd->verifikasi_pelaksanaan_oleh   = $verifikasi_pelaksanaan_oleh;
        $spd->nomor_surat_tugas             = $request->nomor_surat_tugas;
        $spd->bendahara                     = $request->bendahara;
        $spd->save();

        return redirect('spd')->with('message_verifikasi', 'Penugasan berhasil diberikan');
    }

    public function tiket_pesawat(Request $request, $id)
    {
        $selectedOption = $request->input('options');
        if ($selectedOption == 1) {
            $tiket_pesawat = $request->tiket_pesawat;
        } else {
            $tiket_pesawat = $request->tiket_pesawat_manual;
        }
        // $permintaan = Permintaan::where('spd_id', $id)->where('user_id', Auth()->user()->id)->first();
        $permintaan = Permintaan::where('spd_id', $id)->get();

        foreach ($permintaan as $item) {
            $addTiketPesawat = $tiket_pesawat;
            $item->tiket_pesawat = $tiket_pesawat;
            $item->jumlah += $addTiketPesawat;
            $item->save();
        }

        return redirect('spd')->with('message_verifikasi', 'Tiket Pesawat berhasil diinput');
    }

    public function nota($id)
    {
        $permintaan = Permintaan::where('spd_id', $id)->where('user_id', Auth()->user()->id)->first();

        if (!$permintaan) {
            // Handle the case where $permintaan is null, perhaps with a redirect
            return redirect()->back()->with('message_noaccess', 'Ini bukan halaman nota anda');
        }

        $nota = Nota::where('permintaan_id', $permintaan->id)->where('user_id', Auth()->user()->id)->get();

        // if ($nota->isEmpty()) {
        //     // Redirect back with a message if $nota is empty
        //     return redirect()->back()->with('warning', 'No nota found.');
        // }

        return view('dashboard.nota.index', [
            'title'         => 'Upload Nota',
            'permintaan'    => $permintaan,
            'nota'          => $nota,
        ]);
    }


    public function add_nota(Request $request)
    {
        $attr = $request->validate([
            'ket_nota'    => 'required',
            'foto_nota'   => 'required|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
        ]);

        if ($request->file('foto_nota')) {
            $attr['foto_nota'] = $request->file('foto_nota')->store('foto_nota');
        };

        $attr['user_id'] = Auth::user()->id;
        $attr['permintaan_id'] = $request->permintaan_id;

        Nota::create($attr);

        return redirect()->back()->with('message', 'Nota berhasil diinput');
    }

    public function selesai($id)
    {
        $getSpd = Spd::find($id);
        $getSpd->status_spd = "selesai";
        $getSpd->save();

        User::where('spd_id', $getSpd->id)->update(['spd_id' => null, 'permintaan_id' => null]);

        return redirect('spd')->with('message_verifikasi', 'Perjalanan Dinas selesai, data akan diinput ke dalam laporan');
    }

    public function tolak(Request $request, $id)
    {
        $getSpd = Spd::find($id);
        $getSpd->status_spd = "ditolak";
        $getSpd->keterangan = $request->keterangan;
        $getSpd->save();

        User::where('spd_id', $getSpd->id)->update(['spd_id' => null, 'permintaan_id' => null]);

        return redirect('spd')->with('message_verifikasi', 'Perjalanan Dinas Berhasil Ditolak, data akan diinput ke dalam Laporan Ditolak');
    }

    public function getProvince()
    {
        $data = DB::table('provinsis')->where('nama_provinsi', 'LIKE', '%' . request('q') . '%')->get();
        return response()->json($data);
    }
    public function getCity($id)
    {
        $data = DB::table('kotas')->where('prov_id', $id)->where('nama_kota', 'LIKE', '%' . request('q') . '%')->orderBy('nama_kota', 'asc')->get();
        return response()->json($data);
    }
}
