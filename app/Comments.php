<?php

namespace NewsGame;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'name', 'email','website', 'comment','id_post','path_user'
    ];
}
