<?php
    $newTarget = $_GET['target'];
	$task = $_GET['task'];
	
	$vals = file_get_contents("vals.php");
	$temp = explode (";", $vals);
	$targets = explode("," , $temp[0]);
	$remaining = explode("," , $temp[1]);
	
if($newTarget != null){	
switch ($task){
    case "peerReview":
        $dif = $newTarget - $targets[0];
        $targets[0] = $newTarget;
        $remaining[0] = $remaining[0] + $dif;
        break;
    case "editing":
        $dif = $newTarget - $targets[1];
        $targets[1] = $newTarget;
        $remaining[1] = $remaining[1] + $dif;
        break;
    case "proofing":
        $dif = $newTarget - $targets[2];
        $targets[2] = $newTarget;
        $remaining[2] = $remaining[2] + $dif;
        break;    
}
}


$x = implode("," , $targets);
$y = implode("," , $remaining);
$z = $x.";".$y;

file_put_contents("vals.php",$z);
	
header("Location: index.php");
exit;
?>