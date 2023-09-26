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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('sports_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('leagues_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('fixtures_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('league_division');
            $table->string('captin_name');
            $table->string('GoalKeeper');
            $table->text('AltGoalkeeper');
            $table->string('CenterBack');
            $table->text('AltCenterBack');
            $table->string('RightBack');
            $table->text('AltRightBack');
            $table->string('LeftBack');
            $table->text('AltLeftBack');
            $table->string('RightWingBack');
            $table->text('AltRightWingBack');
            $table->string('LeftWingBack');
            $table->text('AltLeftWingBack');
            $table->string('CenterDefensiveMidfeilder');
            $table->text('AltCenterDefensiveMidfeilder');
            $table->string('CenterMidfeilder');
            $table->text('AltCenterMidfeilder');
            $table->string('RightMidfeilder');
            $table->text('AltRightMidfeilder');
            $table->string('LeftMidfeilder');
            $table->text('AltLeftMidfeilder');
            $table->string('CentralAttackingMidfeilder');
            $table->text('AltCentralAttackingMidfeilder');
            $table->string('Striker');
            $table->text('AltStriker');
            $table->string('CenterForword');
            $table->text('AltCenterForword');
            $table->string('RightWing');
            $table->text('AltRightWing');
            $table->string('LeftWing');
            $table->text('AltLeftWing');
            $table->string('RightForward');
            $table->text('AltRightForward');
            $table->string('LeftForward');
            $table->text('AltLeftForward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
