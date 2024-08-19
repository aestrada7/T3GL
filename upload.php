<?

$gid = $_POST["gid"];

if(!is_dir("logs/")) { 
   mkdir("logs/");
   echo("created a dir");
}

$target_path = "/logs/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
//$target_path = $target_path . $gid . ".log"; 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    //echo("Log ".  basename( $_FILES['uploadedfile']['name']) . " uploaded");
    echo("Log   ".  $target_path . "   uploaded");
} else {
    echo("Something trucked up around. Try again or blame Van.");
}

?>