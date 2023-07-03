<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id','created_at', 'updated_at'];

    //accesores
    public function getStockAttribute(){
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function(Builder $query){
                $query->where('id',$this->id);
            })->sum('quantity');
        } elseif($this->subcategory->color) {
            return ColorProduct::WhereHas('product', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('quantity');
        }else{
            return $this->quantity;
        }
    }

    #relacio uno a muchos
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    #relacio uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
     
    #relacio uno a muchos inversa
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
      
    #relacion muchos a muchos
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    #relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    //URL por Slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
