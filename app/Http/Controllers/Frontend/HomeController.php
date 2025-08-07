<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        auth()->loginUsingId(1);
        $sliders = Slider::all();

        return view('frontend.home.index',compact('sliders'));
    }
}
