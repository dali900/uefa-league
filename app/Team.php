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

	//Players on the filed
	/**
	 * Goalkeeper on the filed
	 *
	 * @var int
	 */
	private $activeGoalkeeper;

	/**
	 * Defenders on the filed
	 *
	 * @var int
	 */
	private $activeDefenders;

	/**
	 * Midfielders on the filed
	 *
	 * @var int
	 */
	private $activeDidfielders;

	/**
	 * Strikers on the filed
	 *
	 * @var int
	 */
	private $activeStrikers;
	
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

	public function setStrategy(GameStrategyInterface $strategy)
	{
		$this->strategy = $strategy;
	}

	public function setPlayers($players)
	{
		$this->players = $players;
	}

	public function getPlayers()
	{
		return $this->players;
	}

	//Goalkeeper
	public function getAllGoalkeepers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'goalkeeper';
		});
	}

	public function getActiveGoalkeeper()
	{
		return $this->activeGoalkeeper;
	}

	public function setActiveGoalkeeper($activeGoalkeepers)
	{
		$this->activeGoalkeeper = $activeGoalkeepers;
		foreach ($this->players as $key => $player) {
			if($player['position'] == 'goalkeeper'){
				$this->players[$key]['active'] = 0;
				foreach ($activeGoalkeepers as $activeGoalkeeper) {
					if($activeGoalkeeper == $player['number']){
						$this->players[$key]['active'] = 1;
					}
				}
			}
		}
	}

	//Defenders
	public function getAllDefenders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'defender';
		});
	}

	public function getActiveDefenders()
	{
		return $this->activeDefenders;
	}

	public function setActiveDenfenders($activeDefenders)
	{
		$this->activeDefenders = $activeDefenders;
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
	public function getAllMidfielders()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'midfielder';
		});
	}

	public function getActiveMidfielders()
	{
		return $this->activeMidfielders;
	}

	public function setActiveMidfielders($activeMidfielders)
	{
		$this->activeMidfielders = $activeMidfielders;
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
	public function getAllStrikers()
	{
		return array_filter($this->getPlayers(), function ($player) {
			return $player['position'] == 'striker';
		});
	}

	public function getActiveStrikers()
	{
		return $this->activeStrikers;
	}

	public function setActiveStrikers($activeStrikers)
	{
		$this->activeStrikers = $activeStrikers;
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

	public function getFormation()
	{
		return $this->formation;
	}

	public function formatTeam()
	{
		$this->strategy->makeFormation($this);
	}

	public function setFormation($activeGoalkeeper, $activeDefenders, $activeMidfielders, $activeStrikers)
	{
		$this->setActiveGoalkeeper($activeGoalkeeper);
		$this->setActiveDenfenders($activeDefenders);
		$this->setActiveMidfielders($activeMidfielders);
		$this->setActiveStrikers($activeStrikers);
		$this->formation = count($activeDefenders) . " - " . count($activeMidfielders) . " - " . count($activeStrikers);
	}
}
