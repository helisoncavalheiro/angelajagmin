<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function delete($id){

        $savedImages = Image::all();
        if(count($savedImages) > 0){
            $image = Image::destroy($id);
            return redirect()->back();
        }
    }
}
