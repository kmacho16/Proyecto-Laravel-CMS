<?php

namespace NewsGame;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','path', 'password',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
public function routeNotificationForSlack(){
    return 'https://hooks.slack.com/services/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';
}

public static function searchMode($search,$type){
    return User::name($search)
    ->type($type)
    ->orderBy('id','DESC')
    ->paginate(8)
    ->appends(['seach'=>$search,'type'=>$type]);
}
    public function scopeName($query,$search){
        if((!empty($search)) && (trim($search)!= '') ) {
            $query->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');      
        }        
    }
    public function scopeType($query,$type){
        if((!empty($type)) && (trim($type)!= '') ) {
            $query->where('id_rol',$type);
        } 
    }
}
