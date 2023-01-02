<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru_Mapel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'guru_mapel';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function nama_nilai(){
        return $this->hasMany(Nama_Nilai::class, 'guru_mapel_id', 'id');
    }
}
