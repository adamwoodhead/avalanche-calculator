<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('debt_collection_id');

            $table->string('name', 50);
            $table->string('description', 250)->nullable();
            
            $table->integer('debt_type')->default(10);
            
            $table->double('opening_balance');
            $table->double('interest_rate');
            $table->double('monthly_charge')->default(0);
            
            $table->double('min_payment_fixed')->default(0);
            $table->double('min_payment_percent')->default(0);
            
            $table->integer('bt_free_period')->nullable();
            $table->double('bt_interest_post')->nullable();
            
            $table->integer('pc_free_period')->nullable();
            $table->double('pc_amount_spent')->nullable();

            $table->boolean('sl_can_overpay')->default(true);

            $table->boolean('ll_can_overpay')->default(true);

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
        Schema::dropIfExists('debts');
    }
}
