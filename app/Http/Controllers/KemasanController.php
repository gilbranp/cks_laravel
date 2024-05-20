<?php

namespace App\Http\Controllers;

use App\Models\Kemasan;
use App\Models\User;
use Illuminate\Http\Request;

class KemasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Sahabat Kemasan';
        $users = User::find(auth()->user()->id);
        $artikel = Kemasan::orderBy('created_at','DESC')->get();
        return view('backend.artikel.kemasan.index',compact('users','artikel','title'));
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
        // dd($request->all());
        $input = $request->all();

    if ($image = $request->file('foto')) {
        $destinationPath = public_path('images/kemasan/');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        // Coba pindahkan file dan cek hasilnya
        if ($image->move($destinationPath, $profileImage)) {
            $input['foto'] = $profileImage;
        } else {
            // Jika pemindahan gagal, kembalikan user ke form dengan pesan error
            return back()->with('error', 'Gagal menyimpan gambar.');
        }
    } else {
        unset($input['foto']);
    }

    Kemasan::create($input);
    return redirect()->route('sahabat.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $title = 'Data Sahabat Kemasan';
        $users = User::find(auth()->user()->id);
       $artikel = Kemasan::findOrFail($id);
       return view('backend.artikel.kemasan.detail',compact('artikel','title','users')); 

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Data Sahabat Kemasan';
        $users = User::find(auth()->user()->id);
        $artikel = Kemasan::findOrFail($id);
        return view('backend.artikel.kemasan.edit', compact('artikel','users','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Kemasan::find($id);
    
        $input = $request->all();
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/kemasan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }
        else{
            unset($input['foto']);
        }

        // Update data artikel dari request
        // $artikel->update($request->except('imgpembina'));
        $artikel->update($input);
        // artikel::create($input);

        return redirect()->route('sahabat.index')->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kemasan $artikel)
    {
        $gambarPath = public_path('images/kemasan/' . $artikel->foto);
    if (file_exists($gambarPath)) {
        unlink($gambarPath);
    }
    $artikel->delete();
    return redirect()->route('artikel.index')->with('sukses', 'Data berhasil dihapus!');
    }
}
