<?php

namespace App\Http\Controllers\User\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAdminPanelController extends Controller
{
    public function index()
    {
        return view("user-panel.index");
    }
    public function courses()
    {
        return "ok";
    }
}
