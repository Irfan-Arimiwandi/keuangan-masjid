<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturingSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('lecturing_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('audience_code', 15);
            $table->string('date')->nullable();
            $table->char('start_time', 5);
            $table->char('end_time', 5)->nullable();
            $table->string('time_text', 20);
            $table->string('lecturer', 60);
            $table->string('title', 60)->nullable();
            $table->string('book_title', 60)->nullable();
            $table->string('book_writer', 60)->nullable();
            $table->string('book_link')->nullable();
            $table->string('video_link')->nullable();
            $table->string('audio_link')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('creator_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecturing_schedules');
    }
}
