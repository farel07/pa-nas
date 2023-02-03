<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\AvgNilai;
use App\Models\Guru_Mapel;
use App\Models\Nama_Nilai;
use App\Models\Nilai_Siswa;
use Illuminate\Http\Request;

class GetNilaiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::find(auth()->user()->kelas_user->kelas->id);
        return view('dashboard.siswa.show.nilai.showKelasSiswa', [
            'kelas' => $kelas,
            'title' => 'Mapel Kelas',
            'user' => auth()->user(),
            'guru_mapel' => function($mapel_id, $kelas_id){
                return Guru_Mapel::where('mapel_id', $mapel_id)->where('kelas_id', $kelas_id)->get()[0];
            }
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view('dashboard.siswa.show.nilai.show_nilai', [
            'guru_mapel' => function($mapel_id, $kelas_id){
                return Guru_Mapel::where('mapel_id', $mapel_id)->where('kelas_id', $kelas_id)->get()[0];
            },
            'mapel' => Mapel::find($id),
            'nilai_siswa' => function($user_id, $nama_nilai_id){
                return Nilai_Siswa::where('user_id', $user_id)->where('nama_nilai_id', $nama_nilai_id)->get();
            },
            'title' => 'Nilai Siswa',
            'avg' => function($guru_mapel_id){
                return AvgNilai::where('user_id', auth()->user()->id)->where('guru_mapel_id', $guru_mapel_id)->first();
            }
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function nilai_siswa($id){

        return view('dashboard.siswa.show.nilai.show_nilai', [
            'guru_mapel' => function($mapel_id, $kelas_id){
                return Guru_Mapel::where('mapel_id', $mapel_id)->where('kelas_id', $kelas_id)->get()[0];
            },
            'mapel' => Mapel::find($id),
            'nilai_siswa' => function($user_id, $nama_nilai_id){
                return Nilai_Siswa::where('user_id', $user_id)->where('nama_nilai_id', $nama_nilai_id)->get();
            }
        ]);
    }
}
