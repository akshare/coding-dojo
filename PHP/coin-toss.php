<?php
  function coin_toss()
  {
    $count_heads = 0;
    $count_tails = 0;

    for($counter=1; $counter < 5001; $counter++)
    {
        $coin = rand(1,2);
        if($coin == 1)
        {
            $result = "Heads";
            $count_heads = $count_heads + 1;
        }
        if($coin == 2)
        {
            $result = "Tails";
            $count_tails = $count_tails + 1;
        }
        echo "Attempt#" . $counter . ": Throwing a coin... it's a " . $result . "! ... Got " . $count_heads . " head(s) so far and " . $count_tails . " tail(s) so far.<br/>";
    }
  }
  coin_toss();
?>