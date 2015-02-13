<?php
    function dropdown_forloop($array)
    {
        $array_count = count($array);
        $list = NULL;
        for($counter=0; $counter < $array_count; $counter++)
        {
            $list .= "<option>" . $array[$counter] . "</option>";
        }
        echo "<select>" . $list . "</select>";
    }

    function dropdown_foreach($array)
    {
        $list = NULL;
        foreach($array as $key => $value)
        {
            $list .= "<option>" . $value . "</option>";
        }
        echo "<select>" . $list . "</select>";
    }
    
    $states_a = array('CA', 'WA', 'VA', 'UT', 'AZ');
    $states_b = array('CA', 'WA', 'VA', 'UT', 'AZ', 'NJ', 'NY', 'DE');
    
    dropdown_forloop($states_a);
    dropdown_foreach($states_a);
    dropdown_foreach($states_b);
?>