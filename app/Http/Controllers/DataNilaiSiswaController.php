<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Models\Guru_Mapel;
use App\Models\Kelas;
use App\Models\Nama_Nilai;
use App\Models\Nilai_Siswa;
use Maatwebsite\Excel\Facades\Excel;

class DataNilaiSiswaController extends Controller
{
    public function index()
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

        $data['title'] = 'Data Nilai Siswa';

        return view('dashboard.guru.penilaian.data_nilai_siswa.index', $data);
    }

    public function show_penilaian($id)
    {

        $data = [
            'mapel' => Guru_Mapel::where('kelas_id', $id)->where('user_id', auth()->user()->id)->get(),
            'kelas' => Kelas::find($id),
            'title' => 'Data Nilai Siswa Dalam Kelas',
            'user' => auth()->user()
        ];

        return view('dashboard.guru.penilaian.data_nilai_siswa.show_penilaian', $data);
    }

    public function show_nama_penilaian($id)
    {
        // $data['nama_nilai'] = Nama_Nilai::where('guru_mapel_id', $id)->where('status', 1)->get();
        $data['guru_mapel'] = Guru_Mapel::find($id);
        return view('dashboard.guru.penilaian.data_nilai_siswa.nama_nilai', $data);
    }

    public function edit_nilai($id)
    {
        $data = [
            'nama_nilai' => Nama_Nilai::find($id),
            'title' => 'Edit Nilai Siswa',
            'user' => auth()->user()
        ];
        return view('dashboard.guru.penilaian.data_nilai_siswa.edit_nilai', $data);
    }

    public function form_edit($id)
    {
        $data = [
            'nilai_siswa' => Nilai_Siswa::find($id),
            'user' => auth()->user()
        ];
        return view('dashboard.guru.penilaian.data_nilai_siswa.form_edit', $data);
    }

    public function update_nilai($id, Request $request)
    {
        // return count($request->user_id);
        $request->validate([
            'nilai' => 'required',
        ]);

        // for ($i = 0; $i < count($request->user_id); $i++) {

        //     if ($request->nilai[$i] == null) {
        //         $validateData['nilai'] = 0;
        //     } else {
        //         $validateData['nilai'] = $request->nilai[$i];
        //     }

        //     Nilai_Siswa::where('user_id', $request->user_id[$i])->where('nama_nilai_id', $id)->update($validateData);
        // }

        $validateData['nilai'] = $request->nilai;

        Nilai_Siswa::where('id', $id)->update($validateData);

        return back()->with('success', 'Berhasil mengedit nilai siswa');
    }

    public function export_nilai($id){
        $guru_mapel = Guru_Mapel::find($id);
        // return view('dashboard.guru.penilaian.data_nilai_siswa.export_nilai',[
        //     'nama_nilai' => Nama_Nilai::where('guru_mapel_id', $id)->get(),
        //     'kelas' => Kelas::find(Guru_Mapel::find($id)->kelas_id),
        //     'nilai_siswa' => function($user_id, $nama_nilai_id){
        //         return Nilai_Siswa::where('user_id', $user_id)->where('nama_nilai_id', $nama_nilai_id)->get();
        //     }
        // ]);
        return Excel::download(new NilaiExport($id), 'Nilai_.' . $guru_mapel->mapel->nama_mapel . '_'  . '_' .$guru_mapel->kelas->nama_kelas . '_' . time() . '.xlsx');
    }
}
