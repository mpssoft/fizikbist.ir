<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    public function home()
    {
        return view("users.home");
    }
    public function courses()
    {
        return "ok";
    }
}
