<?php 
/*
TASK#1
Write an algorithm to sort an array using its 'datetime' key as sorting index
sample array:
 [0] => array(
 identifier: array_one
 key_one: value_one,
 key_two: value_two,
 key_three: value_three,
 datetime: current_datetime
 ),
 [1] => array(
 identifier: array_two
 key_one: value_one,
 key_two: value_two,
 key_three: value_three,
 datetime: current_datetime
 ),
 [2] => array(
 identifier: array_three
 key_one: value_one,
 key_two: value_two,
 key_three: value_three,
 datetime: current_datetime
 )
*/
$sampleArray = Array (
    Array (
        "identifier" => "array_one",
		"key_one" => "value_one",
		 "key_two" => "value_two",
		 "key_three" => "value_three",
        "datetime" => "2021-03-12 01:19:15",
        ),
    Array (
        "identifier" => "array_two",
		"key_one" => "value_one",
		"key_two" => "value_two",
		"key_three" => "value_three",
        "datetime" => "2021-01-19 10:12:00",
    ),
    Array (
        "identifier" => "array_three",
		"key_one" => "value_one",
		"key_two" => "value_two",
		"key_three" => "value_three",
        "datetime" => "2021-05-17 10:59:25",
    )
);
function date_compare($array1, $array2) {
    $datetime1 = strtotime($array1['datetime']);
    $datetime2 = strtotime($array2['datetime']);
    return $datetime1 - $datetime2;
} 
usort($sampleArray, 'date_compare');
echo 'TASK#1'.'<br>';
echo '<pre>';
print_r($sampleArray);
echo '<hr>';
function weeksInMonth($month, $year) {
 $start_time = mktime(0, 0, 0, $month, 1, $year);
 $end_time = mktime(0, 0, 0, $month, date('t', $start_time), $year);
 $start_week = date('W', $start_time);
 $end_week = date('W', $end_time);

 if ($end_week < $start_week) {
   return ((52 + $end_week) - $start_week);
 }
 $result['weeks'] = ($end_week - $start_week);
 $dateObj   = DateTime::createFromFormat('!m', $month);
 $monthName = $dateObj->format('F');
 $result['monthName'] = $monthName;
 return $result;
}
$weeks = weeksInMonth(2,2021);
echo 'TASK#3'.'<br>';
echo 'total '. $weeks['weeks'].' complete weeks in month of '. $weeks['monthName'];
echo '<hr>';
echo 'TASK#4'.'<br>';
/*
Algorithm findCar(C,carName) 
  Input: list of Cars C & name of the search carName 
  Output: False if not found. 

  if C.size = 0 return null 
  found := false 
  for each item in C, do 
    if item = carName, then 
      found := position of the item 
  return found
*/

function findCar(Array $carList, String $carName) { 
    $found = FALSE; 
    foreach($carList as $index => $car) { 
        if($car === $carName) { 
             $found = $index; 
             break; 
        } 
    } 
    return $found; 
} 

function placeAllcars(Array $orderedcars, Array &$carList) { 
    foreach ($orderedcars as $car) { 
    $carFound = findCar($carList, $car); 
    if($carFound !== FALSE) { 
        array_splice($carList, $carFound, 1); 
    } 
  } 
} 

$carList = ['Tata','Suzuki','Honda','Hyundai','Kia']; 
$orderedcars = ['Suzuki','Honda','Hyundai']; 

placeAllcars($orderedcars, $carList);
echo 'Available Cars: '.implode(",", $carList).'<hr>TASK#5<br> Generates a text file with name - <b>task5.txt</b>';

function checkPalindrome($string){  
	
        return strrev($string); 
    
} 
function checkAnagram($a, $b){
   if (count_chars($a, 1) == count_chars($b, 1)){
		return 1;
	}
	else{
		return 0;
	}
}

$checkLists = Array(
 "ASTRONOMER" => "MOON STARER",
 "REGAL" => "LAGER",
 "DESSERTS" => "STRESSED",
 "REWARD" => "DRAWER",
 "PAINFULLY" => "BEAUTIFUL",
 "SPACER" => "RECAPS",
 "STEELS" => "SLEETS",
 "RECECAR" => "RECECAR",
 "WEIRDLY" => "NORMAL",
 "CIVIC" => "CIVIC",
 "DEAFENING" => "SILENCE",
 "GROWING" => "SMALLER",
 "RENNET" => "TENNER",
 "JUMBO" => "SHRIMP",
 "REVILED" => "DELIVER",
 "MURDRUM" => "MURDRUM",
 "DORMITORY" => "DIRTY ROOM",
 "THE EYES" => "THEY SEE",
 "SINNED" => "DENNIS",
 "THE MORSE CODE" => "HERE COME DOTS",
 "RANDOM" => "ORDER",
 "REFER" => "REFER",
 "RADAR" => "RADAR",
 "A DECIMAL POINT" => "I'M A DOT IN PLACE",
 "REPAPER" => "REPAPER",
 "ELEVEN PLUS TWO" => "TWELVE PLUS ONE",
 "PASSIVELY" => "AGGRESSIVE",
 "LEVEL" => "LEVEL",
 "SLOT MACHINES" => "CASH LOST IN ME",
 "DEIFIED" => "DEIFIED",
 "SPOONS" => "SNOOPS",
 "ROTATOR" => "ROTATOR",
 "ORIGNAL" => "COPY",
 "SWEET" => "SORROW",
 "SPORTS" => "STROPS",
 "ELECTION RESULTS" => "LIES! LET'S RECOUNT",
 "SNOOZE ALARMS" => "ALAS. NO MORE Z'S",
 "ROVATOR" => "ROVATOR"
);
$myfile = fopen("task5.txt", "w") or die("Unable to open file!");
foreach($checkLists as $key => $value){	
	if(checkPalindrome($key) == $value){
		$record0 =  checkPalindrome($key).' -> '.$value.' - Is a Palindrome'."\n";
		fwrite($myfile, $record0);
	}
	else{
		$record1 =  $key.' -> '.$value.' - Not a Palindrome'."\n";
		fwrite($myfile, $record1);
	}
	if(checkAnagram($key,$value) == 1){
		$record2 = $key.' -> '.$value.' - Is a Anagram'."\n";
		fwrite($myfile, $record2);
	}else{
		$record3 = $key.' -> '.$value.' - Not a Anagram'."\n";
		fwrite($myfile, $record3);
	}


}





?>

