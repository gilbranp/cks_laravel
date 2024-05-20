<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use PhpParser\Node\Expr\Cast\String_;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data UKM';
        $users = User::find(auth()->user()->id);
        $artikel = Ukm::orderBy('created_at','DESC')->get();
        return view('backend.artikel.ukm.index',compact('users','artikel','title'));
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
        $destinationPath = public_path('images/ukm/');
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

    Ukm::create($input);
    return redirect()->route('artikel.index')->with('sukses', 'Data berhasil ditambahkan');
}

    
    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $title = 'Data UKM';
        $users = User::find(auth()->user()->id);
       $artikel = Ukm::findOrFail($id);
       return view('backend.artikel.ukm.detail',compact('artikel','users','title')); 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $title = 'Data UKM';
    $users = User::find(auth()->user()->id);
    $artikel = Ukm::findOrFail($id);
    return view('backend.artikel.ukm.edit', compact('artikel','users','title'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $artikel = Ukm::find($id);
    
        $input = $request->all();
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/ukm/';
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

        return redirect()->route('artikel.index')->with('sukses', 'Data berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukm $artikel)
{
    $gambarPath = public_path('images/ukm/' . $artikel->foto);
    if (file_exists($gambarPath)) {
        unlink($gambarPath);
    }
    $artikel->delete();
    return redirect()->route('artikel.index')->with('sukses', 'Data berhasil dihapus!');
}

}
