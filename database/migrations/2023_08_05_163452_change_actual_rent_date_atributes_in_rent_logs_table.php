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
        Schema::table('rent_logs', function (Blueprint $table) {
            $table->date('rent_date')->change();
            $table->date('return_date')->change();
            $table->date('actual_return_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rent_logs', function (Blueprint $table) {
            $table->string('actual_return_date')->nullable()->change();
            $table->string('rent_date')->nullable(false)->change();
            $table->string('return_date')->nullable(false)->change();
        });
    }
};
