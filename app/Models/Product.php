<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'seo_description',
        'category_id',
        'price',
        'sale',
        'producer',
        'material',
        'slug',
        'status',
        'image'
    ];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')
            ->withDefault(['name' => '']);
    }
}
