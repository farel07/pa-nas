<?php

namespace App\Http\Controllers;

use App\Models\Guru_Mapel;
use App\Models\Kelas;
use App\Models\Kelas_User;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'mapel' => Mapel::latest()->get(),
            'kelas' => Kelas::latest()->get()
        ];

        return view('dashboard.admin.master.mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.master.mapel.create_mapel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = ([
            'required' => 'Isien Le'
        ]);

        $validateData = $request->validate([
            'nama_mapel' => 'required|unique:mapel'
        ], $messages);

        Mapel::create($validateData);
        return redirect('/admin/master/list_mapel')->with('success', 'Mapel Berhasil Ditambahkan');
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
        return view('dashboard.admin.master.mapel.update_mapel', [
            'mapel' => Mapel::find($id)
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
        $messages = ([
            'required' => 'Isien Le'
        ]);

        $validateData = $request->validate([
            'nama_mapel' => 'required|unique:mapel'
        ], $messages);

        Mapel::where('id', $id)->update($validateData);
        return redirect('/admin/master/list_mapel')->with('success', 'Mapel Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::destroy('id', $id);

        return redirect('/admin/master/list_mapel')->with('success', 'Mapel Berhasil Dihapus');
    }

    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    public function index2()
    {
        return view('dashboard.admin.master.mapel.list_mapel', [
            'mapel' => Mapel::latest()->get()
        ]);
    }

    public function show2($id)
    {
        return view('dashboard.admin.master.mapel.list_kelas_mapel', [
            'kelas' => Kelas::find($id)
        ]);
    }

    public function add_mapel_at_class($id)
    {
        return view('dashboard.admin.master.mapel.add_mapel_at_class', [
            'mapel' => Mapel::latest()->get(),
            'kelas' => Kelas::find($id)
        ]);
    }

    public function store_mapel_at_class(Request $request)
    {
        $validateData = $request->validate([
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);

        Guru_Mapel::create($validateData);
        return redirect('/admin/master/mapel')->with('success', 'Mapel Kelas Berhasil Ditambahkan');
    }

    public function destroy_mapel_at_class($id)
    {
        Guru_Mapel::destroy('id', $id);

        return redirect('/admin/master/kelas_mapel/{id}')->with('success', 'Mapel Kelas Berhasil Dihapus');
    }
}
