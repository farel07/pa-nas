<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas_id = auth()->user()->kelas_user->kelas_id;

        return view('dashboard.siswa.show.index', [
            'title' => 'Profil Siswa',
            'user' => auth()->user(),
            'kelas' => Kelas::find($kelas_id)
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
        $validateData = $request->validate([
            'img' => 'image|file|max:6000' // max ukuran file adalah 6 mb
        ]);

        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('user-profile', ['disk' => 'public']);
        }

        User::find(auth()->user()->id)->update($validateData);
        // return back()->with('success', 'Foto Profil Berhasil di Tambahkan');
        return response()->json([
            'status' => 1,
            'msg' => 'Profile picture has been changed!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'img' => 'image|file|max:6000' // max ukuran file adalah 6 mb
        ]);

        $user = User::find($id);

        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('user-profile', ['disk' => 'public']);
            Storage::disk('public')->delete($user->img);
        }

        User::find($id)->update($validateData);
        return back()->with('success', 'Foto Profil Berhasil di Ubah');
    }

    public function change_password(Request $request, $id)
    {
        $validateData = $request->validate([
            'password' => 'required|min:5'
        ]);

        $validateData['password'] = bcrypt($request->password);

        User::find($id)->update($validateData);
        return back()->with('success', 'Password Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Storage::disk('public')->delete($user->img);

        $validateData['img'] = null;

        User::find($id)->update($validateData);
        return back()->with('success', 'Foto Berhasil di Hapus');
    }
}
