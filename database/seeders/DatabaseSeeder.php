<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fixture;
use App\Models\FixtureStatus;
use App\Models\League;
use App\Models\Member;
use App\Models\MembershipType;
use App\Models\Opponent;
use App\Models\Sport;
use App\Models\Team;
use Database\Factories\MembershipTypeFactory;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        League::factory(100)->create();
        Sport::factory(100)->create();
        Opponent::factory(100)->create();
        MembershipType::factory(100)->create();
        Member::factory(100)->create();
        Fixture::factory(100)->create();
        FixtureStatus::factory(100)->create();
        Team::factory(100)->create();
    }
}
