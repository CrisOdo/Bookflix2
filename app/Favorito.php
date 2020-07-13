<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $guarded = [];

    public function user(){
        return $this ->belongsTo(User::class);
    }

    protected $casts = [
        'books' => 'array',
    ];
}
