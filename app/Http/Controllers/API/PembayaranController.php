<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Santri;
use Midtrans\Config;
use Midtrans\Snap;
use Exception;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::with('formulirs')->get();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'terbilang' => 'required',
                'detail' => 'required',
                'form_id' => 'required',

            ]);

            $createPembayaran = $request->all();

            $pembayaran = Pembayaran::create($createPembayaran);

            if ($pembayaran) {
                return ApiFormatter::createApi(200, 'Success', $pembayaran);
            } else {
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'tagihan_id' =>  'required',
            'total_tagihan' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        Pembayaran::create([
            'santri_id' => $request->santri_id,
            'tagihan_id' => $request->tagihan_id,
            'total_tagihan' => $request->total_tagihan,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        $santri = Santri::find($request->santri_id);
        if (!$santri) {
            return [
                'code' => 400,
                'message' => 'Santri tidak ditemukan'
            ];
        }

        $pembayaran = $santri->pembayaran()->latest()->first();
        if (!$pembayaran) {
            return [
                'code' => 400,
                'message' => 'Pembayaran tidak ditemukan'
            ];
        }

        $tagihan = $pembayaran->tagihan;
        if (!$tagihan) {
            return [
                'code' => 400,
                'message' => 'Tgihan tidak ditemukan'
            ];
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

        try {
            $url_tagihan = Snap::createTransaction($transactionData)->redirect_url;
            return ApiFormatter::createApi(201, 'Berhasil buat tagihan', $url_tagihan);
        } catch (\Throwable $th) {
            return [
                'code' => 400,
                'message' => 'gagal buat tagihan',
                'errors' => $th->getMessage()
            ];
        }
    }
}
