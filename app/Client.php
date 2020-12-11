<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'galc', 'port', 'instalation_address', 'speed'];
}
