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
        Schema::create("calendar_quarters", function (Blueprint $table) {
            $table->increments("id");
            $table->string("calendar_quarter");
        });

        Schema::create("buyers", function (Blueprint $table) {
            $table->increments("id");
            $table->string("buyer");
        });

        Schema::create("value_added_tax", function (Blueprint $table) {
            $table->increments("id");
            $table->string("vat");
        });


        Schema::create("supply_states", function (Blueprint $table) {
            $table->increments("id");
            $table->string("supply_state");
        });

        Schema::create("years", function (Blueprint $table) {
            $table->increments("id");
            $table->string("supply_state");
        });

        Schema::create("supplies", function (Blueprint $table) {
            $table->increments("id");
            $table->boolean("important_task");
            $table->string("theme");
            $table->float("planned_sale", 2);
            $table->float("planned_purchase", 2);
            $table->float("actual_sale", 2);
            $table->float("actual_purchase", 2);
            $table->integer("transaction_probability");
            $table->integer("bonus");
            $table->integer("taxi");
            $table->date("expiration_date");
            $table->date("date_of_payment");
            $table->boolean("system_messages");
            $table->string("note")->default("Текущий статус:...");
            $table->integer("bill_number");
            $table->integer("realization");
        });

        Schema::create("calendar_quarters_supplies", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->integer("calendar_quarter_id");
            $table->foreign("calendar_quarter_id")->references("id")->on("calendar_quarters");
            $table->integer("supply_id");
            $table->foreign("supply_id")->references("id")->on("supplies");
            $table->primary(["id","calendar_quarter_id","supply_id"]);
        });

        Schema::create("buyers_supplies", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->integer("buyer_id");
            $table->foreign("buyer_id")->references("id")->on("buyers");
            $table->integer("supply_id");
            $table->foreign("supply_id")->references("id")->on("supplies");
            $table->primary(["id","buyer_id","supply_id"]);
        });

        Schema::create("vat_supplies", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->integer("vat_id");
            $table->foreign("vat_id")->references("id")->on("value_added_tax");
            $table->integer("supply_id");
            $table->foreign("supply_id")->references("id")->on("supplies");
            $table->primary(["id","vat_id","supply_id"]);
        });


        Schema::create("supply_states_supplies", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->integer("supply_state_id");
            $table->foreign("supply_state_id")->references("id")->on("supply_states");
            $table->integer("supply_id");
            $table->foreign("supply_id")->references("id")->on("supplies");
            $table->primary(["id","supply_state_id","supply_id"]);
        });

        Schema::create("years_supplies", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->integer("year_id");
            $table->foreign("year_id")->references("id")->on("years");
            $table->integer("supply_id");
            $table->foreign("supply_id")->references("id")->on("supplies");
            $table->primary(["id","year_id","supply_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("calendar_quarters_supplies");
        Schema::dropIfExists("buyers_supplies");
        Schema::dropIfExists("vat_supplies");
        Schema::dropIfExists("supply_states_supplies");
        Schema::dropIfExists("years_supplies");
        Schema::dropIfExists("calendar_quarters");
        Schema::dropIfExists("buyers");
        Schema::dropIfExists("value_added_tax");
        Schema::dropIfExists("supply_states");
        Schema::dropIfExists("years");
        Schema::dropIfExists("supplies");
    }
};
