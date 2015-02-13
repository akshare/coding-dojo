<?php
    function create_odd_arrays()
    {
        $odd_array = array();

        for($counter=1; $counter<=20000; $counter++)
        {
            if($counter % 2 != 0)
            {
                $odd_array[] = $counter;
            }
        }

        $new_array = var_dump($odd_array);
        return $new_array;
    }

    echo create_odd_arrays();
?>