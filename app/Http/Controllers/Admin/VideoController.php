<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function delete($id){
        $video = Video::find($id);
        $video->delete();
        return redirect()->back();
    }
}
