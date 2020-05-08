<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Database\Eloquent\Collection;

class AdminHomeController extends Controller
{




    public function __construct()
    {

        $this->middleware('auth');
    }

    public function home()
    {

        return view('Admin.dashboard');
    }
}
