<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 


class PostsController extends Controller
{
    public function postsAction()
    {
        $allPostsFromDb = Post::all();
        // dd($allPostsFromDb);

        $ALlPosts = [
            ['id' => 1, 'title' => 'php', 'postsby' => 'michael', 'created_at' => '24-2-2005'],
            ['id' => 2, 'title' => 'java', 'postsby' => 'fidaa', 'created_at' => '24-1-2008'],
            ['id' => 3, 'title' => 'javascript', 'postsby' => 'hanna', 'created_at' => '24-6-2010']
        ];

        return view('posts.index', ['posts' => $allPostsFromDb]);
    }

    public function ShowPost($postId)
    {
     $singlepostfromdb = Post::findOrFail($postId);
        $singlePost = [
            'id' => $postId,
            'title' => 'php is the best backend lang',
            'dis' => 'testtttttttttttttttttttttttttt'
        ];

        return view('posts.Show', ['post' => $singlepostfromdb]);
    }

      public function CreatePost()
    {
        $allUsersFromDb = User::all();
        return view('posts.CreatePost', data: ['ALLuser' => $allUsersFromDb]);
    }

public function Store(Request $request)
{

    
    $validated = $request->validate([
        'title' =>[ 'required' , 'min:3'],
        'description' => ['required','min:3',],
    ]);

    
    Post::create([
        'title' => $request->title,
        'description' => $request->description, 
        'user_id'=>$request->postcreator,
    ]);

    return to_route('Allposts.index');
}

 
   public function Edite($id)
    {
        $allUsersFromDb = User::all();
        $post = Post::findOrFail($id); 
        return view('posts.Edite', ['post' => $post, 'ALLuser' => $allUsersFromDb]);
    }

    public function Update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->postcreator
        ]);

        return to_route('singlePost', ['postId' => $post->id]);
    }
    public function Delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return to_route('Allposts.index');
    }
}