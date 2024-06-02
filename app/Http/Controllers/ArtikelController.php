<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\String_;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $title = 'Data UKM';
        $users = User::find(auth()->user()->id);
        $artikel = Ukm::orderBy('created_at','DESC')->get();
        return view('backend.artikel.ukm.index',compact('kategori','users','artikel','title'));
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
    $kategoriSlug = Kategori::where('id', $input['kategori_id'])->pluck('slug')->first();

    // Buat slug awal berdasarkan nama UKM atau atribut lain yang unik
    $baseSlug = Str::slug($input['nama'] . '-' . $kategoriSlug);
    $slug = $baseSlug;
    $counter = 1;

    // Cek apakah slug sudah ada, jika ya tambahkan penanda unik
    while (Ukm::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    $input['slug'] = $slug;

    if ($image = $request->file('foto')) {
        $destinationPath = public_path('images/ukm/');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        // Coba pindahkan file dan cek hasilnya
        if ($image->move($destinationPath, $profileImage)) {
            $input['foto'] = $profileImage;
        } else {
            // Jika pemindahan gagal, kembalikan user ke form dengan pesan error
            return back()->withInput()->with('error', 'Gagal menyimpan gambar.');
        }
    } else {
        unset($input['foto']);
    }

    try {
        Ukm::create($input);
        return redirect()->route('artikel.index')->with('sukses', 'Data berhasil ditambahkan');
    } catch (\Exception $e) {
        // Jika penyimpanan ke database gagal, hapus file gambar yang sudah diupload
        if (isset($input['foto']) && file_exists($destinationPath . $input['foto'])) {
            unlink($destinationPath . $input['foto']);
        }
        return back()->withInput()->with('error', 'Gagal menambahkan data.');
    }
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
    
    // Periksa apakah ada file gambar baru yang diunggah
    if ($image = $request->file('foto')) {
        // Hapus foto lama jika ada
        if ($artikel->foto) {
            $oldImagePath = public_path('images/ukm/') . $artikel->foto;
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
    
        // Pindahkan file gambar baru
        $destinationPath = 'images/ukm/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['foto'] = $profileImage;
    } else {
        // Jika tidak ada file gambar baru, hapus foto dari input
        unset($input['foto']);
    }
    
    // Update data artikel dari request
    $artikel->update($input);
    
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
