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
        Schema::create('fixture_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->foreignId('fixtures_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('members_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sports_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('NoOf_fixture');
            $table->string('captain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixture__statuses');
    }
};
