<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kemasan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $title = 'Kategori UKM';
        $users = User::find(auth()->user()->id);
        return view('backend.artikel.ukm.kategori.index',compact('kategori','title','users'));
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
                return back()->withInput()->with('error', 'Gagal menyimpan gambar.');
            }
        } else {
            unset($input['foto']);
        }

        try {
            Kategori::create($input);
            return redirect()->route('kategoriukm.index')->with('sukses', 'Data berhasil ditambahkan');
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
    public function destroy($id)
    {
        try {
            $kategori = Kategori::findOrFail($id); // Pastikan artikel ditemukan
    
            $gambarPath = public_path('images/kategoriukm/' . $kategori->foto);
    
            if (is_file($gambarPath)) {
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                    Log::info('File berhasil dihapus: ' . $gambarPath);
                } else {
                    Log::warning('File tidak ditemukan: ' . $gambarPath);
                }
            } else {
                Log::warning('Path bukan file: ' . $gambarPath);
            }
    
            $kategori->delete();
            Log::info('Kategori berhasil dihapus: ID ' . $id);
    
            return redirect()->route('kategoriukm.index')->with('sukses', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error menghapus data: ' . $e->getMessage());
            return redirect()->route('kategoriukm.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
