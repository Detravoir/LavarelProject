<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'music_name',
        'music_url',
        'genre'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
