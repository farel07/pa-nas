<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        // 
    }

    public function upload(Request $request)
    {
        $validateData = $request->validate([
            'app_logo' => 'file|image|max:6000'
        ]);

        $app_logo = System::find(1)->app_logo;
        if ($request->file('app_logo')) {
            $validateData['app_logo'] = $request->file('app_logo')->store('system-logo', ['disk' => 'public']);
            if ($app_logo != 'system-logo/default.png') {
                Storage::disk('public')->delete($app_logo);
            }
        }

        System::find(1)->update($validateData);
        return response()->json([
            'status' => 1,
            'msg' => 'Profile picture has been changed!',
        ]);
    }

    public function delete_logo(Request $request)
    {
        $app_logo = System::find(1)->app_logo;
        if ($request->app_logo) {
            $validateData['app_logo'] = 'system-logo/default.png';
            Storage::disk('public')->delete($app_logo);
        }

        System::find(1)->update($validateData);
        return back()->with('success', 'Logo Berhasil Di Hapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin.system.index', [
            'title' => 'App Config',
            'system' => System::find($id)
        ]);
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
        $validateData = $request->validate([
            'app_name' => 'required|max:15',
        ]);

        System::find($id)->update($validateData);
        return back()->with('success', 'Nama Aplikasi Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
