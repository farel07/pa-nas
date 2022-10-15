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

    // public function nama_nilai(){
    //     return $this->belongsToMany(Teknik_Nilai::class, 'nama_nilai');
    // }
}
