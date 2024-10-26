<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
    'nom_prod',
    'slug',
    'categorie_id',
    'marque_id',
    'prix',
    'qty',
    'description',
    'image'
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function marque(){
        return $this->belongsTo(Marque::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_produit')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
}
