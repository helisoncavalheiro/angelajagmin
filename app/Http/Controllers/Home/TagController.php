<?php

namespace App\Http\Controllers\Home;

use App\Post;
use App\Project;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function showPostsByTag(Request $request, $id){
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('created_at', 'desc')->get();
        $filter = "tag";

        $tagsDd = Tag::all()->take(5);
        $projectsDd = Project::all()->take(5);

        return view('inicial.home', ['posts' => $posts,
            'filter' => $filter,
            'tagFilter' => $tag,
            'projectsDd' => $projectsDd,
            'tagsDd' => $tagsDd
        ]);
    }

    public function showTags(Request $request){
        $tags = Tag::all();

        foreach ($tags as $tag){
            $postCounter[$tag->id] = DB::table('post_tag')->where('tag_id', $tag->id)->count();
        }

        $tagsDd = Tag::all()->take(5);
        $projectsDd = Project::all()->take(5);

        return view('inicial.tags', [
            'tags' => $tags,
            'postCounter' => $postCounter,
            'projectsDd' => $projectsDd,
            'tagsDd' => $tagsDd

        ]);
    }
}
