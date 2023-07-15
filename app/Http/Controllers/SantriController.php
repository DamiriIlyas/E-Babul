<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'santri' => Santri::all()
        ];
        return view('admin.santri.santri',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'santri' => Santri::all(),
            'sekolah' => Sekolah::all()
        ];
        return view('admin.santri.tambahsantri',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nama_santri' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'tahun_lulus' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'nik_wali' => 'required',
            'nomor_telepon' => 'required',
            'id_sekolah' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5000',
           ]);
        
        $filename = $request->foto->getClientOriginalName();
        $request->file('foto')->move('fotosantri/', $request->file('foto')->getClientOriginalName());
        // $request->foto = $request->file('foto')->getClientOriginalName();
        // $tanggal_lahir = Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->format('Y-m-d');
           Santri::create(
            [
                'nama_santri' => $request->nama_santri,
                'nisn' =>  $request->nisn,
                'nik' =>  $request->nik,
                'jenis_kelamin' =>  $request->jenis_kelamin,
                'tempat_lahir' =>  $request->tempat_lahir,
                'tanggal_lahir' =>  $request->tanggal_lahir,
                'alamat_lengkap' =>  $request->alamat_lengkap,
                'tahun_lulus' =>  $request->tahun_lulus,
                'nama_wali' =>  $request->nama_wali,
                'alamat_wali' =>  $request->alamat_wali,
                'pekerjaan_wali' =>  $request->pekerjaan_wali,
                'nik_wali' =>  $request->nik_wali,
                'nomor_telepon' =>  $request->nomor_telepon,
                'id_sekolah' =>  $request->id_sekolah,
                'foto' => $filename
                ]
            );
            // dd($request->all());
            return redirect('/santri');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri, $id)
    {
        $data = [
            'santri' => Santri::find($id)
        ];
        return view('admin.santri.editsantri', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri, $id)
    {
        $rules = [
            'nama_santri' => 'required'
           ];
           $this->validate($request,$rules);

           $santri = Santri::find($id);
           $santri->nama_santri = $request->input('nama_santri');

           $santri->update();

           return redirect('/santri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri, $id)
    {
        $santri = Santri::find($id);

        $santri->delete();

        return redirect('/santri');
    }
}
