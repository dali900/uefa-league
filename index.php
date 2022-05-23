<?php
require 'vendor/autoload.php';

use App\Factories\TeamFactory;
use App\Strategies\StrategyA;
use App\Strategies\StrategyB;
use App\Strategies\StrategyC;
use App\Game;
use App\Team;

$teamA = TeamFactory::create();
$teamA->setStrategy(new StrategyC());
$teamA->formatTeam();
printr($teamA->getPlayers(), "All players");
printr($teamA->getFormation(), "Team formation");
printr($teamA->getActiveGoalkeeper(), "Active goalkeeper");
printr($teamA->getActiveDefenders(), "Active defenders");
printr($teamA->getActiveMidfielders(), "Active midfielders");
printr($teamA->getActiveStrikers(), "Active strikers");
$teamB = TeamFactory::create();

printr(null, "Game 1");
$game1 = new Game($teamA, $teamB);
$game1->startMatch();


$teamC = new Team(new StrategyA(), []);
$teamA->setStrategy(new StrategyB());
$teamA->formatTeam();
printr(null, "Game 2");
$game2 = new Game($teamA, $teamC);
$game2->startMatch();

$teamD = new Team(new StrategyA(), []);
$teamA->setStrategy(new StrategyC());
$teamA->formatTeam();
printr(null, "Game 3");
$game3 = new Game($teamA, $teamD);
$game3->startMatch();

