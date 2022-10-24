<?php

namespace App\Http\Controllers;

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
            'mapel' => Mapel::latest()->get()
        ];

        return view('dashboard.admin.master.mapel.index', $data);
    }

    public function index2()
    {
        return view('dashboard.admin.master.mapel.list_mapel', [
            'mapel' => Mapel::latest()->get()
        ]);
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
}
