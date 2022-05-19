<?php

class TeamFactory
{
    public static function create($make, $model)
    {
		//Process 

		//return team
        return new Team($make, $model);
    }
}