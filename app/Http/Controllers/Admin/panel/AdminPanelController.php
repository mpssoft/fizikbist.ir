<?php

namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
}
