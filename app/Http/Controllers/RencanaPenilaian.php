<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Nilai;
use App\Models\Nama_Nilai;
use App\Models\Teknik_Nilai;
use Illuminate\Http\Request;

class RencanaPenilaian extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.master.rencana_penilaian.index', [
            'title' => 'Rencana penilaian',
            'teknik_nilai' => Teknik_Nilai::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.master.rencana_penilaian.create', [
            'title' => 'Tambah Rencana Penilaian',
            'kategori_nilai' => Kategori_Nilai::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'teknik' => 'required',
            'kategori_nilai_id' => 'required'
        ]);

        Teknik_Nilai::create($validateData);
        return back()->with('success', 'Rencana Penilaian Berhasil Ditambahkan');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin.master.rencana_penilaian.edit', [
            'title' => 'Edit Rencana Penilaian',
            'teknik_nilai' => Teknik_Nilai::find($id),
            'kategori_nilai' => Kategori_Nilai::latest()->get()
        ]);
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
        $validateData = $request->validate([
            'teknik' => 'required',
            'kategori_nilai_id' => 'required'
        ]);

        Teknik_Nilai::find($id)->update($validateData);
        return back()->with('success', 'Rencana Penilaian Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teknik_Nilai::destroy($id);

        return back()->with('success', 'Rencana Penilaian Berhasil Di Hapus');
    }
}
