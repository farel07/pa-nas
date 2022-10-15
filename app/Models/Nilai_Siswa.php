<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_Siswa extends Model
{
    use HasFactory;
    protected $table = 'nilai_siswa';
    protected $guarderd = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function nama_nilai(){
        return $this->belongsTo(Nama_Nilai::class, 'nama_nilai_id', 'id');
    }
}
