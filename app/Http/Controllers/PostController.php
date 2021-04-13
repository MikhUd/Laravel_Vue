<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel; 
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
 
    public function post_add(Request $request){
        
        $form = json_decode($request->form);

        $path = $request->image->store('public/files');

        $post = new PostModel();

        $post->username = Auth::user()->name;
        
        $post->title = $form->title;
        
        $post->description = $form->description;

        $post->content = $form->content;

        $post->image = '/storage/files/'.substr($path, 13);

        $post->save();
    }


}
