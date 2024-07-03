<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use App\Models\RekamMedik;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagnosaController extends Controller
{
    public function get(Request $request, $antrian)
    {
        return view('content.diagnosa.index', [
            'activeMenu' => 'diagnosa',
            'antrian' => $antrian,
            'poli' => $request->poli_id,
            'mrn' => $request->mrn,
            'tanggal' => $request->tanggal,
            'obats' => Obat::all(),
        ]);
    }

    public function diagnosa(Request $request)
    {
        // validasi request

        // current user (dokter)
        $userId = Auth::user()->id_user;
        $dokter = Dokter::select('id_dokter')->where('user_id', $userId)->first();

        try {
            DB::transaction(function () use ($request, $dokter) {
                // store data pemeriksaan
                $pemeriksaan = new Pemeriksaan();
                $pemeriksaan->suhu = $request->suhu;
                $pemeriksaan->tekanan_darah = $request->tekanan_darah;
                $pemeriksaan->nadi = $request->nadi;
                $pemeriksaan->pernapasan = $request->pernapasan;
                $pemeriksaan->tinggi = $request->tinggi;
                $pemeriksaan->berat = $request->berat;
                $pemeriksaan->laboratorium = $request->laboratorium;
                $pemeriksaan->rontgen = $request->rontgen;
                $pemeriksaan->ctscan = $request->ctscan;
                $pemeriksaan->usg = $request->usg;
                $pemeriksaan->mri = $request->mri;
                $pemeriksaan->save();

                // store data resep | resep + detail
                $resep = new Resep();
                $resep->keterangan = $request->keterangan;
                $resep->save();

                $totalHarga = null;

                foreach ($request->obat as $index => $value) {
                    $resepDetail = new ResepDetail();
                    $resepDetail->resep_id = $resep->id_resep;
                    $resepDetail->obat_id = $request->obat[$index];
                    $resepDetail->dosis = $request->dosis[$index];
                    $resepDetail->frekuensi = $request->frekuensi[$index];
                    $resepDetail->durasi = $request->durasi[$index];
                    $resepDetail->metode = $request->metode[$index];
                    $resepDetail->syarat = $request->syarat[$index];
                    $resepDetail->save();

                    $totalHarga += $resepDetail->obat->harga;
                }

                // store data rekam medik
                $rekamMedik = new RekamMedik();
                $rekamMedik->keluhan_utama = $request->keluhan;
                $rekamMedik->riwayat_kesehatan = $request->riwayat_kesehatan;
                $rekamMedik->riwayat_kesehatan = $request->riwayat_kesehatan;
                $rekamMedik->diagnosis = $request->diagnosis;
                $rekamMedik->penatalaksanaan = $request->penatalaksanaan;
                $rekamMedik->catatan_dokter = $request->catatan_dokter;
                $rekamMedik->mrn = $request->mrn;
                $rekamMedik->dokter_id = $dokter->id_dokter;
                $rekamMedik->pemeriksaan_id = $pemeriksaan->id_pemeriksaan;
                $rekamMedik->resep_id = $resep->id_resep;
                $rekamMedik->save();

                // Update Antrian
                $antrian = Antrian::where('nomor', $request->antrian)
                    ->where('poli_id', $request->poli_id)
                    ->where('mrn', $request->mrn)
                    ->where(
                        'tanggal',
                        $request->tanggal
                    )->first();
                $antrian->status = 'selesai';
                $antrian->save();

                // Nota Pembayaran
                $pembayaran = new Pembayaran();
                $pembayaran->rekam_medik_id = $rekamMedik->id_rekam_medik;
                $pembayaran->mrn = $request->mrn;
                $pembayaran->total_harga = $totalHarga + 75000;
                $pembayaran->status = 'belum lunas';
                $pembayaran->save();

                notyf()->position('y', 'top')->addSuccess('Data Berhasil Ditambahkan');
            });
        } catch (\Throwable $exception) {
            DB::rollBack();
            // dd('Update Data Pasien Failed: ' . $exception->getMessage());
            dd($exception->getMessage());
            notyf()->position('y', 'top')->addSuccess('Data Gagal Ditambahkan');
        }

        return redirect()->route('antrian.index');
    }
}
