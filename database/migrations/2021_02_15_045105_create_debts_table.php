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
            
            $table->integer('debt_type')->default(0);
            
            $table->double('opening_balance');
            $table->double('interest_rate');
            $table->double('monthly_charge')->default(0);
            
            $table->double('minimum_payment_flat');
            $table->double('minimum_payment_percentage')->default(1);

            $table->integer('interest_free_months')->default(0);

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
