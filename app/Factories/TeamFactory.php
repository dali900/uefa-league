<?php

namespace App\Factories;

use App\Strategies\StrategyA;
use App\Team;
use Faker\Factory;

class TeamFactory
{
    public static function create()
    {
        $players = [];
        $playerNumbers = [];
        $faker = Factory::create();

        //goalkeepers
        for ($i = 1; $i <= 2; $i++) {
            $players[] = [
                'number' => $faker->unique()->numberBetween(1, 99),
                'name' => $faker->name,
                'position' => 'goalkeeper',
                'quality' => $faker->numberBetween(4, 10),
                'speed' => $faker->numberBetween(4, 10),
                'injured' => 0,
                'active' => 0
            ];
        }

        //defenders
        for ($i = 1; $i <= 6; $i++) {
            $players[] = [
                'number' => $faker->unique()->numberBetween(1, 99),
                'name' => $faker->name,
                'position' => 'defender',
                'quality' => $faker->numberBetween(4, 10),
                'speed' => $faker->numberBetween(4, 10),
                'injured' => 0,
                'active' => 0
            ];
        }

        //midfielders
        for ($i = 1; $i <= 10; $i++) {
            $players[] = [
                'number' => $faker->unique()->numberBetween(1, 99),
                'name' => $faker->name,
                'position' => 'midfielder',
                'quality' => $faker->numberBetween(4, 10),
                'speed' => $faker->numberBetween(4, 10),
                'injured' => 0,
                'active' => 0
            ];
        }
        
        //strikers
        for ($i = 1; $i <= 4; $i++) {
            $players[] = [
                'number' => $faker->unique()->numberBetween(1, 99),
                'name' => $faker->name,
                'position' => 'striker',
                'quality' => $faker->numberBetween(4, 10),
                'speed' => $faker->numberBetween(4, 10),
                'injured' => 0,
                'active' => 0
            ];
        }

        $team = new Team(new StrategyA(), $players);
        $team->formatTeam();
        return $team;
    }
}
