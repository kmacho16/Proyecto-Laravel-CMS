<?php

namespace NewsGame\Http\Controllers;

use Illuminate\Http\Request;
use NewsGame\User;
use Illuminate\Validation\Rule;
use Flashy;
use DB;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
    'name'=>['required','min:3'],
    'email'=>['required','email','unique:users'],
    'password'=>['required','min:4','max:15']
    ];

    protected $rulesEdit = [
    'name'=>['required','min:3'],
    'email'=>['required','email','unique:users'],
    ];

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('adminMid',['except'=>'update']);
    }

    public function index(Request $request)
    {
        $users = User::searchMode($request->search,$request->type);

        $roles = DB::table('roles')->pluck('name','id');
        return view('admin.index',['usuarios'=>$users,'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->pluck('name','id');
        return view('admin.create',['roles'=>$roles]);
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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_rol = $request->id_rol;
        $user->password = bcrypt($request->password);
        if($request->file('image')==null){
            $user->path = "";
        }else{
            $user->path = $request->file('image')->store('users');
        }
        $user->save();
        Flashy::success('Usuario Registrado correctamente');
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = DB::table('roles')->pluck('name','id');
        $user = User::find($id);

        return view('admin.edit',['usuario'=>$user,'roles'=>$roles]);
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
        $this->validate($request,['name'=>['required','min:3'],'email'=>['required',Rule::unique('users')->ignore($id)]]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if(empty($request->id_rol)){
            $user->id_rol = $user->id_rol;
        }else{
             $user->id_rol =$request->id_rol;
        }

        if(empty($request->password)){
            $user->password = $user->password;
        }else{
            $user->password = bcrypt($request->password);
        }

        if($request->file('image')==null){
            $user->path = $user->path;
        }else{
            $user->path = $request->file('image')->store('users');
        }
        $user->save();
        Flashy::info('Usuario editado correctamente');
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flashy::error('Usuario eliminado correctamente');
        return redirect('admin');
    }
}
