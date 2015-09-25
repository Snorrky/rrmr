<?
	function connect($host, $user, $password, $database) {
		mysql_connect($host, $user, $password);
		mysql_select_db($database);
	}

	connect('localhost', 'root', '', 'snorrky');

	$text = $_REQUEST['text'];
	$text = preg_replace("|^[a-z0-9]|i", '', $text);
	$query = "SELECT * from users WHERE name LIKE '%$text%' OR surname LIKE '%$text%'";
	$action = mysql_query($query);
	$result = mysql_num_rows($action);

	while ($res = mysql_fetch_array($action)) {
		$output .= $res["name"]." ".$res["surname"];
		echo($output);
	}

?>