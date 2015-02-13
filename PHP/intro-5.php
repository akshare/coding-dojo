<?php
    function multiply($numbers, $factor){

    foreach($numbers as $key => $value){
           $multiplied_numbers[] = $value * $factor;
    }
        
        return $multiplied_numbers;
    
    }

	$numbers = array(2,4,10,16);
    $multiplied_numbers =  var_dump(multiply($numbers, 5));

    echo $multiplied_numbers;
?>