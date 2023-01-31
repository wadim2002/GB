<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('categories_has_news', static function (Blueprint $table) {
            $table->foreignId('categories_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('news_id')->references('id')->on('news')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('category_has_news');
    }
};
