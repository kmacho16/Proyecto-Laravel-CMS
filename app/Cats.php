<?php

namespace NewsGame;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Cats extends Model
{

	use SoftDeletes;
	
    protected $table= 'categories';

    protected $dates = ['deleted_at'];

    public static function catsRadom($cant){
    	$random = DB::table('categories')->inRandomOrder()->limit($cant)->get();
    	return $random;
    }

    public static function catNameRandom(){
    	$random = DB::table('categories')->select('name')->inRandomOrder()->limit(1)->get();
    	return $random;
    }
}
