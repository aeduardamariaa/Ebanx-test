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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['origin']);
            $table->dropForeign(['destination']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('origin')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('destination')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropForeign(['origin']);
                $table->dropForeign(['destination']);
            });
    
            Schema::table('transactions', function (Blueprint $table) {
                $table->foreign('origin')->references('id')->on('accounts');
                $table->foreign('destination')->references('id')->on('accounts');
            });
        });
    }
};
