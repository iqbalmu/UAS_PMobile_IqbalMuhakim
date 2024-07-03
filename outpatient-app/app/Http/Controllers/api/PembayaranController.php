<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;

class PembayaranController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey('xnd_development_nkap16WmRuITiYIvwwVvd3avRNydsYXGs9NquS7SH3TbOyoAF2BIOxEgVa3Y5E');
    }

    public function index()
    {
        $currentUser = auth()->user();

        $payments = Pembayaran::where('mrn', $currentUser->pasien->mrn)->get();

        return response()->json([
            'data' => $payments
        ]);
    }

    public function create(Request $request, $idPembayaran)
    {
        $apiInstance = new InvoiceApi();
        $pembayaran = Pembayaran::findOrFail($idPembayaran);

        $createInvoiceRequest = new CreateInvoiceRequest([
            'external_id' => (string) Str::uuid(),
            'description' => 'Invoice Pasien',
            'amount' => $pembayaran->total_harga,
            'currency' => 'IDR'
        ]);

        try {
            $result = $apiInstance->createInvoice($createInvoiceRequest);

            $pembayaran->total_harga = $result['amount'];
            $pembayaran->external_id = $result['external_id'];
            $pembayaran->checkout_link = $result['invoice_url'];
            $pembayaran->status = $result['status'];
            // $pembayaran->rekam_medik_id = $request->rekam_medik_id;
            $pembayaran->save();

            return response()->json([
                'data' => $result['invoice_url']
            ]);
        } catch (\Xendit\XenditSdkException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function webhook(Request $request)
    {
        $apiInstance = new InvoiceApi();
        $invoice = $apiInstance->getInvoiceById($request->id);

        $payment = Pembayaran::where('external_id', $request->external_id)->firstOrFail();
        if ($payment->status == 'SETTLED') {
            return response()->json(['data' => 'Pembayaran telah diproses']);
        }

        $payment->status = $invoice['status'];
        $payment->save();

        return response()->json([
            'data' => 'Pembayaran berhasil'
        ]);
    }
}
