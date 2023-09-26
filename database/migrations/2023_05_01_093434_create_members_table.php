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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_types_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('FirtName');
            $table->string('LastName');
            $table->string('address');
            $table->integer('PostCode');
            $table->string('HomePhone');
            $table->string('MobilePhone');
            $table->date('DOB');
            $table->text('method');
            $table->double('SubsAmount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
