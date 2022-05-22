<?php
namespace App\Strategies;

use App\Contracts\GameStrategyInterface;
use App\Team;

//Game 1 strategy
class StrategyA implements GameStrategyInterface
{
    public function makeFormation(Team $team)
    {
        //get 1 best goalkeeper - quality+speed
        $allGoalkeepers = $team->getAllGoalkeepers();
        usort($allGoalkeepers, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeGoalkeeper = array_slice($allGoalkeepers, 0, 1);
        $activeGoalkeeperNumber = array_column($activeGoalkeeper, 'number');

        //get 5 best defenders - quality+speed
        $allDefenders = $team->getAllDefenders();
        usort($allDefenders, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeDefenders = array_slice($allDefenders, 0, 5);
        $activeDenfenderNumbers = array_column($activeDefenders, 'number');

        //get 4 best midfielders - quality+speed
        $allMidfielders = $team->getAllMidfielders();
        usort($allMidfielders, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeMidfielders = array_slice($allMidfielders, 0, 4);
        $activeMidfielderNumbers = array_column($activeMidfielders, 'number');

        //get 1 fastest striker - speed
        $allStrikers = $team->getAllStrikers();
        usort($allStrikers, function($a, $b) {
            return $b['speed'] <=> $a['speed'];
        });
        $activeStrikers = array_slice($allStrikers, 0, 1);
        $activeStrikersNumbers = array_column($activeStrikers, 'number');

        $team->setFormation($activeGoalkeeperNumber, $activeDenfenderNumbers, $activeMidfielderNumbers, $activeStrikersNumbers);
    }
}
