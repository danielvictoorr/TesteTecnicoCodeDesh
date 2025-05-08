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
            $table->bigInteger('code')->primary();
            $table->enum('status', ['draft', 'trash', 'published']);
            $table->dateTime('imported_t')->nullable();
            $table->string('url')->nullable();
            $table->string('creator')->nullable();
            $table->integer('created_t')->nullable();
            $table->integer('last_modified_t')->nullable();
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('brands')->nullable();
            $table->text('categories')->nullable();
            $table->text('labels')->nullable();
            $table->string('cities')->nullable();
            $table->string('purchase_places')->nullable();
            $table->string('stores')->nullable();
            $table->text('ingredients_text')->nullable();
            $table->text('traces')->nullable();
            $table->string('serving_size')->nullable();
            $table->decimal('serving_quantity', 10, 2)->nullable();
            $table->integer('nutriscore_score')->nullable();
            $table->char('nutriscore_grade', 1)->nullable();
            $table->string('main_category')->nullable();
            $table->string('image_url')->nullable();
    
            $table->timestamps(); // optional: created_at e updated_at
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
