<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [ 'id', 'name','author_id', 'active'];
    protected $guarded = ['_method','_token'];
    protected $hidden = ['created_at', 'updated_at'];
}
