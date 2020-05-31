<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = [];
    
    public function book(){
        return $this ->belongsTo(Book::class);
    }
}
