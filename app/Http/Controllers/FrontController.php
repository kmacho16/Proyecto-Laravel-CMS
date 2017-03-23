<?php

namespace NewsGame\Http\Controllers;

use Illuminate\Http\Request;
use NewsGame\Cats;
use NewsGame\Post;
use NewsGame\User;
use Flashy;
use Mapper;

use NewsGame\Notifications\SlackNoti;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('menuMid');
    }
    
    public function home(){
    	$posts = Post::orderBy('id','DESC')->paginate(6);
        $categorias = Cats::catsRadom(4);
        $nomCategoria= Cats::catNameRandom();
        $postByCat = Post::PostByRandom($nomCategoria[0]->name);
    	$recomendados = Post::top();   
        
    	$parametros =[
    		'posts'=>$posts,
    		'recomendados'=>$recomendados,
    		'categorias'=>$categorias,
            'nomCat' => $nomCategoria,
            'postByCat'=>$postByCat,
    	];

    	return view('front.index',$parametros);
    }

    public function tags($tag){
        $posts = Post::PostByTag($tag);
        $categorias = Cats::catsRadom(4);
        $nomCategoria= Cats::catNameRandom();
        $postByCat = Post::PostByRandom($nomCategoria[0]->name);
        
        $parametros =[
            'posts'=>$posts,
            'categorias'=>$categorias,
            'nomCat' => $nomCategoria,
            'postByCat'=>$postByCat,
        ];
        
        return view('front.categories',$parametros);
    }

    public function contact(){
        $nomCategoria= Cats::catNameRandom();
        $postByCat = Post::PostByRandom($nomCategoria[0]->name);
        Mapper::map(4.6458263,-74.077479,['zoom'=>15,'market'=>false]);

        $parametros =[
            'nomCat' => $nomCategoria,
            'postByCat'=>$postByCat,
        ];
        return view('front.contact',$parametros);
    }

    public function send(Request $request){
        $user=User::find(1);
        $user->notify(new SlackNoti($request));
        Flashy::message('Tu Mensaje se envio correctamente');
        return redirect('/contacto');
    }
}
