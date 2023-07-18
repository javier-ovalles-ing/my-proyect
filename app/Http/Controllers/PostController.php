<?php

  namespace App\Http\Controllers;

  use App\Models\Post;
  use App\Http\Requests\savePostRequest;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;

  class PostController extends Controller
  {
   public function __construct(){

      $this->middleware('auth',['except'=>['show','index']]);

   }

     public function index(){
         
         $posts = Post::get();  

       
        
            return view('post.index',['posts'=>$posts]);
     }

     public function show(Post $post){
      
      return view('post.show',['post'=>$post]);
     }

     public function create(){

         return view('post.create',['post'=> new Post()]);
     }

     public function store(savePostRequest $request){

        /* $validated = $request->validate([
            'title'=> ['required','min:4'],
            'body'=>['required']
        ]); */

        

        /*  $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->save(); */

         Post::create($request->validated());
         
         /* session()->flash('status','post created!'); */
        
          return  to_route('post.index')->with('status','post created!');
     }

     public function edit(Post $post){
      
        return view('post.edit',['post'=>$post]);
       }

     public function update(savePostRequest $request, Post $post)
     {      

        $post->update($request->validated());

       /*   session()->flash('status','post update!');    */         
        

        return to_route('post.show',['post'=>$post])->with('status','post update!');
     }

     public function destroy(Post $post){

        $post->delete();

        return to_route('post.index')->with('status','post delete!');
     }
  }

