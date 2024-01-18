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
        Schema::create('datatools', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('tool_id')->nullable()->constrained('tools');
            $table->foreignId('dataCategory_id')->nullable()->constrained('datacategories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datatools');
    }
};
