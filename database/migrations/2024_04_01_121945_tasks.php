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

        Schema::create("task_types", function (Blueprint $table) {
            $table->increments("id");
            $table->string("task_type");
        });

        Schema::create("projects", function (Blueprint $table) {
            $table->increments("id");
            $table->string("project");
        });

        Schema::create("task_givers", function (Blueprint $table) {
            $table->increments("id");
            $table->string("task_giver");
        });


        Schema::create("executors", function (Blueprint $table) {
            $table->increments("id");
            $table->string("executor");
        });

        Schema::create("tasks", function (Blueprint $table) {
            $table->increments("id");
            $table->string("task_name");
            $table->float("time_spent");
            $table->float("time_estimated");
            $table->date("date_start");
            $table->date("date_execution");
            $table->date("deadline");
            $table->boolean("description_flag_field_work");
            $table->boolean("description_flag_important");
            $table->boolean("description_flag_sales");
            $table->boolean("description_flag_backlog");
            $table->text("description_box");
            $table->boolean("tariffication_contract");
            $table->boolean("tariffication_by_the_hour_without_overtime");
            $table->boolean("tariffication_by_the_hour_with_overtime");
            $table->float("amount_price_field");
            $table->string("wiki");
            $table->string("prevention_actions");
            $table->boolean("closed_out_of_conctract_limit");
        });

        Schema::create("task_types_tasks", function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("task_type_id");
            $table->foreign("task_type_id")->references("id")->on("task_types");
            $table->integer("task_id");
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->primary(["id","task_type_id","task_id"]);
        });

        Schema::create("projects_tasks", function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("project_id");
            $table->foreign("project_id")->references("id")->on("projects");
            $table->integer("task_id");
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->primary(["id","project_id","task_id"]);
        });

        Schema::create("task_givers_tasks", function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("task_giver_id");
            $table->foreign("task_giver_id")->references("id")->on("task_givers");
            $table->integer("task_id");
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->primary(["id","task_giver_id","task_id"]);
        });


        Schema::create("executors_tasks", function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("executor_id");
            $table->foreign("executor_id")->references("id")->on("executors");
            $table->integer("task_id");
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->primary(["id","executor_id","task_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists("task_types_tasks");
        Schema::dropIfExists("task_types");
        Schema::dropIfExists("projects_tasks");
        Schema::dropIfExists("projects");
        Schema::dropIfExists("task_givers_tasks");
        Schema::dropIfExists("task_givers");
        Schema::dropIfExists("executors_tasks");
        Schema::dropIfExists("executors");
        Schema::dropIfExists("tasks");
    }
};
