<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use App\Helpers\ApiFormatter;
use Exception;
use App\Models\User;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Formulir::with('users')->get();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
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
        try{
            $request->validate([
                'nama_lengkap' => 'required',
                'nisn' => 'required',
                'jenis_kelamin' => 'required',
                'ttl' => 'required',
                'alamat' => 'required',
                'asal_sekolah' => 'required',
                'tahun_lulus' => 'required',
                'nama_wali' => 'required',
                'nik' => 'required',
                'pekerjaan_wali' => 'required',
                'alamat_wali' => 'required',
                'nomor_wa' => 'required',
                'pilihan_sekolah' => 'required',
                'ijazah' => 'required',
                'skhu' => 'required',
                'foto' => 'required',
                'user_id' => 'required'
            ]);

            $createForm = $request->all();

            $form = Formulir::create($createForm);

            if($form){
                return ApiFormatter::createApi(200, 'Success', $form);
            }else{
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error){
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
}
