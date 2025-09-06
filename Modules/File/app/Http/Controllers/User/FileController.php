<?php

namespace Modules\File\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\File\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = auth()->user()->files()->paginate(20);
        return view('file::user.index',compact('files'));
    }

    public function download(File $file)
    {
        $user = auth()->user();


        // check active state
        if ($file->state !== 'active') {
            abort(403, 'This file is not active.');
        }
        // Case 1: Free file
        if ($file->access_type === 'free') {
            $file->increment('downloads');
            return response()->download(
                storage_path('app/private/files/' . basename($file->file_path)),
                $file->title . '.' . $file->file_type
            );
        }

        // Case 2: Paid file
        if ($user && $user->files->contains($file->id)) {
            $file->increment('downloads');
            return response()->download(
                storage_path('app/private/files/' . basename($file->file_path)),
                $file->title . '.' . $file->file_type
            );
        }
        abort(403, 'You must purchase this file first.');
    }

}
