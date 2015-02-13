<?php
    function print_list($get_array)
    {
        $list_values = NULL;
        foreach($get_array as $key => $value)
        {
            $list_values .= "<li>". $value ."</li>\n";
        }
        echo "<ul>\n". $list_values ."</ul>";
    }

    $a = array(1,2,3,4,5,"Hello!");
    
    print_list($a);
?>