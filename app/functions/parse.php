<?php
$file = array('FruitBasket.class.php');

$keywords = parse_from_files($file);
get_assoc_fruits($keywords);

//IN PROGRESS _ WILL WORK WITH FRUIT BASKET
// function get_assoc_fruits($keywords) {
// 	$swap = $list = array();
// 	$list = array_merge($list, $keywords[0], $keywords[1], $keywords[2]);

// 	$list_amount = count($list);
// 	var_dump($list_amount);

// 	if($list_amount > 0) {
// 		$dbh = new PDO('mysql:host=localhost;dbname=', '', '');
// 		$sql = "select name from fruits order by rand() limit $list_amount";
// 		foreach($dbh->query($sql) as $row) {
// 			$keyword = array_shift($list);
// 			$swap[$keywoyourd] = $row["name"];
// 		}
// 	}
// 	return $swap;
// }

function parse_from_string($content, $sort = false) {
	$variables = $classes = $functions = array();

	$keywords = parse($content);

	$classes = array_merge($classes, $keywords[0]);
	$functions = array_merge($functions, $keywords[1]);
	$variables = array_merge($variables, $keywords[2]);

	if($sort) {
		asort($classes);
		asort($functions);
		asort($variables);
	}
	return [$classes, $functions, $variables];
}

function parse_from_files($files, $sort = false) {
	$variables = array();
	$classes = array();
	$functions = array();

	foreach ($files as $file) {
		$contents = file_get_contents($file);
		$keywords = parse($contents);

		$classes = array_merge($classes, $keywords[0]);
		$functions = array_merge($functions, $keywords[1]);
		$variables = array_merge($variables, $keywords[2]);
	}
	$classes = array_unique($classes);
	$functions = array_unique($functions);
	$variables = array_unique($variables);

	if($sort) {
		asort($classes);
		asort($functions);
		asort($variables);
	}
	return [$classes, $functions, $variables];
}

function parse($contents) {
	$tokens = token_get_all($contents);
	$classes = $functions = $variables = array();
	$class = $function = false;
	foreach ($tokens as $token) {
		switch($token[0]) {
			case T_CLASS:
				$class = true;
				break;
			case T_FUNCTION:
				$function = true;
				break;
			case T_VARIABLE:
				if($token[1] == '$this') {
					continue;
				}
				$variables[] = $token[1];
				break;
			case T_STRING:
				$string = trim($token[1]);
				if(count($string) > 0) {
					if($class) {
						$classes[] = $string;
						$class = false;
					} else if($function) {
						if(!preg_match('/__construct/', $string)) {
							$functions[] = $string;
						}
						$function = false;
					}
				}
				break;
		}
	}
	return [$classes, $functions, $variables];
}
?>
