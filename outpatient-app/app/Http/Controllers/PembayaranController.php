<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input("tanggal") ?? Carbon::today()->format('Y-m-d');

        $pembayaran = Pembayaran::query();
        if ($request->filled('tanggal')) {
            $pembayaran->whereDate('created_at', $tanggal);
        }

        $data = $pembayaran->latest()->get();

        return view('content.pembayaran.index', [
            'activeMenu' => 'pembayaran',
            'data' => $data,
            'tanggal' => $tanggal
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id_pembayaran' => 'required',
            'mrn' => 'required',
            'harga' => 'required',
            'pembayaran' => 'required',
        ]);

        $pembayaran = Pembayaran::find($validatedData['id_pembayaran']);

        if ($pembayaran->total_harga > $validatedData['pembayaran']) {
            notyf()->position('y', 'top')->addError('Pembayaran Tidak Cukup !!!');
            return redirect()->route('pembayaran.index');
        }

        $kembalian = $validatedData['pembayaran'] - $pembayaran->total_harga;
        $pembayaran->status = 'lunas';
        $pembayaran->save();

        notyf()->position('y', 'top')->addSuccess('Pembayaran Selesai');
        notyf()->position('y', 'top')->dismissible(true)->duration(0)->addSuccess('Kembalian : ' . $kembalian);
        return redirect()->route('pembayaran.index');
    }
}
