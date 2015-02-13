<?php
    
	$rand_h1 = sprintf("#%06x",rand(0,16777215));
	$rand_p = sprintf("#%06x",rand(0,16777215));
	
?>

h1{
	color:<?php echo $rand_h1; ?>;
}

p{
	color:<?php echo $rand_p; ?>;
}
