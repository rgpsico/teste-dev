<?php

namespace Modules\Books\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Books extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'author', 'category_id', 'code', 'type', 'size'];
    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
