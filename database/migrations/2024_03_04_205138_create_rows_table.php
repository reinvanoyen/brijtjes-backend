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
        Schema::create('rows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('text');
            $table->string('type');
            $table->integer('order');
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rows');
    }
};
