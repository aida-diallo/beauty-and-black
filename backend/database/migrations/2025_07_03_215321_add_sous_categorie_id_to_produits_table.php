<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedBigInteger('sous_categorie_id')->nullable()->after('categorie_id');

            // Si tu veux créer une clé étrangère vers la table `sous_categories`
            $table->foreign('sous_categorie_id')->references('id')->on('sous_categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['sous_categorie_id']);
            $table->dropColumn('sous_categorie_id');
        });
    }
};
