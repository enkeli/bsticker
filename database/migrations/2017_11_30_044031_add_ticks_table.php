<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticks', function (Blueprint $table) {
            $table->string("book")->nullable()->default(null);
            $table->decimal("high", 12, 2)->nullable()->default(null);
            $table->decimal("last", 12, 2)->nullable()->default(null);
            $table->decimal("low", 12, 2)->nullable()->default(null);
            $table->decimal("ask", 12, 2)->nullable()->default(null);
            $table->decimal("bid", 12, 2)->nullable()->default(null);
            $table->json("payload")->nullable()->default(null);
            $table->string("volume")->nullable()->default(null);
            $table->string("vwap")->nullable()->default(null);
            $table->datetime("created_at")->nullable()->default(null);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticks');
    }
}
