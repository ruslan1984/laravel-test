<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [ 'id', 'name', 'active'];
    protected $guarded = ['_method', '_token'];
    protected $hidden = ['created_at', 'updated_at'];
}
