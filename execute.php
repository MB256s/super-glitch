<?php
define("BOT_TOKEN", "318900003:AAHnkHM1fHVJMgWFlJH0K3kAP6Tgawf5bGE");
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$bot_url = "https://api.telegram.org/bot" . BOT_TOKEN . "/";

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['from']['first_name']) ? $message['from']['first_name'] : "";
$lastname = isset($message['from']['last_name']) ? $message['from']['last_name'] : "";
$username = isset($message['from']['username']) ? $message['from']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$textmsc = isset($message['text']) ? $message['text'] : "";

$textmsc = trim($textmsc);
$text = strtolower($textmsc);
$answer = '';
$checker = substr($text, 0, 1);
$rand = rand(1, 100);
$rand2 = rand(0, 31);

/*if($checker == "#" && strlen($text) == 7) {
	$texthex = substr($text, 1, 6);
	$texthex = preg_replace("/[^0-9a-f]/", '', $texthex);
}*/

function SetTheMessage($chatId, $answer) {
	$header = header("Content-Type: application/json");
	$parameters = array('chat_id' => $chatId, "text" => $answer);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
}
/*function SendImage($chatId, $img) {
	$header = header('Content-Type: image/png');
	$im = imagepng($img);
	$url = $bot_url . "sendPhoto?chat_id=" . $chatId;
	$post_fields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("/fileprocessing/image.png")));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
	$output = curl_exec($ch);
}*/
$plus = strpos($text, '+');
$unstressed = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C',
'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O',
'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a',
'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g',
'ı'=>'i', 'ş'=>'s', 'ü'=>'u');
$gommasaggia = array('Assolutamente sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'Sì', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Assolutamente no', 'Forse', 'Forse', 'Chi lo sa?', 'Può essere', 'Non sono affari tuoi', 'Non sono affari tuoi', 'Non sono affari tuoi', 'JOHN CENA!!!');
$affin = [
'a' => 17,
'b' => 41,
'c' => 59,
'd' => 93,
'e' => 67,
'f' => 49,
'g' => 77,
'h' => 19,
'i' => 83,
'j' => 57,
'k' => 7,
'l' => 71,
'm' => 23,
'n' => 39,
'o' => 97,
'p' => 63,
'q' => 81,
'r' => 31,
's' => 13,
't' => 79,
'u' => 27,
'v' => 9,
'w' => 87,
'x' => 51,
'y' => 33,
'z' => 61,
'0' => 89,
'1' => 1,
'2' => 37,
'3' => 11,
'4' => 53,
'5' => 69,
'6' => 21,
'7' => 29,
'8' => 47,
'9' => 91
];
$greco = [
'a' => 'α',
'b' => 'β',
'c' => 'κ',
'd' => 'δ',
'e' => '',
'f' => 'ϕ',
'g' => 'γ',
'h' => '',
'i' => 'ι',
'j' => 'ι',
'k' => 'κ',
'l' => 'λ',
'm' => 'μ',
'n' => 'ν',
'o' => '',
'p' => 'π',
'q' => 'κ',
'r' => 'ρ',
's' => 'σ',
't' => 'τ',
'u' => 'υ',
'v' => 'ϕ',
'w' => 'ϕ',
'x' => 'ξ',
'y' => 'υ',
'z' => 'ζ',
'?' => ';',
];
$card = ['n', 'a', '3', 'r', 'c', 'f', '7', '6', '5', '4', '2'];
$commands = ['spam', 'moneta', 'vbsscript ', 'greco ', 'chiama '];
$commcheck = false;
for($obc = 0; $obc < count($commands); ++$obc) {
	$comm = $commands[$obc];
	$commleng = strlen($comm);
	if(substr($text, 1, $commleng) == $comm){
		$commcheck = true;
		break;
	}
}
function CountSimilarities($name1, $name2) {
	$scoring = 0;
	for($ob = 1; $ob <= strlen($name2); ++$ob) {
		for($ob2 = 0; $ob2 <= strlen($name2) - $ob; ++$ob2) {
			$search = substr($name2, $ob2, $ob);
			$value = array();
			$ob3 = 0;
			while(strpos(substr($name1, $ob3), $search) !== false) {
				$value1 = strpos(substr($name1, $ob3), $search) + $ob3;
				array_push($value, $value1);
				$ob3 = $value1 + 1;
			}
			if(count($value) != 0) {
				$score = $ob;
				if(in_array($ob2, $value)) {
					$score = 1.5 * $score;
				}
				if(in_array($ob2 + strlen($name1) - strlen($name2), $value)) {
					$score = 1.2 * $score;
				}
				if($search == $name1 || $search == $name2) {
					$score = 2 * $score;
				}
				$finalsum = $finalsum + ($ob - 1) * $score * count($value) / $ob;
				if($scoring < $score) {
					$scoring = $score;
				}
			}
		}
	}
	return array('score' => $scoring, 'points' => $finalsum);
}
$debug = ['*', '#', '/', '!'];
$debug2 = ["*", "#", "/", "!", "&", ".", ",", ":", ";", "$", "?", "@", "€", "£", "'", "§"];
if($date % 86400 == 43200 && $substr($text, 2, 2) == 'cr' && substr($text, 9, 1) == 's' && strlen($text) == 21 && $chatId % 32 == $rand2) {
	$answer = $rand . " è il numero casuale che era destinato a questo messaggio. Sappi che è un onore poterlo vedere";
} elseif(substr($text, -13, 13) == "fai qualcosa!" && strlen($text) == 17 && !preg_match("/[a-z0-9]+/", substr($text, 0, 4))) {
	$answer = '';
} elseif($checker != "/" || $commcheck || strlen($text) >= 106 || substr($text, 17, 1) == 'l') {
	if(substr($text, 0, 11) == "/vbsscript " && strlen($text) > 11 && strlen($text) <= 130 && substr($text, 11, 1) != ' ') {
		if($date % 120 == 10 && $rand % 100 == 44 && $rand2 % 3 != 2) {
			$vbs = fopen('vbs.txt', 'r');
			$answer = fread($vbs, 1044);
			fclose($vbs);
		} else {
			$enter = "\r\n";
			$timeshift = $enter . "Wscript.Sleep 500";
			$answer = 'set o = Wscript.CreateObject("Wscript.Shell")' . $enter . 'o.Run "notepad"' . $timeshift;
			for($ob = 11; $ob < strlen($textmsc); ++$ob) {
				$lett = substr($textmsc, $ob, 1);
				if(preg_match("/^[A-Za-z0-9-_]$/", $lett) || in_array($lett, $debug2) || $lett === ' ') {
					$answer = $answer . $enter . 'o.SendKeys "' . $lett . '"' . $timeshift;
				}
			}
			if($answer == 'set o = Wscript.CreateObject("Wscript.Shell")' . $enter . 'o.Run "notepad"' . $timeshift){
				$answer = '';
			}
		}
	} elseif(substr($text, 0, 7) == "/greco " && strlen($text) > 7 && strlen($text) <= 520 && substr($text, 7, 1) != ' ') {
		$text = strtr($text, $unstressed);
		$text = str_ireplace('ch', 'χ', $text);
		$text = str_ireplace('th', 'θ', $text);
		$text = str_ireplace('ps', 'ψ', $text);
		$malus = 0;
		for($ob = 7; $ob < strlen($text); ++$ob) {
			$lett = substr($text, $ob, 1);
			if(preg_match("/[a-z]+/", $lett)) {
				if($lett == 's' && !preg_match("/[a-z]+/", substr($text, $ob + 1, 1)) && substr($text, $ob + 1, 2) != 'χ' && substr($text, $ob + 1, 2) != 'θ' && substr($text, $ob + 1, 2) != 'ψ') {
					$answer = $answer . 'ς';
				} else {
					if($lett == 'o' || $lett == 'e') {
						$eograrr = rand(1, 2);
						if($eograrr == 1) {
							$greco['e'] = 'ϵ';
							$greco['o'] = 'o';
						} else {
							$greco['e'] = 'η';
							$greco['o'] = 'ω';
						}
					}
					$answer = $answer . $greco[$lett];
				}
			} else {
				$answer = $answer . $lett;
				if(substr($text, $ob + 1, 2) != 'χ' && substr($text, $ob + 1, 2) != 'θ' && substr($text, $ob + 1, 2) != 'ψ') {
					$malus = $malus + 0.2;
				}
			}
		}
		if(strlen($answer) - $malus < strlen($text) * 3 / 5 || $date % 386 == 286) {
			$answer = "σπαμσπαμσπαμσπαμ";
		}
	} elseif(substr($text, 0, 2) == "%&" && strlen($text) > 7) {
		if (substr($text, 2, 2) == ';/') {
			$list = explode("\n", strtr($textmsc, $unstressed));
			$ob = 1;
			while (array_key_exists($ob, $list)) {
				$listlength[] = strlen($list[$ob]);
				++$ob;
			}
			$score0 = 1;
			$final = [];
			for($ob2 = 0; $ob2 < $ob - 2; ++$ob2) {
				for($ob3 = 1; $ob3 < $ob - $ob2 - 1; ++$ob3) {
					$score = 1;
					$obtemp = $ob2;
					$temp = [$list[$ob2 + 1]];
					while($listlength[$ob2] === $listlength[$obtemp + $ob3]) {
						++$score;
						$obtemp = $obtemp + $ob3;
						$temp[] = $list[$obtemp + 1];
					}
					if ($score > $score0) {
						$final = $temp;
						$base = $ob2 + 1;
						$ratio = $ob3;
						$length = $listlength[$ob2];
						$score0 = $score;
					} elseif ($score == $score0 && $score > 1) {
						$final[] = '--------';
						$final = array_merge($final, $temp);
						$base = $base . '/' . ($ob2 + 1);
						$ratio = $ratio . '/' . $ob3;
						$length = $length . '/' . $listlength[$ob2];
					}
				}
				if ($score0 == 1) {
					if ($ob2 != 0) {
						$final[] = '--------';
						$length = $length . '/';
					}
					$final[] = $list[$ob2 + 1];
					$length = $length . $listlength[$ob2];
				}
			}
			if ($score0 == 1) {
				$base = 0;
				$ratio = 0;
				$final[] = '--------';
				$final[] = $list[$ob - 1];
				$length = $length . '/' . $listlength[$ob - 2];
			}
			$answer = implode("\r\n", $final) . "\r\n" . "\r\n" . "Base $base; ragione $ratio; lunghezza $score0; caratteri $length";
			if (strlen($answer) > 4096) {
				$answer = $base . "\r\n" . $ratio . "\r\n" . $score0 . "\r\n" . $length;
			}
		} elseif(substr($text, 0, 2) == "+#" && strlen($text) > 7) {
			$list = explode("\n", strtr($textmsc, $unstressed));
			$ob = 1;
			while (array_key_exists($ob, $list)) {
				$listlength[] = strlen($list[$ob]);
				++$ob;
			}
			$lengthlist = array_count_values($listlength);
			$score = max($lengthlist);
			while(in_array($score, $lengthlist)) {
				$score1 = array_search($score, $lengthlist);
				$final[] = $score1;
				$lengthlist = $array_slice ($lengthlist, $score1 + 1, null, true);
			}
			for($ob2 = 0; array_key_exists($ob2, $final); ++$ob2) {
				$answer = $answer . $final[$ob2] . ":\n";
				for($ob3 = 0; $ob3 < $ob; ++$ob3) {
					if($strlen($list[$ob3]) == $final[$ob2]) {
						$answer = $answer . $list[$ob3] . "\n";
					}
				}
				$answer = $answer . "\n";
			}
		} else {
			$spam = fopen('spam.txt', 'r');
			$answer = fread($spam, 3996);
			fclose($spam);
		}
	} elseif(strlen($text) > 0 && substr($text, -1, 1) == '?') {
		$answer = $gommasaggia[$rand2];
	} elseif($plus !== false && strlen($text) < 197) {
		if(strlen($text) == 8 && preg_match("#^[0-9]+$#", substr($text, 5, 3)) && $plus == 0){
			if(substr($text, 1, 1) == 'a' || $date % 10 == 3){
				$answer = rand(1, substr($text, 5, 3) + 1) / 10;
			} else {
				$answer = rand(0, substr($text, 5, 3) + 1) / 10;
			}
			$answer = $answer . "%";
		} elseif($plus == strrpos($text, '+') && $plus != strlen($text) - 1 && $plus !== 0) {
			$score = 0;
			for($ob = 0; $ob < strlen($text); ++$ob) {
				$lett = substr($text, $ob, 1);
				if($ob < $plus){
					$pppp = $ob + 1;
				} else {
					$pppp = $ob - $plus;
				}
				if(!in_array($lett, $debug)) {
					$score = $score + $affin[$lett] * $pppp;
				} else {
					$score = ceil($score / 2);
				}
			}
			if($rand == 59 || $rand == 63 || $date % 2000 == 1024) {
				$score = ceil($score / 10) + ceil($chatId / (1 + $rand2));
			} else {
				$score = $score % 101;
			}
			$answer = $score . "%";
		} elseif(substr_count($text, '+') == 3 && substr($text, -2) == '++' && substr_count($text, ' ') == 2 && substr_count(substr($text, 0, $plus), ' ') == 1) {
			$first1 = substr($text, 0, strpos($text, ' '));
			$last1 = substr($text, strpos($text, ' ') + 1, $plus - strpos($text, ' ') - 1);
			$first2 = substr($text, $plus + 1, strrpos($text, ' ') - $plus - 1);
			$last2 = substr($text, strrpos($text, ' ') + 1, -2);
			$scoring1 = CountSimilarities($last1, $last2);
			$score1 = $scoring1['score'];
			if(strlen($last1) == strlen($last2)) {
				$score1 = $score1 + 0.1;
			}
			$scoring2 = CountSimilarities($first1, $first2);
			$score2 = $scoring2['score'];
			if(strlen($first1) == strlen($first2)) {
				$score2 = $score2 + 0.1;
				if(strlen($last1) == strlen($last2)) {
					$score1 = $score1 + 0.2;
				}
			}
			if(strlen($first1) + strlen($last1) == strlen($first2) + strlen($last2)) {
				$score1 = $score1 + 0.1;
			}
			if($first1 == $first2) {
				$score2 = 3 * $score2;
			}
			if($last1 == $first2 || $last2 == $first1) {
				$score2 = $score2 + 1.2;
			}
			if($last1 == $last2) {
				$answer = 10 * ($score1 + 2) * ($score2 + 2) + ceil($score2)^2;
				if($first1 == $first2) {
					$answer = ceil($answer) * ($score1 + 3) + 2000;
				}
			} else {
				$answer = $score2 + 5 * $score1;
			}
			$score3 = CountSimilarities($last1, $first2)['score'];
			$score4 = CountSimilarities($first1, $last2)['score'];
			$answer = $answer + 0.1 * floor($scoring1['points'] + $scoring2['points'] + $score3 + $score4 + 0.5);
			if(strlen($last1) == strlen($last2) && strlen($first1) == strlen($first2) && $answer < 15){
				$answer = 15;
			}
			$answer = $answer . "%";
		} elseif($rand2 == 16 && substr($text, 1, 1) == 'a') {
			$answer = (101 + $chatId) * $rand + $date;
			$answer = $answer . "%";
		} else {
			$answer = $rand . "%";
		}
	} elseif(substr($text, 0, 8) == '/chiama ') {
		if(strlen($text) == 9 && in_array(substr($text, 8), $card)) {
			$cards = [
			'n' => array(30, 35, 25, 6, 2, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
			'a' => array(33, 0, 31, 21, 12, 2, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
			'3' => array(38, 0, 0, 34, 18, 8, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
			'r' => array(45, 0, 0, 0, 30, 15, 6, 2, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
			'c' => array(50, 0, 0, 0, 0, 30, 10, 5, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0),
			'f' => array(52, 0, 0, 0, 0, 0, 28, 12, 5, 2, 1, 0, 0, 0, 0, 0, 0, 0),
			'7' => array(56, 0, 0, 0, 0, 0, 0, 25, 12, 4, 2, 0, 0, 0, 0, 0, 0, 1),
			'6' => array(60, 0, 0, 0, 0, 0, 0, 0, 20, 15, 4, 0, 0, 0, 0, 0, 0, 1),
			'5' => array(62, 0, 0, 0, 0, 0, 0, 0, 0, 19, 16, 2, 0, 0, 0, 0, 0, 1),
			'4' => array(65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28, 5, 1, 0, 0, 0, 0, 1),
			'2' => array(70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, 8, 1, 3, 1, 1, 1),
			];
			$distr = $cards[substr($text, 8)];
			if($date % 10 == 3) {
				$ob = 1;
				do {
					$pppp = $distr[$ob];
					$distr[$ob] = $distr[$ob - 1] + $distr[$ob];
					$distr[$ob - 1] = 0;
					++$ob;
				} while ($pppp == 0);
				/*--$distr[$ob - 1];
				++$distr[17];*/
			}
			$chiamate = ['Passo', 'Asso', 'Tre', 'Re', 'Cavallo', 'Fante', 'Sette', 'Sei', 'Cinque', 'Quattro', 'Due', 'Due a 62', 'Due a 63', 'Due a 64', 'Due a 65', 'Due a 66', 'Due a 70', 'CHIAMO CARICHI!!!'];
			for($ob = 0; $ob < 18; ++$ob) {
				for($ob2 = 0; $ob2 < $distr[$ob]; ++$ob2) {
					$chiamatecarta[] = $chiamate[$ob];
				}
			}
			$answer = $chiamatecarta[$rand - 1];
			if($answer != 'Passo' && $answer != 'CHIAMO CARICHI!!!') {
				$answer = 'Chiamo ' . $answer;
			}
		} elseif(preg_match("#^[0-9]+$#", substr($text, 8)) && substr($text, 8) > 61 && substr($text, 8) <= 120) {
			$score = substr($text, 8);
			$chiamate = ['Passo', 1, 2, 3, 4, 5, 10, 'CHIAMO CARICHI!!!'];
			if($score < 80) {
				$distr = array(72, 20, 5, 2, 0, 0, 0, 1);
			} else {
				$distr = array(75, 12, 6, 1, 1, 2, 1, 2);
			}
			if($date % 10 == 3) {
				$distr[1] = $distr[0] + $distr[1];
				$distr[0] = 0;
			}
			for($ob = 0; $ob < 8; ++$ob) {
				for($ob2 = 0; $ob2 < $distr[$ob]; ++$ob2) {
					$chiamatecarta[] = $chiamate[$ob];
				}
			}
			$choice = $chiamatecarta[$rand - 1];
			if(gettype($choice) != "integer") {
				$answer = $choice;
			} else {
				$score = $score + $choice;
				if($score > 120) {
					$answer = 'CHIAMO CARICHI!!!';
				} else {
					$answer = 'Chiamo Due a ' . $score;
				}
			}
		} elseif($text == '/chiama seme') {
			$chiamate = ['Bastoni', 'Coppe', 'Denari', 'Spade'];
			$choice = $rand2 % 4;
			$answer = 'La briscola è ' . $chiamate[$choice];
		}
		if($date + $chatId + $rand + $rand2 % 500 == 76 && $text != '/chiama seme' && $rand != $rand2 && $answer != 'Chiamo Due a 62') {
			$answer = 'CHIAMO CARICHI!!!';
		}
	/*} elseif($checker == "#" && strlen($text) == 7 && strlen($texthex) == 6) {
		$red = hexdec(substr($text, 1, 2));
		$green = hexdec(substr($text, 3, 2));
		$blue = hexdec(substr($text, 5, 2));
		$img = imagecreatetruecolor(432, 243);
		$color = imagecolorallocate($img, $red, $green, $blue);
		imagefill($img, 0, 0, $color);*/
	} elseif($rand % 5 == 2 && $date % 10 == 7 && substr($text, 3, 1) == 'c') {
		$answer = "Dettagli non disponibili";
	} elseif($rand == 79) {
		$answer = $firstname . ' ' . $lastname . ' accendi la luce';
	} elseif($text == "superspam" || substr(strtr($text, $unstressed), 1, 1) == 'a' || $date % 10 == 3 || strlen($text) >= 197 || strpos($text, 'delirio') !== false || substr($text, 0, 5) == "/spam") {
		$spam = fopen('spam.txt', 'r');
		$answer = fread($spam, 3996);
		fclose($spam);
	} elseif($username) {
		if($text == "moneta" || $rand + $rand2 == 67 || in_array($checker, $debug)) {
			$answer = "#" . $username . "AiMondiali";
		} else {
			$answer = $username . " inserisci una moneta per continuare";
		}
	} elseif($lastname) {
		if($text == "moneta" || $rand + $rand2 == 67 || in_array($checker, $debug)) {
			$lastname = str_replace(' ', '', $lastname);
			$answer = "#" . $lastname . "AiMondiali";
		} else {
			$answer = $lastname . " inserisci una moneta per continuare";
		}
	} else {
		$answer = "Dettagli non disponibili";
	}
} elseif(substr($text, 0, 6) == '/debug' && strlen($text) == 11) {
	$debugnumb = substr($text, 6, 5);
	if($debugnumb == "43200"){
		$answer = $rand . " è il numero casuale che era destinato a questo messaggio. Sappi che è un onore poterlo vedere";
	} elseif($debugnumb == "10442") {
		$vbs = fopen('vbs.txt', 'r');
		$answer = fread($vbs, 1044);
		fclose($vbs);
	} elseif($debugnumb == "37386") {
		$enter = "\r\n";
		$timeshift = $enter . "Wscript.Sleep 500";
		$answer = 'set o = Wscript.CreateObject("Wscript.Shell")' . $enter . 'o.Run "notepad"' . $timeshift;
		for($ob = 1; $ob < strlen($text); ++$ob) {
			$lett = substr($text, $ob, 1);
			$answer = $answer . $enter . 'o.SendKeys "' . $lett . '"' . $timeshift;
		}
	} elseif($debugnumb == "01010") {
		$answer = $gommasaggia[$rand2];
		if($answer == "JOHN CENA!!!") {
			$answer = "Forse";
		}
	} elseif($debugnumb == "56044") {
		$answer = $rand . "%";
	} elseif($debugnumb == "61120") {
		$chiamate = ['Passo', 'Asso', 'Tre', 'Re', 'Cavallo', 'Fante', 'Sette', 'Sei', 'Cinque', 'Quattro', 'Due', 1, 'CHIAMO CARICHI!!!'];
		shuffle($chiamate);
		$answer = $chiamate[$rand2 % 5];
		if($answer == 1) {
			$answer = 'Due a ' . rand(62, 120);
		}
		if($answer != 'Passo' && $answer != 'CHIAMO CARICHI!!!') {
			$answer = 'Chiamo ' . $answer;
		}
	/*} elseif($debugnumb == "77216") {
			$img = imagecreatetruecolor(432, 243);
			if($rand + $rand2 % 3 == 1) {
				$color = imagecolorallocate($img, 255, 0, 0);
			} elseif($rand + $rand2 % 3 == 2) {
				$color = imagecolorallocate($img, 0, 255, 0);
			} else {
				$color = imagecolorallocate($img, 0, 0, 255);
			}
			imagefill($img, 0, 0, $color);
	}*/
	} elseif($debugnumb == "54321") {
		$answer = "Dettagli non disponibili";
	} elseif($debugnumb == "79256") {
		$answer = $firstname . ' ' . $lastname . ' accendi la luce';
	}
} elseif($text == "/esadecimale") {
	$answer = dechex($rand2 % 16);
	for($ob = 1; $ob < 4096; ++$ob) {
		$answer = $answer . dechex(rand(0, 15));
	}
}

/*if($img) {
SendImage($chatId, $img);
} else {*/
SetTheMessage($chatId, $answer);
//}

//And remember, respect is everything
?>