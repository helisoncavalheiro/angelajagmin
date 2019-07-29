<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\File;

class FileController extends Controller
{

    public function delete($id){
        $file = File::find($id);
        $file->deleteFile($file);
        return redirect()->back();
    }

    public function download($id){
        $file = File::find($id);
        return Storage::download($file->filepath, $file->name);
    }
}
