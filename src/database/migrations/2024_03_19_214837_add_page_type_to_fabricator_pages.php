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
        Schema::table('pages', function (Blueprint $table) {
            $table->enum('type', \App\Enums\ContentEnum::values())
                ->after('parent_id')
                ->default(\App\Enums\ContentEnum::PAGE->value)
                ->index();
        });

        Schema::create('item_pages', function (Blueprint $table) {
            $table->foreignId('item_id')
                ->references('id')
                ->on('items')
                ->cascadeOnDelete();

            $table->foreignId('page_id')
                ->references('id')
                ->on('pages')
                ->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::table('item_pages', function (Blueprint $table) {
            $table->index(['item_id', 'page_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
};
