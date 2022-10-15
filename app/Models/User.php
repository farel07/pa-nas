<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = ['id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function kelas_user(){
        return $this->hasOne(Kelas_User::class, 'user_id', 'id');
    }

    public function guru_mapel()
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel', 'user_id', 'mapel_id');
    }

    public function nilai_siswa()
    {
        return $this->hasMany(Nilai_Siswa::class, 'user_id', 'id');
    }
}
