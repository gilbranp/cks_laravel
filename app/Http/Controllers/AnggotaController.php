<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Anggota';
        $user = User::orderBy('created_at', 'desc')->get();
        return view('backend.anggota.index',compact('user','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all( ));
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'posisi' => 'required',
            'password' => 'required',
            'deskripsi' => 'required',
        ]);

        $validateData['password'] = Hash::make(($validateData['password']));
        User::create($validateData);
        return redirect(route('anggota.index'))->with('sukses','Data berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        $title  = "Data Anggota";
        return view('backend.anggota.detail',compact('users','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Data Anggota';
        $users = User::findOrFail($id);
        return view('backend.anggota.edit', compact('users','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('anggota.index')->with('sukses','Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('anggota.index')->with('sukses','Data berhasil dihapus!');
    }
}
