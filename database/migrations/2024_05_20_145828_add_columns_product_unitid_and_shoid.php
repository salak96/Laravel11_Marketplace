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
        Schema::table('products', function (Blueprint $table) {
          
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->
            references('id')->on('units')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //foreign
            $table->dropForeign(['unit_id',]);
            $table->dropForeign(['shop_id',]);
            //columns
             $table->dropColumn(['unit_id','shop_id']);
        });
    }
};