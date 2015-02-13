<?php
    function print_even_odd()
    {

        for($counter=1; $counter<=2000; $counter++)
        {
            if($counter % 2 != 0)
            {
                echo "Number is ". $counter .". This is an odd number.<br />";
            }
            else{
            	echo "Number is ". $counter .". This is an even number.<br />";
            }
        }
    }

    print_even_odd();
?>