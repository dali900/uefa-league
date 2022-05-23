<?php
namespace App\Strategies;

use App\Contracts\GameStrategyInterface;
use App\Team;

//Game 2 strategy
class StrategyB implements GameStrategyInterface
{
    public function makeFormation(Team $team)
    {
        //get 1 best goalkeeper - quality+speed
        $allGoalkeepers = $team->getAllHealthyGoalkeepers();
		//If no healthy player for this position get from other.
		if(count($allGoalkeepers) < 2){
			$allGoalkeepers = $team->getAllHealthyPlayers();
		}
        usort($allGoalkeepers, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeGoalkeeper = array_slice($allGoalkeepers, 0, 1);
        $activeGoalkeeperNumber = array_column($activeGoalkeeper, 'number')[0];

        //get 4 best defenders - quality+speed
        $allDefenders = $team->getAllHealthyDefenders();
		//If no healthy player for this position get from other.
		if(count($allDefenders) < 4){
			$allDefenders = $team->getAllHealthyPlayers();
		}
        usort($allDefenders, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeDefenders = array_slice($allDefenders, 0, 4);
        $activeDenfenderNumbers = array_column($activeDefenders, 'number');

        //get 4 best midfielders - quality+speed
        $allMidfielders = $team->getAllHealthyMidfielders();
		//If no healthy player for this position get from other.
		if(count($allMidfielders) < 4){
			$allMidfielders = $team->getAllHealthyPlayers();
		}
        usort($allMidfielders, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeMidfielders = array_slice($allMidfielders, 0, 4);
        $activeMidfielderNumbers = array_column($activeMidfielders, 'number');

        //get 2 best striker - quality+speed
        $allStrikers = $team->getAllHealthyStrikers();
		//If no healthy player for this position get from other.
		if(count($allStrikers) < 2){
			$allStrikers = $team->getAllHealthyPlayers();
		}
        usort($allStrikers, function($a, $b) {
            return (($b['quality']+$b['speed'])/2) <=> (($a['quality']+$a['speed'])/2);
        });
        $activeStrikers = array_slice($allStrikers, 0, 2);
        $activeStrikersNumbers = array_column($activeStrikers, 'number');

        $team->setFormation($activeGoalkeeperNumber, $activeDenfenderNumbers, $activeMidfielderNumbers, $activeStrikersNumbers);
    }
}
