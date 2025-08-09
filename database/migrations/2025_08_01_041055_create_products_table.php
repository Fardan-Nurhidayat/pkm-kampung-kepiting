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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // Nama produk
            $table->string('slug')->unique(); // Slug unik untuk URL friendly
            $table->text('description')->nullable(); // Deskripsi produk
            $table->string('category')->nullable();
            $table->json('images')->nullable();
            $table->string('excerpt')->nullable();
            $table->decimal('price', 10, 2); // Harga produk
            $table->integer('stock')->default(0); // Stok produk
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID pengguna yang membuat produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
