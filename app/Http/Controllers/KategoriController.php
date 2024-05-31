<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $input = $request->all();
        
        if ($image = $request->file('foto')) {
            $destinationPath = public_path('images/kategoriukm/');
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

        Kategori::create($input);
        return redirect()->route('artikel.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
