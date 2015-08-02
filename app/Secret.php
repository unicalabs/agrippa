<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    protected $dates = ['expires_at'];
    protected $fillable = array('uuid4', 'created_at', 'expires_at', 'expires_views', 'secret');
}
