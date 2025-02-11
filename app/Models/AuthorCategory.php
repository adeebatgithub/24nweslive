<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorCategory extends Model
{
    use HasFactory;
    protected $fillable = ['authors_id', 'categories_id'];

    public function author() {
        return $this->belongsTo(Author::class, 'authors_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'categories_id');
    }

}
