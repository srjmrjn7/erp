<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('expiry_date')->nullable;
            $table->integer('unit_id');
            $table->integer('unit_stock')->nullable;
            $table->string('purchase_price');
            $table->string('sale_price');
            $table->string('reorder_level')->nullable;
            $table->string('size')->nullable;
            $table->float('min_stock')->nullable;
            $table->text('narration')->nullable;
            $table->float('quantity')->nullable;
            $table->boolean('status');
            $table->string('barcode')->nullable;
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
        Schema::dropIfExists('products');
    }
}
