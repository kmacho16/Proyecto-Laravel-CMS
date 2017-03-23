<?php

namespace NewsGame\Http\Controllers;

use Illuminate\Http\Request;
use NewsGame\files;
use Carbon\Carbon;
use Storage;

class FilesController extends Controller
{

    protected $escritorMid = [
    'only'=>['list','up','storage'],
    ];
    
    protected $adminMid = [
    'only'=>['destroy'],
    ];

     public function __construct(){
        $this->middleware('auth');
        
        $this->middleware('escritorMid',$this->escritorMid);
        $this->middleware('adminMid',$this->adminMid);
    }

    public function list(){
    	$files = files::all();
    	return view('files.index',['files'=>$files]);
    }
    public function up(){
    	return view('files.subir');
    }
    public function storage(Request $request){
    	$myFiles = new files;
    	$file = $request->file('image');
    	$name = $file->getClientOriginalName();
    	$ext = $file->extension();
    	$path = $file->storeAs('files',Carbon::now()->second.$name);
    	$myFiles->name = $name;
    	$myFiles->type = $ext;
    	$myFiles->path = $path;
    	$myFiles->save();
		return redirect('subir');
    }

    public function destroy($id){
    	$file = files::find($id);
    	Storage::delete($file->path);
    	$file->delete();
    	return redirect('subir');
    }
}
