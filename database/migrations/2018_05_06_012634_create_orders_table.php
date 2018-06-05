<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name',50);
            $table->integer('client_phone')->unsigned();
            $table->string('address');
            $table->float('lat',11,8);
            $table->float('lng',11,8);
            $table->decimal('total_price');
            $table->integer('client_id')->unsigned()->nullable(true);//->default(null);
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
            $table->date('delivery_date');
            $table->integer('distributor_id')->unsigned()->nullable(true);
            $table->foreign('distributor_id')
                ->references('id')
                ->on('distributors')
                ->onDelete('cascade');
            $table->smallInteger('state')->default(0);
            $table->integer('zone_id')->unsigned()->nullable(true);
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones')
                ->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
