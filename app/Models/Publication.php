<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id'
    ];

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
 
    public function likes()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
