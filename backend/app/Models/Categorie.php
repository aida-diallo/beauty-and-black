<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categorie extends Model
{
      use HasFactory;

    protected $fillable = ['nom'];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
    public function sousCategories()
{
    return $this->hasMany(SousCategorie::class);
}

}
