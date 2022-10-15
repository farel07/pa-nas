<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $guarded = ['id'];

    public function nama_nilai(){
        return $this->belongsToMany(Teknik_Nilai::class, 'nama_nilai', 'guru_mapel_id', 'teknik_nilai_id')->withPivot('nama');
    }
}
