

<?php


$i = (int)$_SERVER["QUERY_STRING"];

$pArray = array(

1 => "http://catalogue.library.brocku.ca/search~S0?/.b2446659/.b2446659/1,1,1,B/holdings~2446659&FF=&1,0,",
2 => "http://catalogue.library.brocku.ca/search~S0?/.b2405021/.b2405021/1,1,1,B/holdings~2405021&FF=&1,0,",
3 => "http://catalogue.library.brocku.ca/search~S0?/.b2405020/.b2405020/1,1,1,B/holdings~2405020&FF=&1,0,",
4 => "http://catalogue.library.brocku.ca/search~S0?/.b2407566/.b2407566/1,1,1,B/holdings~2405020&FF=&1,0,",
5 => "http://catalogue.library.brocku.ca/search~S0?/.b2379137/.b2379137/1,1,1,B/holdings~2446659&FF=&1,0,",
6 => "http://catalogue.library.brocku.ca/search~S0?/.b2407250/.b2407250/1,1,1,B/holdings~2446659&FF=&1,0,",

);

$curl = curl_init($pArray[$i]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$r = curl_exec($curl);

function next_due($c_obj){

	preg_match_all('/DUE\s\d{2}-\d{2}-\d{2}\s\d{2}:\d{2}\w{2}\s</',$c_obj,$times_back);
	sort($times_back[0]);
	$ts = substr($times_back[0][0],3);
	$ts = substr($ts,0,-2);
	return '<span class="due-time">'.$ts."</span>";
}

switch($i){

	case 1:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Laptop</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">Laptop, next due by:'.$nd.'</li>';
			}
	break;
	case 2:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Micro USB Cable</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">Micro USB Cable, next due by:'.$nd.'</li>';
			}
	break;
	case 3:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 4 Cable</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">iPhone 4 Cable, next due by:'.$nd.'</li>';
			}
	break;
	case 4:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 5 Cable</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">iPhone 5 Cable, next due by:'.$nd.'</li>';
			}
	break;
	case 5:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Macbook Charger</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">Macbook Charger, next due by:'.$nd.'</li>';
			}
	break;
	case 6:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">VGA Cable</li>';
		else{
			$nd = next_due($r);
			echo '<li class="content-box-bad">VGA Cable, next due by:'.$nd.'</li>';
			}
	break;
	}
?>