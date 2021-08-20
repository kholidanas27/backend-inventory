<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id_code_transaksi');
            $table->string('code_transaksi', 255);
            $table->date('tanggal_transaksi');
            $table->string('customer',255);
            $table->string('item', 255);
            $table->string('qty', 255);
            $table->string('total_diskon', 255);
            $table->string('total_harga', 255);
            $table->string('total_bayar', 255);
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
        Schema::dropIfExists('sales');
    }
}
