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
        $allGoalkeepers = $team->getAllHealthyGoalkeepers();
		//If no healthy player for this position get from other.
		if(count($allGoalkeepers) < 2){
			$allGoalkeepers = $team->getAllHealthyPlayers();
		}
        usort($allGoalkeepers, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeGoalkeeper = array_slice($allGoalkeepers, 0, 1);
        $activeGoalkeeperNumber = array_column($activeGoalkeeper, 'number')[0];

        //get 5 defenders - quality
        $allDefenders = $team->getAllHealthyDefenders();
		//If no healthy player for this position get from other.
		if(count($allDefenders) < 3){
			$allDefenders = $team->getAllHealthyPlayers();
		}
        usort($allDefenders, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeDefenders = array_slice($allDefenders, 0, 3);
        $activeDenfenderNumbers = array_column($activeDefenders, 'number');

        //get 4 midfielders - quality
        $allMidfielders = $team->getAllHealthyMidfielders();
		//If no healthy player for this position get from other.
		if(count($allMidfielders) < 3){
			$allMidfielders = $team->getAllHealthyPlayers();
		}
        usort($allMidfielders, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeMidfielders = array_slice($allMidfielders, 0, 4);
        $activeMidfielderNumbers = array_column($activeMidfielders, 'number');

        //get 1 striker - quality
        $allStrikers = $team->getAllHealthyStrikers();
		//If no healthy player for this position get from other.
		if(count($allStrikers) < 3){
			$allStrikers = $team->getAllHealthyPlayers();
		}
        usort($allStrikers, function($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });
        $activeStrikers = array_slice($allStrikers, 0, 3);
        $activeStrikersNumbers = array_column($activeStrikers, 'number');

        $team->setFormation($activeGoalkeeperNumber, $activeDenfenderNumbers, $activeMidfielderNumbers, $activeStrikersNumbers);
    }
}
