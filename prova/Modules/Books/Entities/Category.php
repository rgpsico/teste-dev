<?php

namespace Modules\Books\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    protected $table = 'category_book';
    public $timestamps = false;


    public function book()
    {
        return $this->hasMany(Books::class, 'category_id');
    }
}
