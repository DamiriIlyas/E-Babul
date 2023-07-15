<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Santri;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = [
            'santris' => Santri::all(),
            'tagihans' => Tagihan::all(),
            'pembayaran' => Pembayaran::all()
        ];
        return view('admin.tagihan.bayar', $data);
    }

    public function create()
    {
        $santris = Santri::all();
        return view('pembayaran.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'tagihan_id' => 'required',
            'total_tagihan' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        Pembayaran::create([
            'santri_id' => $request->santri_id,
            'tagihan_id' => $request->tagihan_id,
            'total_tagihan' => $request->total_tagihan,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.checkout', $request->santri_id);
    }

    public function checkout($santriId)
    {
        $santri = Santri::find($santriId);
        if (!$santri) {
            return redirect()->back()->with('error', 'Santri tidak ditemukan.');
        }

        $pembayaran = $santri->pembayaran()->latest()->first();
        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Data pembayaran tidak ditemukan.');
        }

        $tagihan = $pembayaran->tagihan;
        if (!$tagihan) {
            return redirect()->back()->with('error', 'Tagihan tidak ditemukan.');
        }

        $serverKey = config('midtrans.serverKey');
    $isProduction = config('midtrans.isProduction');
    $is3ds = true;

    Config::$serverKey = $serverKey;
    Config::$isProduction = $isProduction;
    Config::$is3ds = $is3ds;

        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $tagihan->jumlah,
        ];

        $customerDetails = [
            'first_name' => $santri->nama_santri,
            'last_name' => $santri->nama_santri,
            'email' => $santri->email,
            'phone' => $santri->nomor_telepon,
        ];

        $itemDetails = [
            [
                'id' => $tagihan->id,
                'price' => $tagihan->jumlah,
                'quantity' => 1,
                'name' => 'Tagihan Pembayaran',
            ],
        ];

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
        ];

        $snapToken = Snap::getSnapToken($transactionData);

        // Simpan data pembayaran ke database atau sesuai kebutuhan aplikasi Anda

        return redirect()->away(Snap::createTransaction($transactionData)->redirect_url);
    }
}
