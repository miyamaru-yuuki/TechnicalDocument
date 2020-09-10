<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = array('cid');
    protected $primaryKey = 'cid';
    public $timestamps = false;
}