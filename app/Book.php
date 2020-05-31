<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected $casts = [
        'chapters' => 'array',
    ];

    public function chapters(){
        return $this ->hasMany(Chapter::class);
    }

    public function genre(){
        return $this ->belongsTo(Genre::class);
    }

    public function author(){
        return $this ->belongsTo(Author::class);
    }

    public function editorial(){
        return $this ->belongsTo(Editorial::class);
    }
}
