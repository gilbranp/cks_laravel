<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $users = User::find(auth()->user()->id);
        return view('backend.index',compact('users','title'));
    }
    public function post(){
        $user = User::find(auth()->user()->id);
        return view('backend.layout.navbar', compact('user'));
    }
}
