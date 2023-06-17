<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'sekolah' => Sekolah::all()
        ];
        return view('admin.sekolah.sekolah',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sekolah.tambahsekolah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules = [
        'nama_sekolah' => 'required'
       ];
       $this->validate($request,$rules);

       Sekolah::create(
        [
            'nama_sekolah' => $request->nama_sekolah
        ]
        );
        return redirect('/sekolah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah, $id)
    {
        $data = [
            'sekolah' => Sekolah::find($id)
        ];
        return view('admin.sekolah.editsekolah',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah, $id)
    {
        $rules = [
            'nama_sekolah' => 'required'
           ];
           $this->validate($request,$rules);

           $sekolah = Sekolah::find($id);
           $sekolah->nama_sekolah = $request->input('nama_sekolah');

           $sekolah->update();

           return redirect('/sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah,$id)
    {
        $sekolah = Sekolah::find($id);

        $sekolah->delete();

        return redirect('/sekolah');
    }
}
