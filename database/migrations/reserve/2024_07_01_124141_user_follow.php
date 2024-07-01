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

        Schema::create('follow_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('follow_id');
        });
    }
//ALTER TABLE follow_user ADD PRIMARY KEY (user_id,follow_id)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
