<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice__items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('product')->nullable();
            $table->string('qty')->nullable();
            $table->float('price')->default(0);
            $table->float('tax')->default(0);
            $table->float('discount')->default(0);
            $table->float('subtotal')->default(0);
            $table->float('totaltax')->default(0);
            $table->float('totaldiscount')->default(0);
            $table->string('product_des')->nullable();
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
        Schema::dropIfExists('invoice__items');
    }
}
