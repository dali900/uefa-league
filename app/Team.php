<?php

namespace App;

use App\Contracts\GameStrategyInterface;

class Team
{
	/**
	 * All team players that
	 *
	 * @var int
	 */
	private $players;
	
	/**
	 * Team formation based on selected players on the field 
	 *
	 * @var string
	 */
	private $formation;

	/**
	 * Team strategy
	 *
	 * @var GameStrategyInterface
	 */
	private $strategy;

	public function __construct(GameStrategyInterface $strategy, $players = [])
	{
		$this->strategy = $strategy;
		$this->players = $players;
	}

	/**
	 * Seter. Team strategy.
	 *
	 * @param GameStrategyInterface $strategy
	 * @return void
	 */
	public function setStrategy(GameStrategyInterface $strategy)
	{
		$this->strategy = $strategy;
	}

	/**
	 * Set team players
	 *
	 * @param array $players
	 * @return void
	 */
	public function setPlayers($players)
	{
		$this->players = $players;
	}

	/**
	 * Get all team Playerss
	 *
	 * @return array
	 */
	public function getPlayers()
	{
		return $this->players;
	}

	/**
	 * getAllHealthyPlayers
	 *
	 * @return array
	 */
	public function getAllHealthyPlayers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['injured'] == 0;
		});
	}

	/**
	 * Players on the field
	 *
	 * @return array
	 */
	public function getActivePlayers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['active'] == 1;
		});
	}

	//Goalkeeper
	/**
	 * Getter. Healthy goalkeepers
	 *
	 * @return array
	 */
	public function getAllHealthyGoalkeepers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'goalkeeper' && $player['injured'] == 0;
		});
	}

	/**
	 * Getter. Goalkeeper on the field
	 *
	 * @return array
	 */
	public function getActiveGoalkeeper()
	{
		$array = array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'goalkeeper' && $player['active'] == 1;
		});
		return array_shift($array);
	}

	/**
	 * Setter. Sets goalkeeper who plays.
	 *
	 * @param int $activeGoalkeepers
	 * @return void
	 */
	public function setActiveGoalkeeper($activeGoalkeeper)
	{
		foreach ($this->players as $key => $player) {
			if($player['position'] == 'goalkeeper'){
				$this->players[$key]['active'] = 0;
				if($activeGoalkeeper == $player['number']){
					$this->players[$key]['active'] = 1;
				}
			}
		}
	}

	//Defenders
	/**
	 * Getter. Healthy defenders
	 *
	 * @return array
	 */
	public function getAllHealthyDefenders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'defender' && $player['injured'] == 0;
		});
	}

	/**
	 * Getter. Defenders on the field
	 *
	 * @return array
	 */
	public function getActiveDefenders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'defender' && $player['active'] == 1;
		});
	}

	/**
	 * Setter. Sets Defenders who plays.
	 *
	 * @param array $activeDefenders
	 * @return void
	 */
	public function setActiveDenfenders($activeDefenders)
	{
		foreach ($this->players as $key => $player) {
			if($player['position'] == 'defender'){
				$this->players[$key]['active'] = 0;
				foreach ($activeDefenders as $activeDefender){
					if($activeDefender == $player['number']){
						$this->players[$key]['active'] = 1;
					}
				}
			}
		}
	}
	
	//Midfielders
	/**
	 * Getter. Healthy defenders
	 *
	 * @return array
	 */
	public function getAllHealthyMidfielders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'midfielder' && $player['injured'] == 0;
		});
	}

	/**
	 * Getter. Midfielders on the field
	 *
	 * @return array
	 */
	public function getActiveMidfielders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'midfielder' && $player['active'] == 1;
		});
	}

	/**
	 * Setter. Sets Midfielders who plays.
	 *
	 * @param array $activeMidfielders
	 * @return void
	 */
	public function setActiveMidfielders($activeMidfielders)
	{
		foreach ($this->players as $key => $player) {
			if($player['position'] == 'midfielder'){
				$this->players[$key]['active'] = 0;
				foreach ($activeMidfielders as $activeMidfielder){
					if($activeMidfielder == $player['number']){
						$this->players[$key]['active'] = 1;
					} 
				}
			}
		}
	}

	//Strikers
	/**
	 * Getter. Healthy Strikers
	 *
	 * @return array
	 */
	public function getAllHealthyStrikers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'striker' && $player['injured'] == 0;
		});
	}

	/**
	 * Getter. Strikers on the field
	 *
	 * @return array
	 */
	public function getActiveStrikers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'striker' && $player['active'] == 1;
		});
	}

	/**
	 * Setter. Sets Strikers who plays.
	 *
	 * @param array $activeStrikers
	 * @return void
	 */
	public function setActiveStrikers($activeStrikers)
	{
		foreach ($this->players as $key => $player) {
			if($player['position'] == 'striker'){
				$this->players[$key]['active'] = 0;
				foreach ($activeStrikers as $activeStriker){
					if($activeStriker == $player['number']){
						$this->players[$key]['active'] = 1;
					} 
				}
			}
		}
	}

	/**
	 * Setter. Injured player.
	 *
	 * @param int $playerNumber
	 * @return void
	 */
	public function setInjuredPlayer($playerNumber)
	{
		foreach ($this->getPlayers() as $key => $player) {
			if($player['number'] == $playerNumber){
				$this->players[$key]['injured'] = 1;
			}
		}
	}

	/**
	 * Get team formation.
	 *
	 * @return string
	 */
	public function getFormation()
	{
		return $this->formation;
	}

	/**
	 * Call team strategy
	 *
	 * @return void
	 */
	public function formatTeam()
	{
		$this->strategy->makeFormation($this);
	}

	/** only for formation */
	public function setFormation($activeGoalkeeper, $activeDefenders, $activeMidfielders, $activeStrikers)
	{
		$this->setActiveGoalkeeper($activeGoalkeeper);
		$this->setActiveDenfenders($activeDefenders);
		$this->setActiveMidfielders($activeMidfielders);
		$this->setActiveStrikers($activeStrikers);
		$this->formation = count($activeDefenders) . " - " . count($activeMidfielders) . " - " . count($activeStrikers);
	}
}
