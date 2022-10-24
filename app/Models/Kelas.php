<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function user_kelas(){
        return $this->hasMany(Kelas_User::class, 'kelas_id', 'id');
    }
    
    public function mapel(){
        return $this->belongsToMany(Mapel::class, 'guru_mapel', 'kelas_id', 'mapel_id', 'id')->withPivot('id');   
    }
}
