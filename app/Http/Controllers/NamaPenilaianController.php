<?php

namespace App\Http\Controllers;

use App\Models\Guru_Mapel;
use App\Models\Kelas;
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

        return view('dashboard.guru.penilaian.nama_nilai.index_kelas', $data);
    }

    public function list_mapel($id){
        return Guru_Mapel::where('user_id', auth()->user()->id)->where('kelas_id', $id)->get();
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
}
