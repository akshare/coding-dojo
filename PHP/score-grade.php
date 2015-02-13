<?php
    function random_grading()
    {
    	$score = rand(50,100);
    	if($score < 70)
    	{
    		$h1 = "<h1>". $score ."</h1>";
    		$grade = "<h2>D</h2>";
    	}
    	if(($score >= 70) && ($score <80))
    	{
    		$h1 = "<h1>". $score ."</h1>";
    		$grade = "<h2>C</h2>";
    	}
    	if(($score >= 80) && ($score <90))
    	{
    		$h1 = "<h1>". $score ."</h1>";
    		$grade = "<h2>B</h2>";
    	}
    	if(($score >= 90) && ($score <= 100))
    	{
    		$h1 = "<h1>". $score ."</h1>";
    		$grade = "<h2>A</h2>";
    	}
    	echo $h1;
    	echo $grade;
    }

    for($counter=1; $counter <= 100; $counter++)
    {
    	random_grading();
    }
?>