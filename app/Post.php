<?php

namespace NewsGame;
use DB;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';


    public static function myPostsCats(){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.id','post.title','post.slug','post.recomendado','post.privado','categories.name')->paginate(10);

    	return $posts;
    }

    public static function PostByRandom($value){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.*')->where('categories.name','like',$value)->get();

    	return $posts;
    }

    public static function PostByCat($value){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.*')->where('categories.slug','like',$value)->paginate(8);

    	return $posts;
    }

    public static function top(){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.*','categories.name as categoria','categories.slug as CatSlug')->where('post.recomendado','=',true)->get();

    	return $posts;
    }

    public static function random($value){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.*','categories.name as categoria')->inRandomOrder($value)->get();

    	return $posts;
    }

    public static function myPost($value){
    	$posts  = DB::table('post')->join('categories','post.id_cat','=','categories.id')->select('post.*','categories.name as categoria','categories.slug as catSlug')->where('post.slug','like',$value)->first();

    	return $posts;
    }

    public static function PostByTag($tag){
        $posts  = DB::table('post')->Post::select()->where('tags','like','%'.$tag.'%')->paginate(8);

        return $posts;
    }
}
