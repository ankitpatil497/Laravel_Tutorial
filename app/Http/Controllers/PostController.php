<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::all();
        return view('posts.index',compact('post')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // $this->validate($request,[
        //         'title'=>'required',
        //         'content'=>'required'
        //     ]);
    


        Post::create($request->all());
        return redirect('/posts');



        // $input=$request->all();
        // $input['title']=$request->title;
        // $input['content']=$request->content;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findorFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        //$post=Post::whereId($id)->update($request->all());

        $post=Post::findorFail($id);
        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post=Post::whereId($id)->delete();
        
        $post=Post::findorFail($id);
        $post->forceDelete();
        // Post::onlyTrashed()->forceDelete();

        return redirect('posts');
    }

    // public function contact(){
    //     $people=['abc','mnc','xyz'];
    //     return view('contact',compact('people'));
    // }

    // public function post_view($id,$name,$password){
    //     return view('post',compact('id','name','password'));
    // }


}
