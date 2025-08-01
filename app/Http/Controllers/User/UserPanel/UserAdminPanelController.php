<?php

namespace App\Http\Controllers\User\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAdminPanelController extends Controller
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
