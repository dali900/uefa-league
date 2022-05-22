<?php

class Player 
{
	public $id;
	public $name;
	public $position;
	public $quality;
	public $speed;

	public function __construct(Type $var = null) {
		$this->var = $var;
	}
}
