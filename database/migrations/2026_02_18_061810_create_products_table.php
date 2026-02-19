<?php

use App\Models\Publisher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 10);
            $table->decimal('old_price', 10)->nullable();
            $table->unsignedInteger('stock_quantity')->default(0);
            $table->string('sku')->unique();
            $table->foreignIdFor(Publisher::class)->constrained();
            $table->unsignedTinyInteger('players_min')->nullable();
            $table->unsignedTinyInteger('players_max')->nullable();
            $table->unsignedSmallInteger('play_time')->nullable();
            $table->unsignedTinyInteger('age_rating')->default(0);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
