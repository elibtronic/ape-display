

<?php


$i = (int)$_SERVER["QUERY_STRING"];

$pArray = array(

1 => "http://catalogue.library.brocku.ca/search~S0?/.b2446659/.b2446659/1,1,1,B/holdings~2446659&FF=&1,0,",
2 => "http://catalogue.library.brocku.ca/record=b2405021",
3 => "http://catalogue.library.brocku.ca/record=b2405020",
4 => "http://catalogue.library.brocku.ca/record=b2407566",
5 => "http://catalogue.library.brocku.ca/record=b2407250",
6 => "http://catalogue.library.brocku.ca/record=b2379137",

);

$curl = curl_init($pArray[$i]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$r = curl_exec($curl);

switch($i){

	case 1:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Laptop</li>';
		else
			echo '<li class="content-box-bad">Laptop</li>';
	break;
	case 2:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Android Micro USB Cable</li>';
		else
			echo '<li class="content-box-bad">Android Micro USB Cable</li>';
			
	break;
	case 3:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 4 Cable</li>';
		else
			echo '<li class="content-box-bad">iPhone 4 Cable</li>';
	break;
	case 4:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 5 Cable</li>';
		else
			echo '<li class="content-box-bad">iPhone 5 Cable</li>';
	break;
	case 5:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">VGA Cable</li>';
		else
			echo '<li class="content-box-bad">VGA Cable</li>';
	break;
	case 6:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Macbook Charger</li>';
		else
			echo '<li class="content-box-bad">Macbook Charger</li>';
	break;
	}
?>