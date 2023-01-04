<?php

namespace App\Modules\Orders\Database\migrations;

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('status', [
                'Pending',
                'Awaiting Payment',
                'Partially Shipped',
                'Completed',
                'Shipped',
                'Cancelled',
                'Refunded',
            ])->default('Pending');
            $table->decimal('shipping_fees', 6, 2)->default(0.00);
            $table->decimal('subTotal', 18, 2);
            $table->decimal('total', 18, 2);
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
};