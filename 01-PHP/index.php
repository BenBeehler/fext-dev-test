<?php

/**
*  Please complete the following function to take 3 arguments: protein, carbs, and fat
*  Each argument may be passed in as a number or a string: 25, 25g, 25kg.
*  If kg are passed in, there will need to be a conversion to grams
*  The function should return an associative array with the following format
*  The numeric value is the number of calories
*  [
*    'protein' => 25,
*    'carbs' => 40,
*    'fat' => 90,
*    'calories' => 155
*    ]
*  For simplicity sakes: assume that 1g of protein is 4 calories, 1g of carbs is 4 calories, and 1g of fat is 9 calories
**/


    function macros_to_calories($protein, $carbs, $fat)
    {
		$protein = parse($protein); #Parse protein
		$carbs = parse($carbs); #Parse carbs 
		$fat = parse($fat); #Parse fat
		
		$calories = 0; #Init calories
		
		#Calories 
		$calories += $protein * 4;
		$calories += $carbs * 4;
		$calories += $fat * 9;
		
		//Generate Statistics array
		$statistics_array = 
		[
			'protein' => $protein,
			'carbs' => $carbs,
			'fat' => $fat,
			'calories' => $calories
		];
		
		return $statistics_array; //Finished!
    }
	
	function parse($macro) {
		#This parses the macro for kg, g and generates data that needs to be returned
		
		$macro = (string) $macro;
		
		if(strpos($macro, 'kg') !== false) { //Kilogram format
			#1 kg = 1000 grams
			
			$macro = (integer) 
					str_replace('kg', ' ', $macro);
			
			$macro = (1000 * $macro); //Convert kilograms to grams
			
		} else if(strpos($macro, 'g')) { //Normal gram format
			$macro = (integer) 
					str_replace('g', ' ', $macro);
		} else { //Normal Integer (should be, if not, person used function incorrectly)
			#Noraml integer
			$macro = (integer) $macro;
		}
		
		return $macro;
	}
	
	#Testing down here, seeing if it works
	#foreach(macros_to_calories(5, '30kg', '10g') as $key => $value) {
		#echo $key . " => " . $value . '(g) <br>';
	#}
?>
