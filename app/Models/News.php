<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'seo_description',
        'admin_id',
        'slug',
        'active',
        'image'
    ];
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id')
            ->withDefault(['name' => '']);
    }
}
