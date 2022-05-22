<?php
require 'vendor/autoload.php';

use App\Factories\TeamFactory;
use App\Strategies\StrategyA;
use App\Strategies\StrategyB;
use App\Game;
use App\Strategies\StrategyC;
use App\Team;

function printr($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$teamA = TeamFactory::create();
$teamA->setStrategy(new StrategyC());
$teamA->formatTeam();
printr($teamA->getPlayers());
echo "<hr>";
printr($teamA->getActiveDefenders());
echo "<hr>";
printr($teamA->getActiveMidfielders());
echo "<hr>";
printr($teamA->getActiveStrikers());
echo "<hr>";
printr($teamA->getFormation());
/* $teamB = TeamFactory::create();


$game1 = new Game($teamA, $teamB);
$game1->run();

$teamC = new Team(new StrategyA(), []);
$teamA->setStrategy(new StrategyB());

$game2 = new Game($teamA, $teamC);
$game2->run(); */

