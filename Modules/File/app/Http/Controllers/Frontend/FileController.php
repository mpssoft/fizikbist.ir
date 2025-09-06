<?php

namespace Modules\File\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\File\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::where('state','active')->paginate(20);
        return view('file::frontend.index',compact('files'));
    }
}
