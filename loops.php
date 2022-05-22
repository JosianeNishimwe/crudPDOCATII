<!--for loop-->



<?php 
for ($x=1; $x <=5 ; $x++) { 
	for ($y=5; $y >=$x ; $y--) { 
	print("*");
	}
	echo "<br>";
	if ($x==5) {
		for ($g=1; $g <=5 ; $g++) { 
	for ($p=1; $p <=$g ; $p++) { 
	print("*");
	}
	echo "<br>";
	if ($g==5) {
			for ($x2=1; $x2 <=5 ; $x2++) { 
	for ($y2=5; $y2 >=$x2 ; $y2--) { 
	print("*");
	}
	echo "<br>";
	if ($x2==5) {
		for ($g2=1; $g2 <=5 ; $g2++) { 
	for ($p2=1; $p2 <=$g2 ; $p2++) { 
	print("*");
	}
	echo "<br>";
	}
		
	}

		}
		}	
	}
}
}

 ?>