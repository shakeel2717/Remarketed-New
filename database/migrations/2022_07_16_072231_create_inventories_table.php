<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('rma_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained("users")->onDelete('cascade');
            $table->foreignId('reason_id')->constrained()->onDelete('cascade');
            $table->string('serial');
            $table->string('model');
            $table->string('issue');
            $table->string('attachment')->nullable();
            $table->double('price');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('approved');
            $table->string('added_by')->default('user');
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
        Schema::dropIfExists('inventories');
    }
};
