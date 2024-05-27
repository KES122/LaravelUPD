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
        Schema::create('main_inf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text_info')->nullable();
            $table->binary('file_info')->nullable();
            $table->text('list_info')->nullable();
            $table->string('url_info', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('parsing_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_inf_id'); // Внешний ключ
            $table->foreign('main_inf_id')->references('id')->on('main_inf')->onDelete('cascade');
            $table->text('parsing_data');
            $table->timestamps();
        });

        Schema::create('time_task_info', function (Blueprint $table) {
            $table->id();
            $table->string('task_number');
            $table->string('task_name');
            $table->string('status');
            $table->date('assigned_date');
            $table->string('record_type');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_inf');
        Schema::dropIfExists('parsing_info');
        Schema::dropIfExists('time_task_info');
    }
};
