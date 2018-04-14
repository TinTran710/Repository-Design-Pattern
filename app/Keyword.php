<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

    protected $fillable = ['keyword', 'source', 'trust'];
    public $timestamps = false;

}
