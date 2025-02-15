<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorCategoryPermission extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'sub_category_id'];

    public function category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
