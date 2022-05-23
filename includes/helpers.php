<?php

function printr($data, $title){
	echo "<h3>$title</h3>";
	if(!empty($data)){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	echo "<hr>";
}