<?php

use App\Category;
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
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('description')->nullable();
            $table->char('color', 7)->default('#00aabb');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('book_id')->default(config('masjid.default_book_id', 1));
            $table->unsignedTinyInteger('status_id')->default(Category::STATUS_ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
