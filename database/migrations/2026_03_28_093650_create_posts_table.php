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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('Notifications_id')->nullable();
            $table->string('department')->nullable();
            $table->boolean('isVacancy');
            $table->integer('vacancy')->nullable();
            $table->string('qualification')->nullable();
            $table->date('apply_start_date')->nullable();
            $table->date('apply_end_date')->nullable();
            $table->string('official_website')->nullable();
            $table->string('Apply_link')->nullable();
            $table->string('notification_link')->nullable();

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
