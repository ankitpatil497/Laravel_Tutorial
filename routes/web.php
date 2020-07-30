<?php

use App\Country;
use App\Photo;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */


/*
|--------------------------------------------------------------------------
| Simple Database Qureys
|--------------------------------------------------------------------------
// */

// Route::get('/insert04', function () {
    
//     DB::insert('insert into posts(user_id,title,content,is_admin) values(?,?,?,?)',['1','Python','Pytho is as Intepreter','0']);
// });

// Route::get('/read1112',function(){
//     $result=DB::select('select * from posts');

//     return $result;
//     foreach($result as $post){
//         return $post->title;
//     }
// });

// Route::get('/update',function(){
//     $result=DB::update('update posts set title="Update Angular" where id=?',[3]);
//     return $result;
//     // return redirect()->route('read');
// });

// Route::get('/delete',function(){
//     $result=DB::update('delete from posts  where id=?',[3]);
//     return $result;
//     // return redirect()->route('read');
// });


/*
|--------------------------------------------------------------------------
| //Database - Eloquent 
|--------------------------------------------------------------------------
// */

// Route::get('/read',function(){

//     $posts=Post::all();
//     echo $posts;
//     foreach($posts as $post){
//         echo $post->title;
//         echo $post->content;
        
//     }
// });

// Route::get('/find',function(){

//     $posts=Post::find(2);
//     echo $posts;
// });
/*
|--------------------------------------------------------------------------
| //Database  also used as a  isActive     
|--------------------------------------------------------------------------
// */
// Route::get('findwhere',function(){

//     $posts=Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//     echo $posts;
// });

// Route::get('findmore',function(){

//     $posts=Post::findorfail(2);
//     echo $posts;
// });

// Route::get('basicinsert',function(){
//     $posts=new Post;
//     $posts->title='New Eloquent';
//     $posts->content='Wow Eloquent is bery cool and Easy';

//     $posts->save();
    
// });

// Route::get('basicinsert2',function(){
//     $posts=Post::find(3);

//     $posts->title='New Eloquent 2';
//     $posts->content='Wow Eloquent is bery cool and Easy 2';

//     $posts->save();
    
// });

// Route::get('create',function(){
//     Post::create(['title'=>'Python','content'=>'Python is an interpreted, high-level, general-purpose programming language']);

    
// });

// Route::get('update',function(){
//     Post::where('id',4)->update(['title'=>'New updated Python']);
// });

// Route::get('delete',function(){
//     $posts=Post::find(4);
//     $posts->delete();
// });

// Route::get('delete2',function(){
//     Post::destroy(5);
    
// });

// Route::get('softdelete',function(){
//     Post::find(3)->delete();
    
// });

// Route::get('readsoftdelete',function(){
//     // $posts=Post::withTrashed()->where('id',6)->get();
//     // return $posts;  
//     $posts=Post::onlyTrashed()->where('is_admin',0)->get();
//     return $posts;    
// });

// Route::get('restore',function(){
//     // $posts=Post::withTrashed()->where('id',6)->get();
//     // return $posts;  
//     $posts=Post::onlyTrashed()->where('is_admin',0)->restore();
//     return $posts;    
// });


// Route::get('forcedelete',function(){

//     $posts=Post::onlyTrashed()->where('is_admin',0)->forceDelete();
//     return $posts;    
// });



// /*
// |--------------------------------------------------------------------------
// | Eloquent Rellationship
// |--------------------------------------------------------------------------
// // */

// // One to One 
// Route::get('/user/{id}/post',function($id){

//     return User::find($id)->post->content;
// });

// Route::get('/posts/{id}/user',function($id){

//     return Post::find($id)->user->name;   
// });

// //One to Many

// Route::get('/posts',function(){
//     $user=User::find(1);

//     foreach($user->posts as $posts){
//         echo $posts->title .'<br>';
//     }
// });

//Many to Many

// Route::get('/user/{id}/role',function($id){
//     $user=User::find($id)->role()->get();

//     echo $user.'<br>';

//     // foreach($user->role as $role){
//     //     echo $role->name.'<br>';
//     // }
// });

// Route::get('posts/lan',function($id){
//     $post=Post::find(1);

//     foreach($post->lan as $lan){
//         echo $lan->name.'<br>';
//     }
// });

// Route::get('/user/{id}/pivot',function($id){
//     $user=User::find($id);


//     foreach($user->role as $role){
//         echo $role->pivot->created_at.'<br>';
//     }
// });

// Route::get('post/country/{id}',function($id){
//     $contry=Country::find($id);

//     foreach($contry->posts as $post){
//         echo $post.'<br>';
//     }
// });


// Route::get('user/photo/{id}',function($id){
//     $user=User::find($id);

//     foreach($user->photo as $photo){
//         return $photo;
//     }
// });

// Route::get('post/photo/{id}',function($id){
//     $post=Post::find($id);

//     foreach($post->photo as $photo){
//         echo $photo->path.'<br>';
//     }
// });

// Route::get('photo/{id}/post', function ($id) {
//     $photo=Photo::findorfail($id);

//     return $photo->imageable;

// });

// Route::get('post/tag/{id}', function ($id) {
//     $post=Post::findOrFail($id);
//     foreach($post->tags as $tag){
//         echo $tag->name.'<br>';
//     }
// // });

//  Route::get('tag/post/{id}', function ($id) {
//      $tag=Tag::findOrFail($id);

//      return $tag->posts;
//     //  foreach($tag->posts as $post){
//     //      echo $post;
//     //  }
//  });




/*
|--------------------------------------------------------------------------
| Crud Application
|--------------------------------------------------------------------------
// */

Route::group(['middelware' => 'web'], function () {
    Route::resource('/posts', 'PostController');

});

Route::get('dates', function () {
    $date=new DateTime('+1 days');

    echo $date->format('d-m-y'),'<br>';

    echo Carbon::now()->addDays()->diffForHumans().'<br>';
    echo Carbon::now()->subMonth()->diffForHumans().'<br>';


});



Route::get('/', function () {
    return "hi i am ankit";
});

// Route::get('/post/{id}','PostController@index');

// Route::resource('/post','PostController');

// Route::get('/contact','PostController@contact');

// Route::get('/post/{id}/{name}/{password}','PostController@post_view');


// Route::get('/contact',function(){
//     return view('contact');
// });


// Route::get('/about',function(){
//     return "about";
// });

// Route::get('/contact',function(){
//     return "contact";
// });


// Route::get('/post/{id}/{name}',function($id,$name){
//     return "this is post number ".$id." ".$name;
// });


// Route::get('/admin/post/example',array('as'=>'admin.home',function(){
//     $url=route("admin.home");
//     return "this url ".$url;


// }));