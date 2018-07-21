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
$commands = ['spam', 'moneta', 'vbsscript', 'greco'];
$commcheck = false;
for($obc = 0; $obc < count($commands); ++$obc) {
	$comm = $commands[$obc];
	$commleng = strlen($comm);
	if(substr($text, 1, $commleng) == $comm){
		$commcheck = true;
		break;
	}
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
				$answer ='';
			}
		}
	} elseif(substr($text, 0, 7) == "/greco " && strlen($text) > 7 && strlen($text) <= 520 && substr($text, 7, 1) != ' ') {
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
	} elseif(strlen($text) > 0 && substr($text, -1, 1) == '?') {
		$answer = $gommasaggia[$rand2];
	} elseif($plus !== false && strlen($text) < 197) {
		if($plus == strrpos($text, '+') && $plus != strlen($text) - 1 && $plus !== 0) {
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
			$score1 = 0;
			for($ob = 1; $ob <= strlen($last2); ++$ob) {
				for($ob2 = 0; $ob2 <= strlen($last2) - $ob; ++$ob2) {
					$search = substr($last2, $ob2, $ob);
					$value = strpos($last1, $search);
					if($value !== false) {
						$score = $ob;
						if($value == $ob2) {
							$score = 3 * $ob / 2;
						}
						if($search == $last1 || $search == $last2) {
							$score = 2 * $score;
						}
						if($score1 < $score) {
							$score1 = $score;
						}
					}
				}
			}
			if(strlen($last1) == strlen($last2)) {
				$score1 = $score1 + 1;
			}
			$score2 = 0;
			for($ob = 1; $ob <= strlen($first2); ++$ob) {
				for($ob2 = 0; $ob2 <= strlen($first2) - $ob; ++$ob2) {
					$search = substr($first2, $ob2, $ob);
					$value = strpos($first1, $search);
					if($value !== false) {
						$score = $ob;
						if($value == $ob2) {
							$score = 3 * $ob / 2;
						}
						if($search == $first1 || $search == $first2) {
							$score = 2 * $score;
						}
						if($score2 < $score) {
							$score2 = $score;
						}
					}
				}
			}
			if($last1 == $first2 || $last2 == $first1) {
				$score2 = $score2 + 10;
			}
			if($first1 == $first2) {
				$score2 = $score2 + 1;
			}
			if($last1 == $last2) {
				$answer = 5 * ($score1 + 2) * ($score2 + 2);
				if($first1 == $first2) {
					$answer = $answer * ($score1 + 3);
				}
			} else {
				$answer = $score2 + 5 * $score1;
			}
			$answer = $answer . "%";
		} elseif($rand2 == 16 && substr($text, 1, 1) == 'a') {
			$answer = (101 + $chatId) * $rand + $date;
			$answer = $answer . "%";
		} else {
			$answer = $rand . "%";
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
	} elseif($text == "superspam" || substr($text, 1, 1) == 'a' || $date % 10 == 3 || strlen($text) >= 197 || strpos($text, 'delirio') !== false || substr($text, 0, 5) == "/spam") {
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
}

/*if($img) {
SendImage($chatId, $img);
} else {*/
SetTheMessage($chatId, $answer);
//}

//And remember, respect is everything
?>