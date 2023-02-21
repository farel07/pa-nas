<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use App\Models\AvgNilai;
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
        $data['nama_nilai'] = Nama_Nilai::where('guru_mapel_id', $id)->where('status', 1)->get();
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

        foreach($guru_mapel->nama_nilai as $nn){
            if($nn->nilai_siswa->isEmpty()){
                return back()->with('error', 'Masih terdapat nilai siswa yang belum diisi');
            }
        }
        // return view('dashboard.guru.penilaian.data_nilai_siswa.export_nilai',[
        //     'nama_nilai' => Nama_Nilai::where('guru_mapel_id', $id)->get(),
        //     'kelas' => Kelas::find(Guru_Mapel::find($id)->kelas_id),
        //     'nilai_siswa' => function($user_id, $nama_nilai_id){
        //         return Nilai_Siswa::where('user_id', $user_id)->where('nama_nilai_id', $nama_nilai_id)->get();
        //     }
        // ]);
        return Excel::download(new NilaiExport($id), 'Nilai_.' . $guru_mapel->mapel->nama_mapel . '_'  . '_' .$guru_mapel->kelas->nama_kelas . '_' . time() . '.xlsx');
    }

    public function avg_nilai($id){

        $pengetahuan = [];
        $keterampilan = [];
        foreach(Guru_Mapel::find($id)->nama_nilai as $nn){
            if($nn->teknik_nilai->kategori_nilai_id == 1){
                $pengetahuan[] = $nn;
            } else if($nn->teknik_nilai->kategori_nilai_id == 2){
                $keterampilan[] = $nn;
            }
            if($nn->nilai_siswa->isEmpty()){
                return back()->with('error', 'Masih terdapat nilai siswa yang belum diisi');
            }
        }

        if(!$pengetahuan){
        return back()->with('error', 'Belum ada rencana penilaian dengan kategori pengetahuan');

        } elseif(!$keterampilan)
        return back()->with('error', 'Belum ada rencana penilaian dengan kategori keterampilan');

        return view('dashboard.guru.penilaian.data_nilai_siswa.avg_nilai', [
            'guru_mapel' => Guru_Mapel::find($id),
            'title' => 'Rata-Rata'
        ]);
    }

    public function avg_nilai_store(Request $request, $id){

        $percent = 0;
        for($i = 0; $i < count($request->nama_nilai_id_1); $i++){
            $request->validate([
                'persentase_1.' . $i => 'required|integer|min:0|max:100'
            ]);
            $percent += $request->persentase_1[$i];
            if($percent > 100){
                return back()->with('error','Jumlah persentase tidak lebih dari 100');
            }
        }

        $percent = 0;
        for($i = 0; $i < count($request->nama_nilai_id_2); $i++){
            $request->validate([
                'persentase_2.' . $i => 'required|integer|min:0|max:100'
            ]);
            $percent += $request->persentase_2[$i];
            if($percent > 100){
                return back()->with('error','Jumlah persentase tidak lebih dari 100');
            }
        }

        // return Guru_Mapel::find($id)->avg_nilai;
        $kelas = Kelas::find(Guru_Mapel::find($id)->kelas_id);
        foreach($kelas->user_kelas as $uk){
            $data_nilai_1 = [];
            $data_nilai_2 = [];
            $nilai = 0;  

            for($i = 0; $i < count($request->nama_nilai_id_1); $i++){
            $nilai = Nilai_Siswa::where('user_id', $uk->user->id)->where('nama_nilai_id', $request->nama_nilai_id_1[$i])->get()[0]->nilai * $request->persentase_1[$i] / 100;
            $data_nilai_1[] = $nilai;
            }

            for($i = 0; $i < count($request->nama_nilai_id_2); $i++){
                $nilai = Nilai_Siswa::where('user_id', $uk->user->id)->where('nama_nilai_id', $request->nama_nilai_id_2[$i])->get()[0]->nilai * $request->persentase_2[$i] / 100;
                $data_nilai_2[] = $nilai;
                }

            if(AvgNilai::where('user_id', $uk->user->id)->where('guru_mapel_id', Guru_Mapel::find($id)->id)->get()->isEmpty()){
            
                AvgNilai::create([
                    'user_id' => $uk->user->id,
                    'mapel_id' => Guru_Mapel::find($id)->mapel_id,
                    'guru_mapel_id' => Guru_Mapel::find($id)->id,
                    'avg_nilai' => array_sum($data_nilai_1),
                    'kategori_nilai_id' => 1
                ]);

                AvgNilai::create([
                    'user_id' => $uk->user->id,
                    'mapel_id' => Guru_Mapel::find($id)->mapel_id,
                    'guru_mapel_id' => Guru_Mapel::find($id)->id,
                    'avg_nilai' => array_sum($data_nilai_2),
                    'kategori_nilai_id' => 2
                ]);

            } else {
                
                AvgNilai::where('user_id', $uk->user->id)->where('guru_mapel_id', Guru_Mapel::find($id)->id)->where('kategori_nilai_id', 1)->update([
                    'avg_nilai' => array_sum($data_nilai_1)
                ]);

                AvgNilai::where('user_id', $uk->user->id)->where('guru_mapel_id', Guru_Mapel::find($id)->id)->where('kategori_nilai_id', 2)->update([
                    'avg_nilai' => array_sum($data_nilai_2)
                ]);

            }

        }

        return redirect('/guru/penilaian/data_nilai_siswa/' . Guru_Mapel::find($id)->kelas_id)->with('success', 'Berhasil Meghitung Rata-Rata');
}

}