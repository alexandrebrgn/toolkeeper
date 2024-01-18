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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('serialId');
            $table->boolean('isActive');
            $table->string('localisation')->nullable();
            $table->datetime('dateNextOperation')->nullable();
            $table->boolean('toDo')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('maintenances');
        Schema::dropIfExists('datatools');
    }
};
