<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $guarded = array('did');
    protected $primaryKey = 'did';
    public $timestamps = false;
}