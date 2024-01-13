<?php

use App\Models\{Post, Actress};
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
        Schema::create('posts_actresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class);
            $table->foreignIdFor(Actress::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_actresses');
    }
};
