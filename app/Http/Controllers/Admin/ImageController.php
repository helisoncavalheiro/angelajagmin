<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function delete(Request $request, $imageId){

        $postId = $request->all(['postId']);
        $savedImages = Image::where('post_id', $postId)->get();
        if( (count($savedImages) - 1) > 0){
            $image = Image::find($imageId);
            $image->removeImage($image);
        }

        return redirect()->back();
    }
}
