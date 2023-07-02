<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'news_id' => 'required',
        'profile_id' => 'required', //課題で追記
        'edited_at' => 'required',
    );
}