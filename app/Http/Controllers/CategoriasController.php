<?php

namespace NewsGame\Http\Controllers;

use Illuminate\Http\Request;

use NewsGame\Post;
use NewsGame\Cats;
use Illuminate\Validation\Rule;
use Flashy;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 protected $visitanteMid = [
    'only'=>['create','store','destroy','update','edit'],
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

    protected $rules = [
    'name'=>['required','min:3','unique:categories'],
    'slug'=>['required','min:3','unique:categories'],
    ];
    public function index()
    {
        $cats = Cats::orderBy('id','DESC')->paginate(3);
        return view('categorias.index',['cats'=>$cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
        $cats = new Cats;
        $cats->name = $request->name;
        $cats->slug = $request->slug;
        $cats->save();
        Flashy::success('Categoria Registrada correctamente');
        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $slug)
    {
        $categorias = Cats::catsRadom(4);
        $nomCategoria= Cats::catNameRandom();
        $postByCat = Post::PostByRandom($nomCategoria[0]->name);
        $posts =  Post::PostByCat($slug);
      
        $parametros =[
            'posts'=>$posts,
            'nomCat' => $nomCategoria,
            'postByCat'=>$postByCat,
            'categorias'=>$categorias,
        ];

        return view('front.categories',$parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cats = Cats::find($id);
        return view('categorias.edit',['cats'=>$cats]);
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
            'name'=>['required','min:3',Rule::unique('categories')->ignore($id)],
            'slug'=>['required','min:3',Rule::unique('categories')->ignore($id)],
            ]);
        $cats = Cats::find($id);
        $cats->name = $request->name;
        $cats->save();
        Flashy::message('Categoria Editada correctamente');
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Cats::find($id);
        $cats->delete();
        Flashy::error('Categoria Eliminada correctamente');
        return redirect('categorias');
    }
}
