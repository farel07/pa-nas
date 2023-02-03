<?php

namespace App\Exports;

use App\Models\AvgNilai;
use App\Models\Kelas;
use App\Models\Guru_Mapel;
use App\Models\Nama_Nilai;
use App\Models\Nilai_Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\WithHeadings;



class NilaiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($guru_mapel_id)
    {
        $this->guru_mapel_id = $guru_mapel_id;
    }

    public function view(): View
    {
        return view('dashboard.guru.penilaian.data_nilai_siswa.export_nilai',[
            'nama_nilai' => Nama_Nilai::where('guru_mapel_id', $this->guru_mapel_id)->has('nilai_siswa')->get(),
            'kelas' => Kelas::find(Guru_Mapel::find($this->guru_mapel_id)->kelas_id),
            'nilai_siswa' => function($user_id, $nama_nilai_id){
                return Nilai_Siswa::where('user_id', $user_id)->where('nama_nilai_id', $nama_nilai_id)->get();
            },
            'avg' => function($user_id, $guru_mapel_id){
                return AvgNilai::where('user_id', $user_id)->where('guru_mapel_id', $guru_mapel_id)->get();
            },
            'guru_mapel' => Guru_Mapel::find($this->guru_mapel_id)
        ]);
    }

    // public function headings(): array{
    //     return  ['user_id', 'nilai'];
    // }
}
