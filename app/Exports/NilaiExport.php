<?php

namespace App\Exports;

use App\Models\Nilai_Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\WithHeadings;



class NilaiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($nama_nilai_id)
    {
        $this->nama_nilai_id = $nama_nilai_id;
    }

    public function view(): View
    {
        return view('dashboard.guru.penilaian.data_nilai_siswa.export_nilai',[
            'nilai_siswa' => Nilai_Siswa::where('nama_nilai_id', $this->nama_nilai_id)->get()
        ]);
    }

    // public function headings(): array{
    //     return  ['user_id', 'nilai'];
    // }
}
