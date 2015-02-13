<?php
    function format_name($array)
    {
        $count_keys = count($array);   
        $key_titles = NULL;
        $description = NULL;     
        foreach($array as $key => $value)
        {
            $key_titles .= $key . ", ";
            $description .= "The value in the key '" . $key . "' is '" . $value . "'.<br/>";
        }
        echo "There are " . $count_keys . " keys in this array:" . $key_titles . "<br/>";
        echo $description;
    }

    $users = array();
    $users['first_name'] = "Michael";
    $users['last_name'] = "Choi";

    format_name($users);
?>