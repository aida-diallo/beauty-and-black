<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('produits', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->text('description')->nullable();
        $table->decimal('prix', 8, 2);
        $table->integer('stock');
        $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        $table->string('image')->nullable();
        $table->foreignId('sous_categorie_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
