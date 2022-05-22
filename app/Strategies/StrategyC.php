<?php
namespace App\Strategies;

use App\Contracts\GameStrategyInterface;
use App\Team;

//Game 2 strategy
class StrategyC implements GameStrategyInterface
{
    public function makeFormation(Team $team)
    {
        //get 1 goalkeeper - quality
        $allGoalkeepers = $team->getAllGoalkeepers();
        usort($allGoalkeepers, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeGoalkeeper = array_slice($allGoalkeepers, 0, 1);
        $activeGoalkeeperNumber = array_column($activeGoalkeeper, 'number');

        //get 5 defenders - quality
        $allDefenders = $team->getAllDefenders();
        usort($allDefenders, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeDefenders = array_slice($allDefenders, 0, 3);
        $activeDenfenderNumbers = array_column($activeDefenders, 'number');

        //get 4 midfielders - quality
        $allMidfielders = $team->getAllMidfielders();
        usort($allMidfielders, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeMidfielders = array_slice($allMidfielders, 0, 4);
        $activeMidfielderNumbers = array_column($activeMidfielders, 'number');

        //get 1 striker - quality
        $allStrikers = $team->getAllStrikers();
        usort($allStrikers, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeStrikers = array_slice($allStrikers, 0, 3);
        $activeStrikersNumbers = array_column($activeStrikers, 'number');

        $team->setFormation($activeGoalkeeperNumber, $activeDenfenderNumbers, $activeMidfielderNumbers, $activeStrikersNumbers);
    }
}
