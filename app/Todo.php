<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;
    protected $table = 'todos';
    protected $fillable = [
        'content', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
