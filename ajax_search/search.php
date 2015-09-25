<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
</head>
<body>
	<input type="text" name="text" id = "text" autocomplete="off" onkeyup="showHint(this.value)" />
	<div id="inner"></div>
	<script type="text/javascript">
	function showHint (str) {
		if(str.length == 0) {
			document.getElementById('inner').innerHTML = "please search again!";
			return;
		} //check if empty

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} //checks if not IE 5 or 6
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} //checks if IE 5 or 6

		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
				document.getElementById('inner').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("REQUEST", "http://newproj.my/search2.php?text="+str, true);
		xmlhttp.send();
	}
	</script>
</body>
</html>