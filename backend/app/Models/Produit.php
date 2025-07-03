<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'categorie_id',
        'sous_categorie_id',
        'image',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function sousCategorie()
{
    return $this->belongsTo(SousCategorie::class);
}

}

