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

    public function run()
    {
        $this->teamA->formatTeam();
        $this->teamB->formatTeam();

        return $this->startMatch();
    }

    public function startMatch()
    {
        return [];
    }
}
