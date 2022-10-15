<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknik_Nilai extends Model
{
    use HasFactory;
    protected $table = 'teknik_nilai';
    protected $guarded = ['id'];

    public function kategori_nilai(){
        return $this->belongsTo(Kategori_Nilai::class, 'kategori_nilai_id', 'id');
    }
}
