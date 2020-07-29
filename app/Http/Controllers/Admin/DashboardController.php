<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    public function getDashboard(){
        return view('admin.category.create');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
