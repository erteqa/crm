<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tid')->unique();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->date('invoicedate');
            $table->date('invoiceduedate');
            $table->float('subtotal')->default(0.0);
            $table->float('discount')->default(0.0);
            $table->integer('discstatus');
            $table->enum('format_discount',['%', 'flat', 'b_p', 'bflat']);
            $table->float('tax')->default(0.0);
            $table->enum('taxstatus',['yes','no']);
            $table->float('total')->default(0.0);
            $table->float('pamnt')->default(0.0);
            $table->enum('status',['paid', 'due', 'canceled', 'partial'])->default('due');
            $table->string('notes')->nullable();
            $table->integer('items')->default(0);
            $table->string('pmethod')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
