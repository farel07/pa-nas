<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kelas_User;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.master.users.users', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|min:6',
            'nisn_npsn' => 'required|max:12',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|min:4|unique:users',
            'password' => 'required|min:4',
        ]);

        if ($request->is_siswa) {
            $request->validate(['kelas_id' => 'required']);
            $validatedData['role_id'] = 3;
            $to = 'siswa';
        } else if ($request->is_guru) {
            $validatedData['role_id'] = 2;
            $to = 'guru';
        }

        $user = User::create($validatedData);

        if ($request->is_siswa) {
            Kelas_User::create([
                'user_id' => $user->id,
                'kelas_id' => $request->kelas_id
            ]);
        }

        return redirect('/admin/master/user/' . $to)->with('success', 'Data ' . $to . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('dashboard.admin.master.users.show_siswa');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $data = [
            'user' => User::find($id)
        ];

        if ($user->role_id == 3) {
            $data['kelas'] = Kelas::all();
            return view('dashboard.admin.master.users.edit_siswa', $data);
        } elseif ($user->role_id == 2) {
            return view('dashboard.admin.master.users.edit_guru', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:6',
            'nisn_npsn' => 'required|max:12',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        if ($request->is_siswa) {

            $request->validate(['kelas_id' => 'required']);
            Kelas_User::where('user_id', $id)->update(['kelas_id' => $request->kelas_id]);
            $to = 'siswa';
        } else if ($request->is_guru) {

            $to = 'guru';
        }

        User::where('id', $id)->update($validatedData);

        return redirect('/admin/master/user/' . $to)->with('success', 'Data ' . $to . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        User::destroy($id);

        if ($user->role_id == 3) {
            $to = 'siswa';
        } else if ($user->role_id == 2) {
            $to = 'guru';
        }

        return redirect('/admin/master/user/' . $to)->with('success', 'Data ' . $to . ' berhasil dihapus!');
    }

    public function siswa()
    {
        $data = ['siswa' => User::where('role_id', 3)->get()];
        return view('dashboard.admin.master.users.siswa', $data);
    }

    public function guru()
    {
        $data['guru'] = User::where('role_id', 2)->get();
        return view('dashboard.admin.master.users.guru', $data);
    }

    public function create_siswa()
    {
        $data = [
            'kelas' => Kelas::all()
        ];

        return view('dashboard.admin.master.users.create_siswa', $data);
    }

    public function create_guru()
    {
        return view('dashboard.admin.master.users.create_guru');
    }
}
