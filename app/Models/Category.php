<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];

    #relacion de uno a muchos
    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    #relacion muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    #relacion a travez de 
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //URL por Slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
