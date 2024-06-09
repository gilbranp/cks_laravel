<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Laporan Keuangan';
        $users = User::find(auth()->user()->id);
        // $laporan = Laporan::all();

        $query = Laporan::query();

    if ($request->filled('bulan') && $request->filled('tahun')) {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $query->whereMonth('tanggal', $bulan)
              ->whereYear('tanggal', $tahun);
    }

    $laporan = $query->get();

        return view('backend.laporan.index',compact('title','users','laporan'));
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
        $validateData = $request->validate([
            'nama' => 'required',
            'pokok' => 'required',
            'sukarela'=> 'required',
            'wajib'=> 'required',
            'deskripsi' => 'nullable',
            'tanggal' => 'required'
        ]);

        Laporan::create($validateData);
        return redirect()->route('laporan.index')->with('sukses','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect()->route('laporan.index')->with('sukses','Data berhasil dihapus!');
    }
}
