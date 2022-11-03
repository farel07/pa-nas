<?php

namespace App\Http\Controllers;

use App\Models\Guru_Mapel;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nama_Nilai;
use App\Models\Teknik_Nilai;
use Illuminate\Http\Request;

class NamaPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function index_kelas()
    {
        $data = [
            'user' => auth()->user()
        ];

        $kelas_mapel_id = Guru_Mapel::where('user_id', auth()->user()->id)->get('kelas_id');

        $data_kelas_id = [];

        for ($i = 0; $i < count($kelas_mapel_id); $i++) {
            if (!in_array($kelas_mapel_id[$i]->kelas_id, $data_kelas_id)) {
                $data_kelas_id[] = $kelas_mapel_id[$i]->kelas_id;
                $data['kelas'][] = Kelas::find($kelas_mapel_id[$i]->kelas_id);
            }
        }

        $data['kelas_mapel'] = function ($kelas_id) {
            return Guru_Mapel::where('user_id', auth()->user()->id)->where('kelas_id', $kelas_id)->get();
        };

        return view('dashboard.guru.penilaian.nama_nilai.index_kelas', $data);
    }

    public function list_mapel($id)
    {
        $data['mapel'] = Guru_Mapel::where('user_id', auth()->user()->id)->where('kelas_id', $id)->get();
        return view('dashboard.guru.penilaian.nama_nilai.mapel_kelas', $data);
    }

    public function show_nama_penilaian($id)
    {
        $data['nama_penilaian'] = Nama_Nilai::where('guru_mapel_id', $id)->get();
        return view('dashboard.guru.penilaian.nama_nilai.nama_nilai_mapel', $data);
    }

    public function create_nama_penilaian($id)
    {
        $data['guru_mapel_id'] = $id;
        $data['teknik_penilaian'] = Teknik_Nilai::all();
        return view('dashboard.guru.penilaian.nama_nilai.create_nilai_mapel', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'nama' => 'required',
            'guru_mapel_id' => 'required',
            'teknik_nilai_id' => 'required'
        ]);

        $validateData['status'] = 0;

        Nama_Nilai::create($validateData);
        return back()->with('success', 'Data Berhasil Ditambahkan');
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
        return view('dashboard.guru.penilaian.nama_nilai.input_select_teknik', [
            'teknik_nilai' => Teknik_Nilai::all(),
            'nama_penilaian' => Nama_Nilai::find($id)
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
            'nama' => 'required',
            'teknik_nilai_id' => 'required',
            'guru_mapel_id' => 'required'
        ]);

        Nama_Nilai::find($id)->update($validateData);
        return back()->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nama_Nilai::destroy($id);
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
