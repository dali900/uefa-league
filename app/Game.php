<?php
namespace App;

use App\Contracts\GameStrategyInterface;

class Game 
{
    private $teamA;
    private $teamB;

    public function __construct(Team $teamA, Team $teamB) {
        $this->teamA = $teamA;
        $this->teamB = $teamB;
    }

    public function startMatch()
    {
		//1 random player gets injured
		$activePlayersTeamA = $this->teamA->getActivePlayers();
		$randIndexTeamA = array_rand($activePlayersTeamA);
		$player = $activePlayersTeamA[$randIndexTeamA];
		$this->teamA->setInjuredPlayer($player['number']);
		printr($player, "Player injured");
		//player replacement in accordance with the team's strategy
		$this->teamA->formatTeam();
		printr(null, "Replace player");
		printr($this->teamA->getFormation(), "Team formation");
		printr($this->teamA->getActiveGoalkeeper(), "Active goalkeeper");
		printr($this->teamA->getActiveDefenders(), "Active defenders");
		printr($this->teamA->getActiveMidfielders(), "Active midfielders");
		printr($this->teamA->getActiveStrikers(), "Active strikers");
		printr($this->teamA->getPlayers(), "All players");
		
    }
}

