<?php

namespace App\Http\Controllers;

use App\Models\Kemasan;
use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class FrontController extends Controller
{
    public function index(){
        $kemasan = Kemasan::orderBy('created_at','DESC')->get();
        $ukm = Ukm::orderBy('created_at','DESC')->get();
        $kategori = Kategori::orderBy('created_at','DESC')->get();
        return view('frontend.index', compact('kemasan','ukm','kategori'));
    }
}
