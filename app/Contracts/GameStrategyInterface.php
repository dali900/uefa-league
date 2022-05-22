<?php
namespace App\Contracts;

use App\Team;

interface GameStrategyInterface
{
    /**
     * Undocumented function
     *
     * @param Team $team
     * @return void
     */
    public function makeFormation(Team $team);
}
