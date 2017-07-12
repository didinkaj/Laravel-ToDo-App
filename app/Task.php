<?php

namespace taskSystem;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
    			'body','user_id','email','department','access'
    			];
    
}
