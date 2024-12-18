<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_ad', 'uptated_at', 'status'];

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    //Relacion uno a muchos inverso
    public function department(){
        return $this->belongsTo(Department::class);
    }

    //Relacion uno a muchos inverso
    public function city(){
        return $this->belongsTo(City::class);
    }

    //Relacion uno a muchos inverso
    public function district(){
        return $this->belongsTo(District::class);
    }

    //Relacion uno a muchos inverso
    public function user(){
        return $this->belongsTo(User::class);
    }
}
