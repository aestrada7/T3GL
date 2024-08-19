<html>
<head></head>
<body bgcolor="#000000">
<?
$gid = $_GET['game_id'];
$myfile = "logs/".$gid.".log";

if(file_exists($myfile)) {
	$handle = fopen($myfile,"r");
	if ($handle) {
	    while (!feof($handle)) {
        	$buffer = fgets($handle, 4096);
		echo('<font face="Courier" size="2" color="' . GetColor($buffer) . '">');
	        echo($buffer . "<br />");
		echo('</font>');		
	    }
	}
	fclose($handle);
} else {
	echo('<font face="Courier" size="2" color="#FFFFFF">No log for this match yet.</font>');
}

function GetColor($line) {
	if(substr($line,0,2)=='C ') return "#CC6600";
	if(substr($line,0,2)=='T ') return "#FFFF00";
	if(substr($line,0,2)=='P ') return "#22FF22";
	if(substr_count($line, '>')>=1) return "#6666CC";
	return "#00FF00";
}

?>
</body>
</html>