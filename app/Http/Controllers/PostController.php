<?php

namespace NewsGame\Http\Controllers;

use Illuminate\Http\Request;
use NewsGame\Cats;
use NewsGame\Post;
use Illuminate\Validation\Rule;
use Flashy;
use DB;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $rules = [
        'title'=>['required','min:3','max:30'],
        'tags'=>['max:30'],
        'slug'=>['required','max:50','unique:post'],
        'cat_id'=> ['required']
    ];

    protected $visitanteMid = [
    'only'=>['create','destroy','update','edit'],
    ];

    protected $escritorMid = [
    'only'=>['destroy','update','edit'],
    ];
    
    public function __construct(){
        $this->middleware('auth',['except'=>'show']);
        $this->middleware('visitanteMid',$this->visitanteMid);
        $this->middleware('escritorMid',$this->escritorMid);
        $this->middleware('menuMid');
    }

    public function index()
    {
        //$posts = Post::orderBy('id','DESC')->paginate(4);

       $posts = Post::myPostsCats();
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cats=Cats::pluck('name','id');
        return view('post.create',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules);
        $post=new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->recomendado = $request->recomendado;

        if(empty($request->privado)){
            $post->privado = 0;
        }else{
            $post->privado = $request->privado;
        }

        if(empty($request->recomendado)){
            $post->recomendado = 0;
        }else{
            $post->recomendado = $request->recomendado;
        }


        if($request->file('image')==null){
            $post->path = "";
        }else{
            $post->path = $request->file('image')->store('posts');
        }
        $post->content = $request->content;
        $post->tags = $request->tags;
        $post->id_cat = $request->cat_id;
        $post->save();
        Flashy::message('Entrada agregada correctamente');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($value)
    {
        $post = Post::myPost($value);

        if( ($post->privado == true && Auth::check()) || $post->privado == false ){
            $nomCategoria= Cats::catNameRandom();
            $postByCat = Post::PostByRandom($nomCategoria[0]->name);
            $random = Post::random(5);
            $parametros =[
                'post'=>$post,
                'nomCat' => $nomCategoria,
                'postByCat'=>$postByCat,
                'random'=>$random,
            ];
            return view('front.show',$parametros);
        }else{
            Flashy::message('Lo sentimos este post es solo para usuarios registrados');
            return redirect('/register');
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cats=Cats::pluck('name','id');
        return view('post.edit',['post'=>$post,'cats'=>$cats]);
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
        $this->validate($request,[
            'title'=>['required','min:3','max:30'],
            'tags'=>['max:30'],
            'slug'=>Rule::unique('post')->ignore($id)
            ]);
        $post=Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;

        if(empty($request->privado)){
            $post->privado = 0;
        }else{
            $post->privado = $request->privado;
        }


        if(empty($request->recomendado)){
            $post->recomendado = 0;
        }else{
            $post->recomendado = $request->recomendado;
        }

        if($request->file('image')==null){
            $post->path = $post->path;
        }else{
            $post->path = $request->file('image')->store('posts');
        }

        $post->content = $request->content;
        $post->tags = $request->tags;

        if($request->cat_id == null || $request->cat_id == ""){
            $post->id_cat = $post->id_cat;
        }else{
            $post->id_cat = $request->cat_id;
        }

        $post->save();
        Flashy::message('Entrada agregada correctamente');
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Flashy::error('Usuario eliminado correctamente');
        return redirect('post');
    }
}
