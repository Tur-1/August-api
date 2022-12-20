<?php

namespace App\Modules\Products\Database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
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
            $table->string('name');
            $table->string('slug');
            $table->text('details')->nullable();
            $table->text('info_and_care')->nullable();
            $table->decimal('price', 6, 2);
            $table->decimal('shipping_cost', 6, 2)->nullable()->default(0);
            $table->integer('discount_amount')->nullable();
            $table->enum('discount_type', ['Percentage', 'Fixed'])->nullable();
            $table->date('discount_start_at')->nullable();
            $table->date('discount_expires_at')->nullable();
            $table->decimal('discounted_price', 6, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->foreignId('color_id')->nullable()->constrained('colors')->nullOnDelete();
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
};