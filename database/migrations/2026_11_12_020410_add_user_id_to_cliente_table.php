<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->unique()
                ->after('ID_cliente');
        });
    }

    public function down(): void
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
