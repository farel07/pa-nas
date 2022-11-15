<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nama_Nilai extends Model
{
    use HasFactory;
    protected $table = 'nama_nilai';
    protected $guarded = ['id'];

    public function teknik_nilai(){
        return $this->belongsTo(Teknik_Nilai::class, 'teknik_nilai_id', 'id');
    }

    public function guru_mapel(){
        return $this->belongsTo(Guru_Mapel::class, 'guru_mapel_id', 'id');
    }

    public function nilai_siswa(){
        return $this->hasMany(Nilai_Siswa::class, 'nama_nilai_id', 'id');
    }
}
