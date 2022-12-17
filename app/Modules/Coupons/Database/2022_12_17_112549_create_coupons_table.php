<?php

namespace App\Modules\Coupons\Database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->enum('type', ['Percentage', 'Fixed']);
            $table->integer('amount');
            $table->unsignedBigInteger('use_times')->nullable();
            $table->unsignedBigInteger('used_times')->default(0);
            $table->unsignedDecimal('minimum_purchases', 11, 2)->nullable();
            $table->date('starts_at');
            $table->date('expires_at');
            $table->boolean('is_active')->default(true);
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
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
        Schema::dropIfExists('coupons');
    }
};