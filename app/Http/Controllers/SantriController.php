<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

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
        return view('admin.santri.tambahsantri');
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
            'nama_santri' => 'required'
           ];
           $this->validate($request,$rules);
    
           Santri::create(
            [
                'nama_santri' => $request->nama_santri
            ]
            );
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
