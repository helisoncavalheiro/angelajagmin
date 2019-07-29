<?php

namespace App\Http\Controllers\Home;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($id){
        $file = File::find($id);
        return Storage::download($file->filepath, $file->name);
    }
}
