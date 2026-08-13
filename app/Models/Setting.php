<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['login_title', 'sidebar_title', 'fav_icon', 'logo'];
}
