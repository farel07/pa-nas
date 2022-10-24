<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru_Mapel;
use App\Models\Kategori_Nilai;
use App\Models\Kelas;
use App\Models\Kelas_User;
use App\Models\Mapel;
use App\Models\Nama_Nilai;
use App\Models\Nilai_Siswa;
use App\Models\Role;
use App\Models\Teknik_Nilai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ============== Tambah Role ==============
        Role::create([
            'role' => 'administrator'
        ]);
        Role::create([
            'role' => 'guru'
        ]);
        Role::create([
            'role' => 'siswa'
        ]);



        // =============== Tambah Kelas ==============
        Kelas::create([
            'nama_kelas' => 'XI RPL 1'
        ]);



        // =============== Tambah Mapel ==============
        Mapel::create([
            'nama_mapel' => 'Matematika'
        ]);
        Mapel::create([
            'nama_mapel' => 'IPA'
        ]);



        // ============== tambah user ==================
        User::create([
            'username' => 'admin',
            'password' => bcrypt('123qwe'),
            'nisn_npsn' => '000000',
            'name' => 'asdds asda',
            'tempat_lahir' => 'asdad',
            'tanggal_lahir' => now(),
            'role_id' => 1
        ]);
        User::create([
            'username' => 'guru',
            'password' => bcrypt('123qwe'),
            'nisn_npsn' => '1203909',
            'name' => 'guru',
            'tempat_lahir' => 'asdad',
            'tanggal_lahir' => now(),
            'role_id' => 2
        ]);
        User::create([
            'username' => 'siswa',
            'password' => bcrypt('123qwe'),
            'nisn_npsn' => '0098122231',
            'name' => 'siswa',
            'tempat_lahir' => 'asdad',
            'tanggal_lahir' => now(),
            'role_id' => 3
        ]);

        User::create([
            'username' => 'fadli',
            'password' => '123qwe',
            'nisn_npsn' => 'aa922',
            'name' => 'faldi',
            'tempat_lahir' => 'asdad',
            'tanggal_lahir' => now(),
            'role_id' => 3
        ]);



        // ============ tambah kelas untuk user ==============
        Kelas_User::create([
            'user_id' => 3,
            'kelas_id' => 1
        ]);

        Kelas_User::create([
            'user_id' => 4,
            'kelas_id' => 1
        ]);


        // ================== tambah guru pada mapel ===================
        Guru_Mapel::create([
            'user_id' => 2,
            'mapel_id' => 1
        ]);
        Guru_Mapel::create([
            'user_id' => 2,
            'mapel_id' => 2
        ]);



        // ============== tambah kategori penilaian ==================
        Kategori_Nilai::create([
            'kategori' => 'Pengetahuan'
        ]);
        Kategori_Nilai::create([
            'kategori' => 'Keterampilan'
        ]);



        //  ================ tmabah teknik pada penilaian ===============
        Teknik_Nilai::create([
            'teknik' => 'tulis',
            'kategori_nilai_id' => 1
        ]);



        // =================== tambah nama penilaian =======================
        Nama_Nilai::create([
            'nama' => 'Ulangan harian 1',
            'teknik_nilai_id' => 1,
            'guru_mapel_id' => 1
        ]);
        Nama_Nilai::create([
            'nama' => 'Ulangan harian 2',
            'teknik_nilai_id' => 1,
            'guru_mapel_id' => 1
        ]);

        Nama_Nilai::create([
            'nama' => 'Ulangan harian 1',
            'teknik_nilai_id' => 1,
            'guru_mapel_id' => 2
        ]);



        // ============== tambah nilai untuk siswa ================
        Nilai_Siswa::create([
            'user_id' => 2,
            'mapel_id' => 1,
            'nama_nilai_id' => 1,
            'nilai' => 90
        ]);

        User::create([
            'username' => 'aijen',
            'password' => bcrypt('123qwe'),
            'nisn_npsn' => '007474367',
            'name' => 'Aijen Bilek',
            'tempat_lahir' => 'Bilek island',
            'tanggal_lahir' => now(),
            'role_id' => 3
        ]);

        Kelas_User::create([
            'user_id' => 5,
            'kelas_id' => 1
        ]);
    }
}
