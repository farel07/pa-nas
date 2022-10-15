<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas_User extends Model
{
    use HasFactory;
    protected $table = 'user_kelas';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
