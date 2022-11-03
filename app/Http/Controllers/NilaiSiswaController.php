<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru_Mapel;
use App\Models\Mapel;
use App\Models\Nama_Nilai;
use App\Models\Nilai_Siswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
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

    public function index_kelas(){

        $data = [
            'user' => auth()->user()
        ];

        $kelas_mapel_id = Guru_Mapel::where('user_id', auth()->user()->id)->get('kelas_id');

        $data_kelas_id = [];
        
        for($i = 0; $i < count($kelas_mapel_id); $i++){
            if(!in_array($kelas_mapel_id[$i]->kelas_id, $data_kelas_id)){
                $data_kelas_id[] = $kelas_mapel_id[$i]->kelas_id;
                $data['kelas'][] = Kelas::find($kelas_mapel_id[$i]->kelas_id);
            }
        }

        $data['kelas_mapel'] = function($kelas_id){
            return Guru_Mapel::where('user_id', auth()->user()->id)->where('kelas_id', $kelas_id)->get();
        };

        return view('dashboard.guru.penilaian.nilai_siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = [
            'mapel' => Guru_Mapel::where('kelas_id', $id)->where('user_id', auth()->user()->id)->get(),
            'kelas' => Kelas::find($id)
        ];

        return view('dashboard.guru.penilaian.nilai_siswa.create_nilai_siswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'guru_mapel_id' => 'required',
            'nama_nilai_id' => 'required',
            'user_id' => 'required',
        ]);

        $validatedData['nama_nilai_id'] = $request->nama_nilai_id;
        $validatedData['user_id'] = $request->user_id;
        $validatedData['nilai'] = $request->nilai;
  

        $fix_data = [];
        
        for($i = 0; $i < count($validatedData['user_id']); $i++){
            $per_data = [
                'user_id' => $validatedData['user_id'][$i],
                'nilai' => $validatedData['nilai'][$i],
                'nama_nilai_id' => $validatedData['nama_nilai_id'],
                'mapel_id' => Mapel::find(Guru_Mapel::find($request->guru_mapel_id)->mapel_id)->id
            ];

            $fix_data[] = $per_data;
        }

        Nilai_Siswa::insert($fix_data);

        return back()->with('success', 'Berhasil menambah nilai siswa');
        
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

    public function select_nama_nilai($id){
        // return response()->json(Nama_Nilai::where('guru_mapel_id', $id)->get()); 
        return view('dashboard.guru.penilaian.nilai_siswa.select_nama_nilai',[
            'nama_nilai' => Nama_Nilai::where('guru_mapel_id', $id)->get(),
            'siswa' => Kelas::find(Guru_Mapel::find($id)->kelas_id)->user_kelas
        ]);
    }
}
