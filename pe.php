

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

	
	if (!preg_match_all('/DUE\s\d{2}-\d{2}-\d{2}\s\d{2}:\d{2}\w{2}\s</',$c_obj,$times_back))
		return "";
	
	
	sort($times_back[0]);
	$ts = substr($times_back[0][0],3);
	$ts = substr($ts,0,-2);
	$date_part = substr($ts,0,9);
	$time_part = substr($ts,10);
	
	if(substr($time_part,0,1) == '0')
		$time_part = " ".substr($time_part,1);

	if (strstr($date_part,date('y-m-d'))){
			
			$final_msg = $time_part;
		}
	else{
			$month = substr($date_part,4,2);
			$day = substr($date_part,7,8);
			
			if (intval($month) == intval(date('m')) && intval($day) == intval(date('d')+1))
				$final_msg = $time_part." tomorrow";
			else
				$final_msg = $time_part." on ".$month."/".$day;
		}
	return '<span class="due-time">'.$final_msg."</span>";
}

switch($i){

	case 1:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Laptop</li>';
		else{
			$nd = next_due($r);
			if ($nd != "")
				echo '<li class="content-box-bad due-time">Laptop, next due by:'.$nd.'</li>';
			else
				echo '<li class="content-box-good">Laptop</li>';
			}
	break;
	case 2:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Micro USB Cable</li>';
		else{
			$nd = next_due($r);
			if ($nd != "")
				echo '<li class="content-box-bad due-time">Micro USB Cable, next due by:'.$nd.'</li>';
			else 
				echo '<li class="content-box-good">Micro USB Cable</li>';
			}
	break;
	case 3:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 4 Cable</li>';
		else{
			$nd = next_due($r);
			if($nd != "")
				echo '<li class="content-box-bad due-time">iPhone 4 Cable, next due by:'.$nd.'</li>';
			else
				echo '<li class="content-box-good">iPhone 4 Cable</li>';
			}
	break;
	case 4:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">iPhone 5 Cable</li>';
		else{
			$nd = next_due($r);
			if($nd != "")
				echo '<li class="content-box-bad due-time">iPhone 5 Cable, next due by:'.$nd.'</li>';
			else
				'<li class="content-box-good">iPhone 5 Cable</li>';
			}
	break;
	case 5:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">Macbook Charger</li>';
		else{
			$nd = next_due($r);
			if($nd != "")
				echo '<li class="content-box-bad due-time">Macbook Charger, next due by:'.$nd.'</li>';
			else
				echo '<li class="content-box-good">Macbook Charger</li>';
			}
	break;
	case 6:
		if (preg_match('/IN LIBRARY/',$r))
			echo '<li class="content-box-good">VGA Cable</li>';
		else{
			$nd = next_due($r);
			if($nd != "")
				echo '<li class="content-box-bad">VGA Cable, next due by:'.$nd.'</li>';
			else
				echo '<li class="content-box-good">VGA Cable</li>';
			}
	break;
	}
?>